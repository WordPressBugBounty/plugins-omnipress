<?php

namespace Omnipress\Controllers;

use Omnipress\Admin\ComingSoonAdminSettings;
use Omnipress\Helpers\GeneralHelpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\Omnipress\Controllers\ComingSoonController' ) ) {
	/**
	 * Controller class for handling Coming Soon functionality.
	 *
	 * @since 1.5.6
	 *
	 * @package Omnipress\Controllers
	 */
	class ComingSoonController {

		public function __construct() {
			// add_filter( 'template_include', array( $this, 'force_coming_soon_template' ), 12 );

			if ( ! wp_doing_ajax() || ! wp_doing_cron() ) {

				update_option( 'show_on_front', 'page' );

				$front_page = get_option( 'page_on_front' );

//				add_filter(
//					'pre_option_page_on_front',
//					function ( $value ) use ( $front_page ) {
//						return $value;
//						return 1572;
//					},
//					12
//				);
			}
		}

		public function force_coming_soon_template( $template ) {
			$settings = ComingSoonAdminSettings::get_settings();

			// if ( is_front_page() && ! is_user_logged_in() ) {
				return OMNIPRESS_PATH . 'templates/coming-soon-page.php';

			// }
			//
			// return $template;
		}

		/**
		 * Check and handle the Coming Soon mode on the frontend.
		 *
		 * @return void
		 */
		public static function check_coming_soon() {

			if ( is_admin() && current_user_can( 'manage_options' ) ) {
				return;
			}

			$settings = ComingSoonAdminSettings::get_settings();

			if ( GeneralHelpers::is_valid_array( $settings ) ) {
				if ( ! isset( $settings['enable'] ) || ! $settings['enable'] ) {
					return;
				}

				$post_id    = $settings['post_id'] ?? '';
				$visibility = $settings['visibility'] ?? 'logged_in';

				$show_for_logged_in  = 'logged_in' === $visibility || 'both' === $visibility;
				$show_for_logged_out = 'logged_out' === $visibility || 'both' === $visibility;

				if ( ( is_user_logged_in() && $show_for_logged_in ) || ( ! is_user_logged_in() && $show_for_logged_out ) ) {
					if ( $post_id ) {
						static::redirect_to_coming_soon();
					}
				}
			}
		}


		/**
		 * Redirect to the Coming Soon page if mode is active.
		 */
		public static function redirect_to_coming_soon() {
			$settings = ComingsoonAdminSettings::get_settings();
			$post_id  = $settings['post_id'] ?? '';

			if ( get_queried_object_id() !== intval( $post_id ) ) {
				// wp_safe_redirect( get_post_permalink( $post_id ) );
				// exit;
			}
		}
	}
}

//new ComingSoonController();
