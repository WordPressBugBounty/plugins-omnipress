<?php

declare( strict_types = 1 );

namespace Omnipress\Blocks;

defined( 'ABSPATH' ) || exit;

use Omnipress\Core\AbstractAssetsHandler;

/**
 * Blocks assets handler.
 *
 * All frontend and editor assets are registered and enqueued here.
 *
 * @return void
 * @since 1.0.0
 */
class BlockAssetsManager extends AbstractAssetsHandler {
	const  DISABLED_BLOCKS_KEY                = 'omnipress_disabled_blocks';
	const OMNIPRESS_CONTAINER_BREAKPOINTS     = 'omnipress_container_breakpoints';
	const OMNIPRESS_CONTAINER_DEFAULT_STYLING = 'omnipress_container_default_styling';
	const OMNIPRESS_LIBRARY_BUTTON_OPTION     = 'omnipress_library_button_option';

	/**
	 * @inheritDoc
	 */
	public function enqueue_scripts(): void {
		call_user_func( 'Omnipress\Block\enqueue_frontend_assets' );
		wp_print_inline_script_tag(
			sprintf(
				'window._omnipress = %s;',
				wp_json_encode(
					array(
						'wc_nonce'      => wp_create_nonce( 'wc_store_api' ),
						'ajax_url'      => admin_url( 'admin-ajax.php' ),
						'op_nonce'      => wp_create_nonce( 'op_block' ),
						'wp_ajax_nonce' => wp_create_nonce( 'wp_ajax_nonce' ),
					)
				)
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function register_scripts(): void {
		$dependencies = array(
			'id'     => '@wordpress/interactivity',
			'import' => 'dynamic',
		);

		// Internal interactivity.
		wp_register_script_module( 'omnipress/woogrid', OMNIPRESS_URL . 'assets/block-interactivity/wc-block-module.js', $dependencies, OMNIPRESS_VERSION );
		wp_register_script_module( 'omnipress/module-query', OMNIPRESS_URL . 'assets/block-interactivity/module-query.js', $dependencies, OMNIPRESS_VERSION );
		$this->register_script_module( 'omnipress/woogrid', 'wc-block-module' );
		$this->register_script_module( 'omnipress/content/switcher', 'content-switcher', array(), filemtime( OMNIPRESS_PATH . 'assets/block-interactivity/content-switcher.js' ) );

		// External libraries.
		/**
		 * @since 1.6.2
		 */
		wp_register_script_module( 'omnipress-slider-view-script-module', OMNIPRESS_URL . 'build/blocks/slider/slider-view.js', array(), OMNIPRESS_VERSION );
		wp_register_script( 'op-lib-lightbox', OMNIPRESS_URL . 'assets/library/light-box/glightbox.min.js', array(), OMNIPRESS_VERSION, true );
		wp_register_script( 'op-lib-image-uploader', OMNIPRESS_URL . 'assets/library/image-uploader.js', array(), OMNIPRESS_VERSION, true );
		wp_register_script( 'op-lib-masonry', OMNIPRESS_URL . 'assets/library/masonry.js', array(), OMNIPRESS_VERSION, true );

		$module_scripts = glob( OMNIPRESS_PATH . 'build/js/client/interactivity-modules/*.js' );

		foreach ( $module_scripts as $module_script ) {
			if ( ! strpos( $module_script, 'chunk' ) ) {
				$module_script_path_arr = explode( '/', $module_script );
				$module_id              = str_replace( '.js', '', end( $module_script_path_arr ) );
				$this->register_script_module( 'omnipress/' . $module_id, $module_id, array(), filemtime( $module_script ) );
			}
		}
	}

	/**
	 * @inheritDoc
	 */
	public function register_and_enqueue_block_editor_scripts(): void {
		// Enqueue block editor assets.
		call_user_func( 'Omnipress\Block\enqueue_block_editor_assets' );
		wp_enqueue_script_module( 'omnipress-slider-view-script-module', OMNIPRESS_URL . 'build/blocks/slider/slider-view.js', array(), OMNIPRESS_VERSION );

		// Localize block editor scripts.
		$user_roles = array();
		foreach ( wp_roles()->roles as $key => $role ) {
			if ( ! is_array( $role ) ) {
				continue;
			}
			$user_roles[] = array(
				'label' => $role['name'],
				'value' => $key,
			);
		}

		$post_types = array();
		foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $key => $post_type ) {

			if ( ! is_object( $post_type ) ) {
				continue;
			}

			$post_types[] = array(
				'label' => $post_type->label,
				'value' => $post_type->name,
			);
		}

		$current_user_role     = wp_get_current_user()->roles[0];
		$restricted_user_roles = get_option( 'omnipress_restricted_user_roles', array() );
		$can_user_edit_block   = in_array( $current_user_role, $restricted_user_roles, true ) ? false : true;

		$localize_params = array(
			'breakpoints'           => get_option(
				'op_breakpoint',
				array(
					'mobile'  => '767px',
					'tablet'  => '976px',
					'desktop' => '1200px',
				)
			),
			'container_block_info'  => get_option(
				self::OMNIPRESS_CONTAINER_DEFAULT_STYLING,
				array(
					'padding' => '20px',
					'gap'     => '16px',
					'width'   => '1260px',
				)
			),
			'disabled_blocks'       => get_option( self::DISABLED_BLOCKS_KEY, array() ),
			'user_roles'            => $user_roles,
			'current_user_role'     => $current_user_role,
			'current_user_id'       => get_current_user_id(),
			'can_user_edit_block'   => $can_user_edit_block,
			'restricted_user_roles' => $restricted_user_roles,
			'library_button'        => get_option( self::OMNIPRESS_LIBRARY_BUTTON_OPTION, '1' ),
			'image_sizes'           => get_intermediate_image_sizes(),
			'current_theme'         => wp_get_theme()->get( 'Name' ),
			'current_post_id'       => get_the_ID(),
			'post_types'            => $post_types,
			'nonce'                 => wp_create_nonce( 'op_block' ),
			'ajax_url'              => admin_url( 'admin-ajax.php' ),
			'wp_ajax_nonce'         => wp_create_nonce( 'wp_ajax_nonce' ),
			'container_gap'         => get_option( 'omnipress_container_gap', '1rem' ),
			'wp_version'            => get_bloginfo( 'version' ),
			'is_acf_active'         => class_exists( 'acf' ),
			'is_metabox_active'     => class_exists( 'Metabox' ),
			'cf7_is_active'         => class_exists( 'WPCF7' ),
			'wc_is_active'          => class_exists( 'WooCommerce' ),
			'show_premium_notice'   => '1',

		);
		wp_localize_script(
			static::EDITOR_JS_ID,
			'op_blocks_info',
			$localize_params
		);
	}
	/**
	 * @inheritDoc
	 */
	public function enqueue_block_assets(): void {
		call_user_func( 'Omnipress\Block\enqueue_block_assets' );
	}
}

new BlockAssetsManager( OMNIPRESS_URL . 'assets/', OMNIPRESS_VERSION );
