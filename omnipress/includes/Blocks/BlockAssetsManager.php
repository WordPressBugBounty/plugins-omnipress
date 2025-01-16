<?php

namespace Omnipress\Blocks;

/**
 * Blocks assets handler.
 *
 * All frontend and editor assets are registered and enqueued here.
 *
 * @return void
 * @since 1.0.0
 */
class BlockAssetsManager {
	/**
	 * Constructor
	 */
	public function __construct() {
		call_user_func( array( $this, 'register_interactive_module_scripts' ) );

		// Block's editor only assets.
		add_action( 'enqueue_block_assets', 'Omnipress\Block\enqueue_block_editor_assets', 12 );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ), 12 );

		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
	}


	/**
	 * Block assets which required frontend and also editor.
	 *
	 * @return void
	 */
	public function block_assets() {
		call_user_func( 'Omnipress\Block\enqueue_block_assets' );
	}

	/**
	 * Frontend only assets like module scripts, view scripts and other styles which required on frontend for blocks
	 *
	 * @return void
	 */
	public function enqueue_frontend_assets() {
		call_user_func( 'Omnipress\Block\enqueue_frontend_assets' );

		// Regsiter all module scripts within assets/build/js/client/interactivity-modules/ folder.
		$module_scripts = glob( OMNIPRESS_PATH . 'assets/build/js/client/interactivity-modules/*.js' );

		foreach ( $module_scripts as $module_script ) {
			if ( strpos( $module_script, 'chunk' ) == false ) {
				$module_script_path_arr = explode( '/', $module_script );
				$module_id              = str_replace( '.js', '', end( $module_script_path_arr ) );

				wp_register_script_module(
					'omnipress/' . $module_id,
					OMNIPRESS_URL . 'assets/build/js/client/interactivity-modules/' . $module_id . '.js',
					array(
						array(
							'id'     => '@wordpress/interactivity',
							'import' => 'dynamic',
						),
						array(
							'id'     => '@wordpress/interactivity-router',
							'import' => 'dynamic',
						),
					),
					filemtime( $module_script )
				);
			}
		}

		// localize scripts for frontend .
		wp_print_inline_script_tag(
			sprintf(
				'window._omnipress = %s;',
				wp_json_encode(
					array(
						'wc_nonce' => wp_create_nonce( 'wc_store_api' ),
						'ajax_url' => admin_url( 'admin-ajax.php' ),
					)
				)
			)
		);
	}

	/**
	 * Register interactive module scripts
	 *
	 * @return void
	 */
	public function register_interactive_module_scripts() {
		$dependencies = array(
			'id'     => '@wordpress/interactivity',
			'import' => 'dynamic',
		);

		\wp_register_script_module( 'omnipress/woogrid', OMNIPRESS_URL . 'assets/block-interactivity/wc-block-module.js', $dependencies, OMNIPRESS_VERSION );
		\wp_register_script_module( 'omnipress/content/switcher', OMNIPRESS_URL . 'assets/block-interactivity/content-switcher.js', $dependencies, filemtime( OMNIPRESS_PATH . 'assets/block-interactivity/content-switcher.js' ) );

		\wp_register_script_module( 'omnipress/woogrid', OMNIPRESS_URL . 'assets/block-interactivity/wc-block-module.js', $dependencies, OMNIPRESS_VERSION );
	}
}

new BlockAssetsManager();
