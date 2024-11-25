<?php

namespace Omnipress\Blocks;

/**
 * Blocks assets handler.
 *
 * All frontend and editor assets are registered and enqueued here.
 *
 * @since 1.0.0
 *
 * @return void
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
