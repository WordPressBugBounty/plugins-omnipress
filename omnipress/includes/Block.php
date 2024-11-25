<?php
namespace Omnipress\Block;

use Omnipress\Blocks\BlockStyles;
use OMNIPRESS\Core\FileSystemUtil;
use Omnipress\Models\BlocksSettingsModel;
use Omnipress\Models\GlobalStylesModel;


defined( 'ABSPATH' ) || exit;
/**
 * All block editor's scripts.
 *
 * @return void
 */
function enqueue_editor_scripts() {
	$block_assets   = include OMNIPRESS_PATH . 'assets/build/js/blocks/block.asset.php';
	$environment    = wp_get_environment_type();
	$block_settings = new BlocksSettingsModel();

	$status['is_active'] = false;

	if ( class_exists( 'OmnipressPro\Edd\Edd' ) ) {
		$status = get_option( \OmnipressPro\Edd\Edd::LIC_STATUS_METAKEY, array( 'is_active' => false ) );
	}

	$localize = apply_filters(
		'_omnipress_blocks_localize',
		array(
			'nonce'                 => wp_create_nonce( '_omnipress_block_nonce' ),
			'omnipressVersion'      => OMNIPRESS_VERSION,
			'isDevmode'             => ( 'development' === $environment || 'local' === $environment ) ? true : false,
			'status'                => $status['is_active'],
			'urls'                  => array(
				'home'        => home_url(),
				'wpDashboard' => admin_url(),
				'omnipress'   => OMNIPRESS_URL,
			),
			'settings'              => array(
				'disabledBlocks' => $block_settings->get_disabled_blocks(),
			),
			'styleAttributes'       => ( new GlobalStylesModel() )->get_blocks_valid_style_attributes(),
			'blockGlobalComponents' => ( new GlobalStylesModel() )->get_global_styles(),
		)
	);

	wp_enqueue_script( 'omnipress-blocks', OMNIPRESS_URL . 'assets/build/js/blocks/block.js', $block_assets['dependencies'], $block_assets['version'], true );

	wp_enqueue_script( 'omnipress-store', OMNIPRESS_URL . 'assets/build/js/admin/store.js', array( 'regenerator-runtime', 'wp-api-fetch', 'wp-core-data', 'wp-data', 'wp-editor', 'wp-i18n', 'wp-notices' ), OMNIPRESS_VERSION, true );

	$block_recovery_deps = include OMNIPRESS_PATH . 'assets/build/js/blocks/block-recovery.asset.php';
	wp_enqueue_script_module( 'omnipress-auto-block-recovery', OMNIPRESS_URL . 'assets/build/js/blocks/block-recovery.js', $block_recovery_deps['dependencies'], $block_assets['version'], true );

	// wp_enqueue_script( 'omnipress-fonts-loader', OMNIPRESS_URL . 'assets/library/fonts-loader.js', array( 'wp-api-fetch', 'omnipress-blocks' ), OMNIPRESS_VERSION, true );

	wp_localize_script( 'omnipress-blocks', '_omnipress', apply_filters( 'omnipress_localize_admin_script', $localize ) );
}

/**
 * Register only editor styles.
 *
 * @return void
 */
function enqueue_editor_styles() {

	wp_enqueue_style( 'op-layout-editor-style', OMNIPRESS_URL . 'assets/build/css/editor/layout.min.css', array(), OMNIPRESS_VERSION );

	wp_enqueue_style( 'op-blocks-editor-style', OMNIPRESS_URL . 'assets/build/css/editor/style.min.css', array(), OMNIPRESS_VERSION );

	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', array(), OMNIPRESS_VERSION );
}

/**
 *
 * Enqueue only editor's assets.
 *
 * @return void
 */
function enqueue_block_editor_assets() {
	if ( is_admin() ) {
		call_user_func( 'Omnipress\Block\enqueue_editor_scripts' );
		call_user_func( 'Omnipress\Block\enqueue_editor_styles' );
	}
}

/**
 * Enqueue block's assets which required on frontend and backend.
 *
 * @return void
 */
function enqueue_block_assets() {
	// register critical css inline.
	$container_css = FileSystemUtil::read_file( OMNIPRESS_PATH . 'assets/build/css/blocks/container-layout.min.css' );

	if ( is_string( $container_css ) && ! empty( $container_css ) ) {
		wp_register_style( 'omnipress/block/container', false, array(), filemtime( OMNIPRESS_PATH . 'assets/build/css/blocks/container-layout.min.css' ) );
		wp_add_inline_style( 'omnipress/block/container', $container_css );
		wp_enqueue_style( 'omnipress/block/container' );
	}

	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', array(), OMNIPRESS_VERSION );
	wp_enqueue_style( 'omipress/blocks/styles', OMNIPRESS_URL . 'assets/build/css/frontend/frontend.min.css', array(), OMNIPRESS_VERSION );
	wp_register_style( 'omnipress/block/layout', OMNIPRESS_URL . 'assets/build/css/layout.min.css', array(), OMNIPRESS_VERSION );

	/**
	 * All external library js.
	 */
	// register swiper js and css.
	wp_register_script( 'omnipress-slider-script', OMNIPRESS_URL . 'assets/library/swiper.js', array(), 'v11.1.12', true );
	wp_register_style( 'omnipress-slider-style', OMNIPRESS_URL . 'assets/library/css/swiper.css', array(), 'v11.1.12' );
}

/**
 * Function register_module_scripts for interactivity api
 *
 * @author omnipressteam
 *
 * @return void
 */
function register_module_scripts(): void {
	$dependencies = array(
		'id'     => '@wordpress/interactivity',
		'import' => 'dynamic',
	);

	\wp_register_script_module( 'omnipress/woogrid', OMNIPRESS_URL . 'assets/block-interactivity/wc-block-module.js', $dependencies, OMNIPRESS_VERSION );
}

/**
 * Enqueue all block's frontend assets.
 *
 * @return void
 */
function enqueue_frontend_assets() {
	call_user_func( 'Omnipress\Block\enqueue_generated_styles' );
}

/**
 * Enqueue generated styles from omnipress-block-styles.
 *
 * Required stylesheets for omnipress blocks are:
 * - {template_slug}.css    <Stylesheet which contains all blocks styles for current template.>
 * - {post_id}.css              <Stylesheet which contains all blocks styles for current post.>
 * - ( $post_id | $template_slug )_default-block.css              <Stylesheet which contains all default styles for each used block.>
 *
 * @return void
 */
function enqueue_generated_styles() {
	global $post;

	$post_id              = $post ? $post->ID : '404';
	$block_style_instance = BlockStyles::init();

	$template_slug = $block_style_instance->get_template_slug();

	// Block's Dynamic styles styles which generated during creating post. According to each block's attributes values.
	if ( file_exists( OMNIPRESS_BLOCK_STYLES_PATH . $post_id . '.css' ) ) {
		wp_enqueue_style( 'omnipress-post-block-styles', OMNIPRESS_BLOCK_STYLES_URL . $post_id . '.css', array(), filemtime( OMNIPRESS_BLOCK_STYLES_PATH . $post_id . '.css' ) );
	}

	// Block's Dynamic styles styles which generated during creating template. According to each block's attributes values.
	if ( file_exists( OMNIPRESS_BLOCK_STYLES_PATH . $template_slug . '.css' ) ) {
		wp_enqueue_style( 'omnipress-template-block-styles', OMNIPRESS_BLOCK_STYLES_URL . $template_slug . '.css', array(), filemtime( OMNIPRESS_BLOCK_STYLES_PATH . $template_slug . '.css' ) );
	}
}
