<?php

namespace Omnipress\Blocks;

use OMNIPRESS\Core\FileSystemUtil;
use Omnipress\Helpers\BlockStylesHelper;
use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Traits\Singleton;

defined( 'ABSPATH' ) || exit;


/**
 * Blocks styles handler
 *
 * Generate styles for each blocks which used in post or page or template.
 *
 * Here we generate styles for each block which used in post or page or template.
 * Styles are generated according to block's attributes values.
 *
 * And merged initial block's styles into one file.
 *
 * @since 1.4.1
 *
 * @author Omnipressteam
 * @copyright (c) 2024
 */
class BlockStyles {
	use Singleton;

	public array $rendered_blocks = array();

	/**
	 * Constructor
	 */
	private function __construct() {

		add_action( 'wp_footer', array( $this, 'maybe_generate_block_styles' ), 10 );

		add_action(
			'save_post',
			function ( $id, $content ) {
				update_option( OMNIPRESS_POST_EDIT_TIME, time() );
			},
			10,
			2
		);

		add_filter( 'render_block', array( $this, 'render_callback' ), 10, 3 );

		if ( class_exists( 'WooCommerce' ) ) {
			add_filter( 'current_page_template', array( $this, 'get_wc_default_template_slug' ), 20, 2 ); // get WooCommerce page default template if any custom template not assign.
		}
	}


	/**
	 * We are collecting blocks which used inside current post.
	 *
	 * @param string $content Block's content.
	 * @param array  $block Serialized block.
	 * @return mixed
	 */
	public function render_callback( string $content, array $block, \WP_Block $block_instance ) {

		if ( ! empty( $block['blockName'] ) && false !== strpos( $block['blockName'], 'omnipress/' ) ) {
			$content = apply_filters( 'omnipress_block_render', $content, $block, $block_instance );

			$this->rendered_blocks[] = $block;
		}

		return $content;
	}


	/**
	 * Find current page's template slug.
	 *
	 * @return mixed
	 */
	public function get_template_slug() {
		global $post;

		if ( ! $post && is_404() ) {
			return '404';
		}

		$template_slug = $post ? get_page_template_slug( $post->ID ) : '';

		$template_slug = apply_filters( 'current_page_template', $template_slug, $post );

		if ( empty( $template_slug ) ) {
			/*   Get default template slug for front-page. */
			if ( is_front_page() ) {
				switch ( get_option( 'show_on_front' ) ) {
					case 'page':
						$template_slug = 'page';
						break;

					case 'posts':
						$template_slug = 'home';
						break;

					default:
						$template_slug = 'home';
				}
			} else {
				switch ( $post->post_type ) {
					case 'post':
						$template_slug = 'single';
						break;

					case 'page':
						$template_slug = 'page';
						break;

					default:
						$template_slug = 'single';
				}
			}
		}
		$template_slug = GeneralHelpers::convertToHyphen( $template_slug );

		return $template_slug;
	}

	/**
	 * Retrieve WooCommerce pages default template slug if not assign custom template.
	 *
	 * @param mixed $current_template_slug current template slug.
	 * @return mixed
	 */
	public function get_wc_default_template_slug( $current_template_slug ) {
		if ( ! class_exists( 'WooCommerce' ) || ! empty( $template_slug ) ) {
			return $current_template_slug;
		}

		if ( is_cart() ) {
			return 'cart';
		} elseif ( is_product() ) {
			return 'single-product';
		} elseif ( is_shop() ) {
			return 'archive-product';
		} elseif ( is_checkout() ) {
			return 'checkout';
		} elseif ( is_account_page() ) {
			return 'page';
		}

		return $current_template_slug;
	}

	/**
	 * Flatten nested inner blocks.
	 *
	 * @param array $blocks
	 * @return array
	 */
	public function flatten_innerBlocks( array $blocks ) {
		$inner_blocks = array();

		if ( GeneralHelpers::is_valid_array( $blocks ) ) {
			foreach ( $blocks as $block ) {
				if ( ! empty( $block['innerBlocks'] ) ) {
					$inner_blocks = array_merge( $inner_blocks, $this->flatten_innerBlocks( $block['innerBlocks'] ) );
				}

				if ( ! empty( $block['blockName'] ) && false !== strpos( $block['blockName'], 'omnipress/' ) ) {
					$inner_blocks[] = $block;
				}
			}
		}

		return $inner_blocks;
	}

	public function get_current_page_dynamic_style_path() {
		$template_slug = $this->get_template_slug();
		$post_id       = GeneralHelpers::get_current_unique_context_id();

		return $post_id ? OMNIPRESS_BLOCK_STYLES_PATH . $post_id . '.css' : OMNIPRESS_BLOCK_STYLES_PATH . $template_slug . '.css';
	}

	public function filter_unique_blocks_by_name( $block_list ) {
		$unique_blocks = array();

		foreach ( $block_list as $block ) {
			if ( isset( $block['blockName'] ) ) {
				$block_name = $block['blockName'];

				if ( ! in_array( $block_name, $unique_blocks, true ) ) {
					$unique_blocks[] = $block_name;
				}
			}
		}

		return $unique_blocks;
	}


	/**
	 * Checks if block styles need to be generated and generates them if necessary.
	 *
	 * @return void
	 */
	public function maybe_generate_block_styles() {
		$current_page_blocks_styles_path = $this->get_current_page_dynamic_style_path();

		if ( BlockStylesHelper::are_block_styles_generated( $this->get_current_page_dynamic_style_path() ) ) {
			return;
		}

		$all_used_blocks = $this->rendered_blocks;

		if ( empty( $this->rendered_blocks ) ) {
			return;
		}

		$block_lists = $this->filter_unique_blocks_by_name( $all_used_blocks );

		$blocks_generated_css = BlockStylesHelper::get_block_initial_styles( $block_lists );

		$blocks_generated_css .= BlockStylesHelper::generate_parsed_block_styles( $all_used_blocks );

		try {
			if ( ! file_exists( OMNIPRESS_BLOCK_STYLES_PATH ) ) {
				if ( ! wp_mkdir_p( OMNIPRESS_BLOCK_STYLES_PATH ) ) {
					error_log( 'Error: Failed to create omnipress folder in css folder.' );// phpcs:ignore
				}
			}

			if ( FileSystemUtil::write_file( $current_page_blocks_styles_path, $blocks_generated_css ) ) {
				// When the style is generated for the first time, it won’t be in the enqueued style file, so we add it as inline style at the time of generation. The next time, it will be enqueued from the file. This inline style code runs whenever we edit content and view it for the first time immediately after editing.
				echo '<style class="omnipress-blocks-generated-styles">' . $blocks_generated_css . '</style>';
				error_log( 'Successfully generated block styles for ' . $current_page_blocks_styles_path ); // phpcs:ignore
			}
		} catch ( \Exception $exception ) {
			throw $exception;
		}
	}
}

BlockStyles::init();
