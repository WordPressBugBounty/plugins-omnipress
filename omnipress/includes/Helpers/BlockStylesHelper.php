<?php

namespace Omnipress\Helpers;

use OMNIPRESS\Core\FileSystemUtil;
use Omnipress\Core\StyleGenerator;
use Omnipress\Models\GlobalStylesModel;

defined( 'ABSPATH' ) || exit;

/**
 * Class BlockStylesHelper
 *
 * @author Ishwor Khadka <asishwor@gmail.com>
 * @package app\core
 */

class BlockStylesHelper {
	/**
	 * Generate block styles.
	 *
	 * @since 1.4.4
	 *
	 * @param array $parsed_block Parsed block content which get before rendering.
	 *
	 * @return void
	 */
	public static function generate_block_styles( array $parsed_block, object $metadata, string &$generated_css, $is_synced ) {
		// generate styles for each block.
		$block_name = $parsed_block['blockName'];
		$block_id   = $is_synced ? 'synced-' . $parsed_block['attrs']['componentId'] ?? ' ' : $parsed_block['attrs']['blockId'] ?? '';

		$wrapper_selector = $block_id ? "[data-type*='{$block_name}'].op-{$block_id} " : ' ';

		$block_attrs = isset( $parsed_block['attrs'] ) ? $parsed_block['attrs'] : null;

		// Merge the block's attributes with default values to ensure it renders with initial styles.
		// If the initial attributes are not merged, the block will only reflect changes made in the editor
		// and will not use default values for attributes that haven’t been modified.
		$default_attributes = GeneralHelpers::get_block_default_values( $parsed_block['blockName'] );

		$block_attributes = array_merge( $default_attributes ?? array(), $block_attrs ?? array() );

		if ( GeneralHelpers::is_valid_array( $block_attributes ) ) {
			foreach ( $block_attributes as $key => $value ) {

				if ( 'layout' === $key ) {

					if ( ! empty( $value['grid'] ) ) {
						$generated_css .= ( new StyleGenerator( $value['grid'], $wrapper_selector ) )->generate_styles();
					}

					if ( ! empty( $value['flex'] ) ) {
						$generated_css .= ( new StyleGenerator( $value['flex'], $wrapper_selector ) )->generate_styles();
					}

					continue;
				}

				if ( ! empty( $value ) ) {

					if ( is_array( $value ) && ! empty( $value ) && in_array( $key, $metadata->styles_attributes, true ) ) {
						$current_selector = isset( $metadata->selectors->{$key} ) ? $metadata->selectors->{$key} : '';
						$css_selector     = static::prefix_selectors( $current_selector, $wrapper_selector );

						$generated_css .= ( new StyleGenerator( $value, $css_selector ) )->generate_styles();

					}
				}
			}
		}
	}

	/**
	 *
	 * Add prefix to selectors.
	 *
	 * @param array|string $selectors List of selectors.
	 * @param string       $common_selector Block's parent selector.
	 * @return string
	 */
	public static function prefix_selectors( $selectors, string $common_selector ): string {

		if ( ! isset( $selectors ) && ! empty( $selectors ) ) {
			return (string) $common_selector;
		}

		$selectors_array = array_map( 'trim', explode( ',', $selectors ) );

		$prefixed_selectors = array_map( fn( $selector ) => "{$common_selector} {$selector}", $selectors_array );

		return implode( ', ', $prefixed_selectors );
	}


	/**
	 * Generate parsed block styles.
	 *
	 * @param array $blocks List of parsed blocks.
	 * @return string
	 */
	public static function generate_parsed_block_styles( array $blocks ): string {
		$all_blocks_metadata = wp_json_file_decode( OMNIPRESS_PATH . 'assets/all-blocks-json.json' );

		$generated_css = '';

		$synced_component_components = array();

		$synced_blocks = array();

		if ( GeneralHelpers::is_valid_array( $blocks ) ) {

			foreach ( $blocks as  $block ) {
				$metadata = $all_blocks_metadata->{$block['blockName'] ?? ''} ?? null;

				if ( empty( $metadata ) ) {
					continue;
				}

				$is_synced_with_component = isset( $block['attrs']['isSynced'] ) && $block['attrs']['isSynced'];

				if ( $is_synced_with_component && ! isset( $synced_component_components[ $block['attrs']['componentId'] ] ) ) {
					if ( isset( $synced_blocks[ $block['attrs']['componentId'] ] ) ) {
						continue;
					}

					$block = static::update_synced_block_attributes( $block );
					$synced_blocks[ $block['attrs']['componentId'] ] = $block;
				}

				static::generate_block_styles( $block, $metadata, $generated_css, $is_synced_with_component );
			}

			do_action( 'omnipress_blocks_style_generation', $generated_css, $synced_component_components );

		}
		return $generated_css;
	}

	/**
	 *
	 * Add Global component instead of block attributes.
	 *
	 * @param array $block Block's properties.
	 * @return array
	 */
	public static function update_synced_block_attributes( $block ): array {
		$model             = new GlobalStylesModel();
		$global_components = $model->get_global_styles();

		if ( GeneralHelpers::is_valid_array( $global_components ) ) {
			foreach ( $global_components as $block_name => $components ) {

				if ( GeneralHelpers::is_valid_array( $components ) ) {
					foreach ( $components as $key => $component ) {
						if ( $key === $block['attrs']['componentId'] ) {
							$updated_block_attributes = array_merge( $block['attrs'], $component );
							$block['attrs']           = $updated_block_attributes;
							return $block;
						}
					}
				}
			}
		}
		return $block;
	}

	public static function get_block_initial_styles( $blocks ) {

		$css = '';

		if ( GeneralHelpers::is_valid_array( $blocks ) ) {

			foreach ( $blocks as $block ) {
				if ( empty( $block ) ) {
					continue;
				}

				$block_name = $block;

				if ( isset( $block_name ) ) {

					$css_file_name = explode( '/', $block_name )[1] . '.min.css';

					$stylesheet_path = OMNIPRESS_PATH . "assets/build/css/blocks/{$css_file_name}";

					if ( file_exists( $stylesheet_path ) ) {

						$css .= FileSystemUtil::read_file( $stylesheet_path );
					}
				}
			}
		}

		return $css;
	}

	public static function are_block_styles_generated( $file_path ) {

		if ( ! file_exists( $file_path ) ) {
			return false;
		}

		$global_styles_modified_time = (int) get_option( GlobalStylesModel::GLOBAL_STYLES_COMPONENT_MODIFIED_TIME_KEY, false );
		$latest_post_edit_time       = (int) get_option( OMNIPRESS_POST_EDIT_TIME, false );
		$last_generated_time         = (int) filemtime( $file_path );

		return max( $global_styles_modified_time, $latest_post_edit_time ) < $last_generated_time;
	}
}
