<?php
declare( strict_types=1 );

namespace Omnipress\RestApi\Controllers\V1;

defined( 'ABSPATH' ) || exit;

use Omnipress\Abstracts\RestControllersBase;
use Omnipress\Uploader\FileUploader;


use WP_REST_Request;
use WP_REST_Response;

if ( ! class_exists( FileUploader::class ) ) {
	require_once OMNIPRESS_PATH . 'includes/uploader/FileUploader.php';
}
class FileUploadRestController extends RestControllersBase {

	public function register_routes() {
		$this->register_rest_route(
			array(
				array(
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'handle_upload' ),
					'permission_callback' => array( $this, 'upload_file_permissions_check' ),
				),

				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_files' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
				),
			),
		);
	}

	public static function get_files( WP_REST_Request $request ) {
		$args     = $request->get_params();
		$uploader = new FileUploader(
			array(
				'allowed_extensions' => array( 'json', 'svg', 'zip' ),
				'upload_subdir'      => ! empty( $args['folder'] ) ? $args['folder'] : 'omnipress',
				'field_name'         => 'file',
				'nonce'              => $request->get_header( 'X-WP-Nonce' ),
			)
		);

		return $uploader->get_files();
	}

	public static function handle_upload( WP_REST_Request $request ) {
		$args = $request->get_params();

		$uploader = new FileUploader(
			array(
				'allowed_extensions' => array( 'json', 'svg', 'zip' ),
				'upload_subdir'      => ! empty( $args['folder'] ) ? $args['folder'] : 'omnipress',
				'field_name'         => 'file',
				'nonce'              => $request->get_header( 'X-WP-Nonce' ),
			)
		);

		try {
			$url = $uploader->handle_upload();

			return new WP_REST_Response(
				array(
					'success' => true,
					'url'     => $url,
				),
				200
			);
		} catch ( \Throwable $e ) {
			return new WP_REST_Response( array( 'error' => $e->getMessage() ), 500 );
		}
	}
}
