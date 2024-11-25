<?php
namespace Omnipress\Models;

use Omnipress\Core\FileSystemUtil;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.


/**
 * Class GlobalStylesModel.
 *
 * Main class to handler global styles.
 *
 * @package Omnipress\Models
 *
 * @author omnipressteam
 *
 * @since 1.4.4
 */
final class GlobalStylesModel {
	public const GLOBAL_STYLES_COMPONENT_MODIFIED_TIME_KEY = 'op_gc_mtime';


	/**
	 * Cache and option name for global styles.
	 *
	 * @since 1.4.4
	 *
	 * @var string
	 */
	protected string $global_styles_option_name = 'omnipress_global_styles';

	/**
	 * Cache and option name for all block's valid styles attributes.
	 *
	 * @since 1.4.4
	 *
	 * @var string
	 */
	protected string $block_styles_attributes_option = 'omnipress_global_styles_attributes';

	/**
	 * Block's default styles component list.
	 *
	 * @since 1.4.4
	 *
	 * @var string
	 */
	protected string $blocks_default_component_option = 'omnipress_blocks_default_component';

	/**
	 * Get all global styles.
	 *
	 * @return array|bool Value of existing block's styles otherwise it returns false.
	 */
	public function get_global_styles() {

		$global_styles = get_transient( $this->global_styles_option_name );

		if ( ! $global_styles ) {
			$global_styles = get_option( $this->global_styles_option_name, array() );

			set_transient( $this->global_styles_option_name, $global_styles, DAY_IN_SECONDS );
		}

		return $global_styles;
	}

	/**
	 * Retrieves the styles for a specific block by its name.
	 *
	 * @param string $block_name The name of the block to retrieve styles for.
	 *
	 * @return array|bool   An associative array of styles for the specific block.
	 *                      Returns false if the block doesn't exist or has no styles.
	 */
	public function get_styles_by_block_name( string $block_name ) {
		$block_styles = $this->get_global_styles();
		return $block_styles[ $block_name ] ?? false;
	}

	/**
	 * Add the style for the specific block by its name.
	 *
	 * @param string $block_name Name of the block to save the style for.
	 *
	 * @param string $style_id Unique id to identify the style.
	 * @param array  $styles Array of styles which saved inside lists of the global styles for the specific block.
	 * @return bool
	 */
	public function add_style( string $block_name, string $style_id, array $styles ): bool {
		// update default style when added new style component on any block.
		$default_component_list = $this->get_blocks_valid_style_attributes();

		if ( isset( $style ) && $styles['isDefault'] ) {
			$default_component_list[ $block_name ] = $style_id;

			update_option( $this->blocks_default_component_option, $default_component_list );
		}

		$result = false;

		if ( ! empty( $styles ) ) {
			$global_styles = $this->get_global_styles();

			$global_styles[ $block_name ][ $style_id ] = $styles;

			$result = update_option( $this->global_styles_option_name, $global_styles );

			if ( $result ) {

				delete_transient( $this->global_styles_option_name );
			}
		}

		return $result;
	}

	/**
	 * Update style for a block.
	 */
	public function update_style( $block_name, $style_id, $style ): bool {
		return $this->add_style( $block_name, $style_id, $style );
	}


	/**
	 * Replace whole block component styles with new one.
	 */
	public function update_styles( array $styles ): bool {
		if ( ! empty( $styles ) && is_array( value: $styles ) ) {
			update_option( $this->global_styles_option_name, $styles );

			if ( update_option( self::GLOBAL_STYLES_COMPONENT_MODIFIED_TIME_KEY, time() ) ) {
				delete_transient( $this->global_styles_option_name );

				return true;
			}
		}

		return false;
	}
	/**
	 * Delete the style by its id within specific block.
	 *
	 * @param string $block_name Name of the block to delete the style for.
	 *
	 * @param string $style_id Unique id to identify specific style.
	 *
	 * @return bool True if the deleted specific styles otherwise return false.
	 */
	public function delete_style( string $block_name, string $style_id ): bool {
		$global_styles = $this->get_global_styles();
		$result        = false;

		if ( isset( $global_styles[ $block_name ][ $style_id ] ) ) {
			unset( $global_styles[ $block_name ][ $style_id ] );

			// Check if 'global_styles' for the block is empty after deletion, clean it up.
			if ( empty( $global_styles[ $block_name ] ) ) {
				unset( $global_styles[ $block_name ] );
			}

			$result = update_option( $this->global_styles_option_name, $global_styles );

			if ( $result ) {
				delete_transient( $this->global_styles_option_name );
			}
		}

		return $result;
	}


	/**
	 * Retrieves the valid style attributes for all blocks.
	 *
	 * Reads a JSON file containing block details and extracts the styles attributes for each block.
	 * Returns an array of styles attributes for all blocks if the JSON file is valid and not empty; otherwise, returns false.
	 *
	 * @return array|bool An array of styles attributes for all blocks if available; otherwise, false.
	 */
	public function get_blocks_valid_style_attributes() {
		$block_json    = FileSystemUtil::read_file( OMNIPRESS_PATH . 'assets/all-blocks-json.json' );
		$block_details = json_decode( $block_json, true );

		if ( is_array( $block_details ) && ! empty( $block_details ) ) {
			return array_map(
				function ( $block ) {
					return $block['styles_attributes'];
				},
				$block_details
			);

		}

		return false;
	}


	/**
	 * Retrieve the default style component of all omnipress block.
	 *
	 * @return void
	 */
	public function get_blocks_default_component_list() {
		return get_option( $this->blocks_default_component_option, array() );
	}

	public function component_styles() {
	}
}
