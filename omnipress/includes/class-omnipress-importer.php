<?php

declare(strict_types=1);

namespace Omnipress;

use WP_Error;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_Import' ) ) {
	require_once OMNIPRESS_PATH . 'includes/Libraries/importer/init.php';
}


/**
 * Extend Demo importer when importing content we will download external attachment and replace demo's home url into current home_url.
 *
 * @since 1.6.2
 */
final class Omnipress_WP_Import extends \WP_Import {
	/**
	 * Construct function
	 */
	public function __construct() {
		add_filter( 'wp_import_post_data_raw', array( $this, 'replace_imported_urls' ), 10, 2 );
	}


	/**
	 * Replace old URLs with current home URL.
	 *
	 * @param string $content Post content.
	 * @return string
	 */
	public function replace_old_urls( $content ) {
		$theme_name = wp_get_theme()->get( 'TextDomain' );

		$old_urls = array(
			'https://ecommerce.everestthemes.com/' . $theme_name => home_url(),
			'https://ecommerce.everestthemes.com' => home_url(),
			'https://patternslibrary.com'         => home_url(),
		);

		foreach ( $old_urls as $old_url => $new_url ) {
			$content = str_replace( $old_url, $new_url, $content );
		}

		return $content;
	}

	/**
	 * Replace old URLs with current home URL.
	 *
	 * @param array $post_data Post data.
	 * @return array
	 */
	public function replace_imported_urls( $post_data ) {
		// Replace the URLs in the post content and post meta...
		// Download and replace external images in post content.
		if ( isset( $post_data['post_content'] ) ) {
			$post_data['post_content'] = $this->download_and_replace_images( $post_data['post_content'], $post_data['post_id'] );
		}

		$post_data['post_content'] = $this->replace_old_urls( $post_data['post_content'] );
		$post_data['guid']         = $this->replace_old_urls( $post_data['guid'] );

		if ( isset( $post_data['postmeta'] ) ) {
			foreach ( $post_data['postmeta'] as &$meta ) {
				$meta['meta_value'] = $this->replace_old_urls( $meta['meta_value'] ?? '' );
			}
		}

		return $post_data;
	}

		/**
		 * Download and replace external image URLs in post content.
		 *
		 * @param string $content Post content.
		 * @return string Updated post content with replaced image URLs.
		 */
	public function download_and_replace_images( $content, $post_id ) {
		preg_match_all( '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches );

		if ( ! empty( $matches[1] ) ) {
			foreach ( $matches[1] as $image_url ) {
				if ( strpos( $image_url, 'ecommerce.everestthemes.com' ) !== false || strpos( $image_url, 'patternslibrary.com' ) !== false ) {
					$new_image_url = $this->download_image( $image_url, $post_id );

					if ( is_wp_error( $new_image_url ) ) {
						continue;
					}

					if ( $new_image_url ) {
						$content = str_replace( $image_url, $new_image_url, $content );
					}
				}
			}
		}

		return $content;
	}

	/**
	 * Download image and return the new URL.
	 *
	 * @param string $image_url The URL of the image to download.
	 * @param int    $post_id The ID of the post to which the image belongs.
	 * @return string|\WP_Error The new URL of the image after downloading.
	 */
	public function download_image( $image_url, $parent_post_id ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';

		global $wp_filesystem;

		if ( ! $wp_filesystem ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		}

		$tmp_file = download_url( $image_url );

		if ( is_wp_error( $tmp_file ) ) {
			return $tmp_file; // If error in downloading
		}

		// Step 2: Get the image name and mime type.
		$file_name = basename( wp_parse_url( $image_url, PHP_URL_PATH ) );

		$file_type = wp_check_filetype( $file_name, null );

		if ( empty( $file_type['type'] ) ) {
			wp_delete_file( $tmp_file ); // Clean up.
			return new WP_Error( 'invalid_file_type', 'Invalid file type.' );
		}

		// Step 3: Upload the file to the WordPress uploads directory.
		$uploads       = wp_upload_dir();
		$new_file_path = $uploads['path'] . '/' . $file_name;

		if ( ! @copy( $tmp_file, $new_file_path ) ) {
			wp_delete_file( $tmp_file );
			return new WP_Error( 'upload_error', 'Could not move file.' );
		}

		// Step 4: Set correct file permissions.
		if ( ! $wp_filesystem->chmod( $new_file_path, 0644 ) ) {
			wp_delete_file( $new_file_path );
			error_log( 'temp not permission denied' . $tmp_file );

			return new WP_Error( 'chmod_error', 'Could not set file permissions.' );
		}

		// Step 5: Create the attachment post.
		$attachment = array(
			'post_mime_type' => $file_type['type'],
			'post_title'     => sanitize_file_name( pathinfo( $file_name, PATHINFO_FILENAME ) ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		);

		$attachment_id = wp_insert_attachment( $attachment, $new_file_path, $parent_post_id );

		if ( is_wp_error( $attachment_id ) ) {

			return new WP_Error( 'attachment_error', 'Could not create attachment.' );
		}

		// Step 6: Generate metadata and thumbnails.
		$attach_data = wp_generate_attachment_metadata( $attachment_id, $new_file_path );
		wp_update_attachment_metadata( $attachment_id, $attach_data );

		return wp_get_attachment_url( $attachment_id );
	}
}

new Omnipress_WP_Import();
