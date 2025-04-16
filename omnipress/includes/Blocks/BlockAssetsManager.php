<?php

namespace Omnipress\Blocks;

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
	/**
	 * @inheritDoc
	 */
	public function register_and_enqueue_block_editor_scripts(): void {
		call_user_func( 'Omnipress\Block\enqueue_block_editor_assets' );
	}

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

		\wp_register_script_module( 'omnipress/woogrid', OMNIPRESS_URL . 'assets/block-interactivity/wc-block-module.js', $dependencies, OMNIPRESS_VERSION );
		\wp_register_script_module( 'omnipress/module-query', OMNIPRESS_URL . 'assets/block-interactivity/module-query.js', $dependencies, OMNIPRESS_VERSION );

		$this->register_script_module( 'omnipress/woogrid', 'wc-block-module' );
		$this->register_script_module( 'omnipress/content/switcher', 'content-switcher', array(), filemtime( OMNIPRESS_PATH . 'assets/block-interactivity/content-switcher.js' ) );

		$module_scripts = glob( OMNIPRESS_PATH . 'assets/build/js/client/interactivity-modules/*.js' );

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
	public function enqueue_block_assets(): void {
		call_user_func( 'Omnipress\Block\enqueue_block_assets' );
	}
}

new BlockAssetsManager( OMNIPRESS_URL . 'assets/', OMNIPRESS_VERSION );
