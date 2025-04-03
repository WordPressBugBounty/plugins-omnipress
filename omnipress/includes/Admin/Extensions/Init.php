<?php

declare(strict_types=1);

namespace Omnipress\Admin\Extensions;

use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( Init::class ) ) {
	/**
	 * Register settings for extensions
	 *
	 * @since 1.6.0
	 *
	 * @package Omnipress\Admin\Extensions
	 */
	class Init {

		use Singleton;

		private function __construct() {
			add_action( 'admin_init', array( $this, 'register_extensions_settings' ) );
			add_filter( 'omnipress_sub_menus', array( $this, 'add_settings_page' ) );
		}

		public function add_settings_page( array $existing_sub_menus ) {
			$existing_sub_menus[] = array(
				'parent_slug' => 'omnipress',
				'page_title'  => __( 'Extensions', OMNIPRESS_I18N ),
				'menu_title'  => __( 'Extensions', OMNIPRESS_I18N ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'omnipress-extensions',
				'callback'    => array( $this, 'render_extensions_page' ),
			);

			return $existing_sub_menus;
		}

		/**
		 * Render extensions page template.
		 *
		 * @since 1.6.0
		 * @return void
		 */
		public function render_extensions_page(): void {
			include_once OMNIPRESS_TEMPLATES_PATH . 'admin/extensions.php';
		}


		/**
		 * @return mixed|null
		 */
		public function get_extensions() {
			return apply_filters(
				'omnipress_admin_extensions',
				array(
					'coming-soon',
					'tax-image',
				)
			);
		}

		/**
		 * This function is used for all extensions to process the input data before sanitization,
		 * ensuring that the data is securely saved. Each extension's settings are defined by
		 * their respective slugs, which contain the names and types of the settings fields.
		 * For example, for the "coming-soon" settings, the fields might look like this:
		 * array(
		 *     'coming-soon' => array(
		 *         array(
		 *             'name' => 'enabled',
		 *             'type' => 'checkbox',
		 *         ),
		 *         array(
		 *             'name' => 'post_id',
		 *             'type' => 'number',
		 *         ),
		 *     )
		 * )
		 * All this data is saved in the 'op_extension' option, making it easier to organize
		 * and manage settings related to all extensions.
		 *
		 * @return array
		 */
		public function get_input_fields(): array {
			return apply_filters( 'omnipress_extension_setting_fields', array() );
		}

		/**
		 * Register Extension Settings
		 *
		 * @since 1.6.0
		 *
		 * @return void
		 */
		public function register_extensions_settings() {
			register_setting(
				Extensions::OPTION_NAME . '_settings',
				Extensions::OPTION_NAME,
				array(
					'sanitize_callback' => array( $this, 'sanitize_settings' ),
					'default'           => array(),
				)
			);
		}

		public function handle_coming_soon_settings( $input ) {

			$prev_settings = Extensions::get_settings();

			if ( empty( $input['coming-soon']['post_id'] ) && ! empty( $prev_settings['coming-soon']['post_id'] ) ) {
				$input['coming-soon']['post_id'] = $prev_settings['coming-soon']['post_id'];
			}

			$coming_soon_fields = $input['coming-soon'] ?? array();
			$post_id            = $coming_soon_fields['post_id'] ?? 0;
			$bypass_url         = $coming_soon_fields['bypass_url'] ?? '';
			$bypass_url_timeout = $coming_soon_fields['bypass_url_timeout'] ?? 0;

			// saved coming soon bypass query setting in  transient.
			$previous_bypass_url = get_transient( 'omnipress_coming_soon_bypass_url' );

			if ( ! empty( $bypass_url ) && $previous_bypass_url !== $bypass_url ) {
				if ( empty( $bypass_url_timeout ) ) {
					$bypass_url_timeout                         = 24;
					$input['coming-soon']['bypass_url_timeout'] = $bypass_url_timeout;
				}
				set_transient( 'omnipress_coming_soon_bypass_url', $coming_soon_fields['bypass_url'], $bypass_url_timeout * HOUR_IN_SECONDS );
			}

			// Handle by default post when not Already set coming page.
			if ( empty( $post_id ) || ! get_post( $post_id ) ) {
				$args = array(
					'post_type'      => 'page',
					'title'          => 'Coming Soon',
					'posts_per_page' => 1,
					'post_status'    => 'publish',
				);

				$query = new \WP_Query( $args );
				if ( $query->have_posts() ) {
					$post_id = $query->posts[0]->ID;
					wp_reset_postdata();
				} else {
					$content = '<!-- wp:omnipress/container {"blockId":"8b48e58d","columnWidth":"is-layout-flex is-layout-flow","preview":false,"styles":{"wrapper":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"minHeight":"100vh"},"flex":{"alignItems":"stretch","flexDirection":"column"}}} -->
					<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper is-layout-flex is-layout-flow"><!-- wp:cover {"url":"https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-4.0.3\u0026auto=format\u0026fit=crop\u0026w=1350\u0026q=80","alt":"Coming Soon Background","dimRatio":50,"focalPoint":{"x":0.49,"y":0.42},"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","className":"is-dark"} -->
					<div class="wp-block-cover alignfull is-dark" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="Coming Soon Background" src="https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" style="object-position:49% 42%" data-object-fit="cover" data-object-position="49% 42%"/><div class="wp-block-cover__inner-container"><!-- wp:omnipress/heading {"blockId":"bc79001a","headingType":"h1","styles":{"wrapper":{"margin":{"bottom":"60px"}},"headingStyles":{"textAlign":"center"}}} -->
					<div class="wp-block-omnipress-heading op-block__heading-wrapper--bc79001a op-bc79001a op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h1 class="op-block__heading-content">Coming Soon</h1></div>
					<!-- /wp:omnipress/heading -->

					<!-- wp:omnipress/container {"blockId":"883fb47e","preview":false,"styles":{"wrapper":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"flex":{"justifyContent":"space-evenly"}}} -->
					<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/container {"blockId":"a1faef50","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
					<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"3915eb35","headingType":"h4","styles":{"wrapper":{}}} -->
					<div class="wp-block-omnipress-heading op-block__heading-wrapper--3915eb35 op-3915eb35 op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Follow Us</h4></div>
					<!-- /wp:omnipress/heading -->

					<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
					<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->

					<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->

					<!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->

					<!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /--></ul>
					<!-- /wp:social-links --></div></div>
					<!-- /wp:omnipress/container -->

					<!-- wp:omnipress/container {"blockId":"ad018368","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
					<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"9dae67bd","headingType":"h4","styles":{"wrapper":{}}} -->
					<div class="wp-block-omnipress-heading op-block__heading-wrapper--9dae67bd op-9dae67bd op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Contact Us</h4></div>
					<!-- /wp:omnipress/heading -->

					<!-- wp:omnipress/paragraph {"blockId":"083c637b","content":"Sign up for updates!","styles":{"wrapper":{}}} -->
					<p class="wp-block-omnipress-paragraph op-083c637b" data-type="omnipress/paragraph" data-op-animation="">Sign up for updates!</p>
					<!-- /wp:omnipress/paragraph --></div></div>
					<!-- /wp:omnipress/container -->

					<!-- wp:omnipress/container {"blockId":"6af98af0","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
					<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"1ca4c5d6","headingType":"h4","styles":{"wrapper":{}}} -->
					<div class="wp-block-omnipress-heading op-block__heading-wrapper--1ca4c5d6 op-1ca4c5d6 op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Stay Updated</h4></div>
					<!-- /wp:omnipress/heading -->

					<!-- wp:omnipress/paragraph {"blockId":"0c3511f9","content":"Email: hello@example.com","styles":{"wrapper":{}}} -->
					<p class="wp-block-omnipress-paragraph op-0c3511f9" data-type="omnipress/paragraph" data-op-animation="">Email: hello@example.com</p>
					<!-- /wp:omnipress/paragraph --></div></div>
					<!-- /wp:omnipress/container --></div></div>
					<!-- /wp:omnipress/container -->

					<!-- wp:spacer {"height":"40px"} -->
					<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->

					<!-- wp:omnipress/paragraph {"blockId":"912e79ce","content":"© 2025 Your Site Name","styles":{"wrapper":{"textAlign":"center"}}} -->
					<p class="wp-block-omnipress-paragraph op-912e79ce" data-type="omnipress/paragraph" data-op-animation="">© 2025 Your Site Name</p>
					<!-- /wp:omnipress/paragraph --></div></div>
					<!-- /wp:cover --></div></div>
					<!-- /wp:omnipress/container -->';

					$post_id = wp_insert_post(
						array(
							'post_title'   => 'Coming Soon',
							'post_content' => $content,
							'post_status'  => 'publish',
							'post_type'    => 'page',
						)
					);

				}
				$input['coming-soon']['post_id'] = $post_id;
			}
			return $input;
		}

		/**
		 * Retrieve all the extension's fields sanitized current extension's changes input values.
		 *
		 * @param array|mixed $input The input data to be sanitized.
		 *
		 * @since 1.6.0
		 * @return array|false|mixed
		 */
		public function sanitize_settings( $input ) {
			$output            = Extensions::get_settings( $input );
			$current_extension = $input['tab'];
			$extension_fields  = $this->get_input_fields()[ $current_extension ] ?? array();

			if ( empty( $current_extension ) ) {
				return $output;
			}

			if ( 'coming-soon' === $current_extension ) {
				$input = $this->handle_coming_soon_settings( $input );
			}

			if ( GeneralHelpers::is_valid_array( $extension_fields ) ) {
				foreach ( $extension_fields as $setting_field ) {

					switch ( $setting_field['type'] ) {
						case 'checkbox':
						case 'int':
						case 'number':
							$output[ $current_extension ][ $setting_field['name'] ] = (int) sanitize_text_field( $input[ $current_extension ][ $setting_field['name'] ] ?? 0 );
							break;

						case 'textarea':
						case 'text':
						case 'select':
							$output[ $current_extension ][ $setting_field['name'] ] = sanitize_text_field( $input[ $current_extension ][ $setting_field['name'] ] ?? '' );
							break;

						case 'array':
						case 'object':
							$output[ $current_extension ][ $setting_field['name'] ] = $input[ $current_extension ][ $setting_field['name'] ] ?? array();
							break;

					}
				}
			}

			return $output;
		}
	}
}
