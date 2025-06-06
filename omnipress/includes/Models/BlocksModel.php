<?php

namespace Omnipress\Models;

use Omnipress\Blocks\BlockRegistrar;
require_once OMNIPRESS_PATH . 'includes/Blocks/BlockAssetsManager.php';


/**
 * Main entry point for blocks.
 *
 * @author omnipressteam
 *
 * @copyright (c) 2024
 */
class BlocksModel {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->define_block_constants();
		require_once OMNIPRESS_PATH . 'includes/Blocks/BlockStyles.php';

		// Requires all files which required for omnipress blocks.
		do_action( 'omnipress_before_blocks_register' );
		require_once OMNIPRESS_PATH . 'includes/Blocks/BlockRegistrar.php';
		$blocks_registrar = BlockRegistrar::init();
	}



	/**
	 * Define all blocks related constants.
	 *
	 * @return void
	 */
	public function define_block_constants() {
		if ( ! defined( 'OMNIPRESS_BLOCKS_PATH' ) ) {
			define( 'OMNIPRESS_BLOCKS_PATH', trailingslashit( OMNIPRESS_PATH . 'build/blocks/block-library/block-types' ) );
		}
		if ( ! defined( 'OMNIPRESS_BLOCKS_URL' ) ) {
			define( 'OMNIPRESS_BLOCKS_URL', trailingslashit( OMNIPRESS_URL . 'build/js/block-library/block-types' ) );
		}

		if ( ! defined( 'OMNIPRESS_BLOCKS_STYLES_PATH' ) ) {
			define( 'OMNIPRESS_BLOCKS_STYLES_PATH', trailingslashit( OMNIPRESS_PATH . 'build/css/blocks' ) );
		}
		if ( ! defined( 'OMNIPRESS_BLOCKS_STYLES_URL' ) ) {
			define( 'OMNIPRESS_BLOCKS_STYLES_URL', trailingslashit( OMNIPRESS_URL . 'build/css/blocks' ) );
		}

		if ( ! defined( 'OMNIPRESS_BLOCKS_VIEW_JS_PATH' ) ) {
			define( 'OMNIPRESS_BLOCKS_VIEW_JS_PATH', trailingslashit( OMNIPRESS_PATH . 'build/js/view-scripts' ) );
		}
		if ( ! defined( 'OMNIPRESS_BLOCKS_VIEW_JS_URL' ) ) {
			define( 'OMNIPRESS_BLOCKS_VIEW_JS_URL', trailingslashit( OMNIPRESS_URL . 'build/js/view-scripts' ) );
		}
	}
}

new BlocksModel();
