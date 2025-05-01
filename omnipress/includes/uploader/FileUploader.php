<?php
namespace Omnipress\Uploader;

class FileUploader {

	protected $allowed_extensions;
	protected $upload_subdir;
	protected $field_name;
	protected $capability;
	protected $nonce;

	public function __construct( $config ) {
		$this->allowed_extensions = $config['allowed_extensions'] ?? array( 'json' );
		$this->upload_subdir      = $config['upload_subdir'] ?? 'omnipress';
		$this->field_name         = $config['file'] ?? 'file';
		$this->capability         = $config['capability'] ?? 'upload_files';
		$this->nonce              = $config['nonce'] ?? 'wp_rest';
	}


	/**
	 * Get files from upload directory.
	 *
	 * @return void
	 */
	public function get_files(): void {
		$files     = array();
		$files_dir = wp_upload_dir()['basedir'] . '/' . $this->upload_subdir;
		$files_dir = trailingslashit( $files_dir );

		if ( ! is_dir( $files_dir ) ) {
			wp_send_json_success(
				array(
					'success' => true,
					'message' => esc_html__( 'No files found.', 'omnipress' ),
					'files'   => array(),
				)
			);
		}

		$files = scandir( $files_dir );
		$files = array_diff( $files, array( '.', '..' ) );
		$files = array_values( $files );

		$baseurl   = wp_upload_dir()['baseurl'] . '/' . $this->upload_subdir;
		$files_url = array();

		foreach ( $files as $file ) {
			$files_url[] = $baseurl . '/' . $file;
		}

		wp_send_json_success(
			array(
				'success' => true,
				'message' => esc_html__( 'Files found.', 'omnipress' ),
				'files'   => $files_url,
			)
		);
	}


	/**
	 * Handle file upload.
	 *
	 * @return void
	 */
	public function handle_upload(): void {

		if ( ! current_user_can( $this->capability ) ) {
			wp_die( esc_html__( 'Unauthorized user', 'omnipress' ) );
		}

		if ( ! wp_verify_nonce( $this->nonce, 'wp_rest' ) ) {
			wp_die( esc_html__( 'Invalid nonce.', 'omnipress' ) );
		}

		if ( empty( $_FILES[ $this->field_name ] ) ) {
			wp_die( esc_html__( 'No file uploaded.', 'omnipress' ) );
		}

		$file = $_FILES[ $this->field_name ]; // phpcs:ignore

		$ext = strtolower( pathinfo( $file['name'], PATHINFO_EXTENSION ) );

		if ( ! in_array( $ext, $this->allowed_extensions, true ) ) {
			wp_send_json_error(
				array(
					'success' => false,
					'message' => esc_html__( 'Invalid file type.', 'omnipress' ),
				)
			);
		}

		$upload_dir = wp_upload_dir();
		$target_dir = trailingslashit( $upload_dir['basedir'] ) . $this->upload_subdir . '/';

		if ( ! file_exists( $target_dir ) ) {

			wp_mkdir_p( $target_dir );
		}

		$filename = sanitize_file_name( $file['name'] );

		$target = $target_dir . $filename;

		if ( ! move_uploaded_file( $file['tmp_name'], $target ) ) {
			wp_send_json_error(
				array(
					'success' => false,
					'message' => esc_html__( 'File upload failed.', 'omnipress' ),
				)
			);
		}

		wp_send_json_success(
			array(
				'success' => true,
				'message' => esc_html__( 'File uploaded successfully.', 'omnipress' ),
				'file'    => trailingslashit( $upload_dir['baseurl'] ) . $this->upload_subdir . '/' . $filename,
			)
		);
	}
}
