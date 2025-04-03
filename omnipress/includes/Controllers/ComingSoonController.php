<?php

namespace Omnipress\Controllers;

use Omnipress\Admin\Extensions\Extensions;
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
		function omnipress_custom_maintenance_template() {
			$maintenance_mode = get_option( 'omnipress_maintenance_mode', false );
			if ( $maintenance_mode && ! current_user_can( 'edit_themes' ) && ! is_user_logged_in() ) {
				include get_template_directory() . '/maintenance.php';
				exit;
			}
		}

		public function is_bypassed_by_url() {
			$query_param = $_GET['op_coming_soon_bypass'] ?? '';
			$saved_value = get_transient( 'omnipress_coming_soon_bypass_url' );

			if ( $query_param === $saved_value ) {
				return true;
			}
			return false;
		}

		public function is_bypassed_user_role( $bypassed_user_roles ) {
			$user = wp_get_current_user();

			if ( GeneralHelpers::is_valid_array( $bypassed_user_roles ) ) {
				foreach ( $bypassed_user_roles as $role ) {
					if ( in_array( $role, (array) $user->roles ) ) {
						return true;
					}
				}
			}

			return false;
		}


		public function check_visibility() {
			$settings = Extensions::get_settings()['coming-soon'] ?? array();
			if ( isset( $settings['bypass_url'] ) ) {

				if ( $this->is_bypassed_by_url( $settings['bypass_url'] ) ) {
					// When user use bypass url then not applied coming soon settings.
					return false;
				}
			}

			if ( isset( $settings['bypass_user_role'] ) ) {
				if ( $this->is_bypassed_user_role( $settings['bypass_user_role'] ) ) {
					// When user use bypass user role then not applied coming soon settings.
					return false;
				}
			}

			if ( isset( $settings['enabled'] ) && 1 === (int) $settings['enabled'] && ! empty( $settings['post_id'] ) ) {
				if ( isset( $settings['bypass_url'] ) && ! empty( $settings['bypass_url'] ) ) {
					$previous_url = get_transient( 'op_coming_soon_bypass_url' );

					if ( ! empty( $previous_url ) && $previous_url === $settings['bypass_url'] ) {
						return true;
					}
				}

				$visibility = ! empty( $settings['visibility'] ) ? $settings['visibility'] : 'both';
				if ( 'both' === $visibility ) {
					return true;
				}

				if ( 'logged_in' === $visibility && is_user_logged_in() ) {
					return true;
				}

				if ( 'logged_out' === $visibility && ! is_user_logged_in() ) {
					return true;
				}
			}

			return false;
		}


		public function __construct() {
			if ( ( ! wp_doing_ajax() || ! wp_doing_cron() ) && $this->check_visibility() ) {
				add_filter( 'template_include', array( $this, 'force_coming_soon_template' ), 12 );
				update_option( 'show_on_front', 'page' );

				add_filter(
					'pre_option_page_on_front',
					function ( $value ) {
						if ( $this->check_visibility() ) {
							$settings = Extensions::get_settings()['coming-soon'] ?? array();

							return $settings['post_id'];
						}
						return $value;
					},
					12
				);
			}
		}

		public function force_coming_soon_template( $template ) {
			if ( ! is_front_page() ) {
				wp_safe_redirect( home_url() );
				exit;
			}

			if ( is_front_page() ) {
				return OMNIPRESS_PATH . 'templates/coming-soon-page.php';
			}

			return $template;
		}
	}
}

new ComingSoonController();
