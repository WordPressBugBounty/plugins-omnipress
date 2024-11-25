<?php
/**
 * Class for providing helper methods for omnipress.
 *
 * @package Omnipress
 */

namespace Omnipress\Helpers;

/**
 * Class for providing helper methods for omnipress.
 *
 * @since 1.1.0
 */
class GeneralHelpers {
	public static function is_valid_array( $array ) {
		return is_array( $array ) && ! empty( $array );
	}

	/**
	 * Get template parts by template parts slug and theme.
	 *
	 * @param mixed $template_parts_attrs
	 *
	 * @return \WP_Block_Template|null
	 */
	public static function get_template_parts( array $template_parts_attrs ) {

		if ( static::is_valid_array( $template_parts_attrs ) ) {
			return get_block_template( "{$template_parts_attrs['theme']}//{$template_parts_attrs['slug']}", 'wp_template_part' );
		}

		return null;
	}

	public static function is_omnipress_block( $block ) {
		return isset( $block['blockName'] ) && false !== strpos( $block['blockName'], 'omnipress/' );
	}

	public static function has_inner_blocks( $block ) {
		return isset( $block['innerBlocks'] ) && static::is_valid_array( $block['innerBlocks'] );
	}

	public static function retrieve_template_parts_blocks( $template_parts_attrs, &$omnipress_blocks ) {
		$template_parts = static::get_template_parts( $template_parts_attrs );

		if ( null === $template_parts ) {
			return;
		}

		$blocks = parse_blocks( $template_parts->content );

		static::retrieve_omnipress_blocks( $blocks, $omnipress_blocks );
	}


	public static function retrieve_omnipress_blocks( array $blocks, &$omnipress_blocks ) {

		if ( static::is_valid_array( $blocks ) ) {

			foreach ( $blocks as $block ) {

				if ( static::is_omnipress_block( $block ) ) {

					$omnipress_blocks[] = $block;
				}

				// handle reusable blocks (patterns).
				if ( 'core/block' === $block['blockName'] ) {
					$reusable_inner_blocks = static::get_reusable_block_inner_blocks( $block['attrs']['ref'] );

					static::retrieve_omnipress_blocks( $reusable_inner_blocks, $omnipress_blocks );

					continue;
				}

				// search inside template parts.
				if ( 'core/template-part' === $block['blockName'] ) {
					static::retrieve_template_parts_blocks( $block['attrs'], $omnipress_blocks );

					continue;
				}

				if ( static::has_inner_blocks( $block ) ) {
					static::retrieve_omnipress_blocks( $block['innerBlocks'], $omnipress_blocks );
				}
			}

			// search nested blocks.
		}
	}

	/**
	 * Get the inner blocks and attributes of a reusable block.
	 *
	 * @param int $reusable_block_id The ID of the reusable block (wp_block post type).
	 * @return array Array of inner blocks with attributes, or an empty array if not found.
	 */
	public static function get_reusable_block_inner_blocks( $reusable_block_id ) {
		// Retrieve the reusable block post by ID.
		$reusable_block = get_post( $reusable_block_id );

		// Check if the post exists and is of the wp_block post type.
		if ( ! $reusable_block || 'wp_block' !== $reusable_block->post_type ) {
			return array(); // Return an empty array if the post is not found or not a wp_block.
		}

		// Parse the block content to get inner blocks.
		$blocks = parse_blocks( $reusable_block->post_content );

		return $blocks; // Returns an array of blocks with attributes.
	}

	/**
	 *
	 * @param string $slug | null
	 * @return int|\WP_Post|null
	 */
	public static function get_template_by_slug( $slug ) {
		if ( ! $slug ) {
			return null;
		}

		// Get the block template using the template ID.
		$template = get_posts(
			array(
				'post_type'      => 'wp_template',
				'name'           => $slug,
				'posts_per_page' => 1,
			)
		);

		// Return an empty array if the template is not found.
		if ( null === $template || empty( $template ) ) {
			return null;
		}

		return $template[0];
	}

	/**
	 * Retrieve template blocks by template ID.
	 *
	 * This function fetches a block template using the provided template ID,
	 * parses its content into blocks, and retrieves only the Omnipress blocks, includes that blocks which used inside template parts
	 * from the parsed blocks.
	 *
	 * @param mixed $template_id The ID of the template to retrieve blocks from.
	 * @return array An array of Omnipress blocks found in the template.
	 */
	public static function retrieve_template_blocks( $template_id ) {
		$template = static::get_template_by_slug( $template_id );

		if ( null === $template ) {
			return array();
		}

		// Parse the content of the template into blocks.
		$blocks           = parse_blocks( $template->post_content );
		$omnipress_blocks = array();

		// Retrieve and return the Omnipress blocks from the parsed blocks.
		static::retrieve_omnipress_blocks( $blocks, $omnipress_blocks );

		return $omnipress_blocks;
	}


	public static function kebab_case_to_camel_case( $string ) {
		return preg_replace_callback(
			'/-([a-z])/',
			function ( $matches ) {
				return strtoupper( $matches[1] );
			},
			$string
		);
	}

	public static function is_plugin_active( $slug ) {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		return is_plugin_active( $slug );
	}

	/**
	 * Convert kebab case to pascal case.
	 *
	 * @param string $string Kebab case string.
	 *
	 * @since 1.4.2
	 * @return string
	 */
	public static function convert_kebab_to_pascal_case( string $string ) {
		$words = explode( '-', $string );

		$capitalized_words = array_map( 'ucfirst', $words );

		$pascal_case_string = implode( '', $capitalized_words );

		return $pascal_case_string;
	}


	/**
	 * Update user meta.
	 *
	 * @param mixed $key
	 * @param mixed $value
	 * @return void
	 */
	public static function update_user_meta( $key, $value ) {
		update_user_meta( get_current_user_id(), $key, $value );
	}


	/**
	 * Get user meta.
	 *
	 * @param mixed $key
	 * @return mixed
	 */
	public static function get_user_meta( $key ) {
		return get_user_meta( get_current_user_id(), $key, true );
	}

	/**
	 *
	 * Retrieve our all block's details lists.
	 *
	 * @return mixed
	 */
	public static function get_all_blocks_details() {
		$cache_key = 'omnipress_blocks_details';

		$blocks_details = get_transient( $cache_key );

		if ( empty( $blocks_details ) ) {
			$blocks_details = wp_json_file_decode( OMNIPRESS_PATH . 'assets/all-blocks-json.json' );
			set_transient( $cache_key, $blocks_details, DAY_IN_SECONDS );
		}

		return $blocks_details;
	}


	public static function get_json_file_content( string $json_path ) {
		wp_json_file_decode( $json_path );
	}
	public static function get_block_default_values( $block_name ) {
		// Get the instance of WP_Block_Type_Registry.
		$block_registry = \WP_Block_Type_Registry::get_instance();

		// Retrieve the block type using the block name (e.g., 'core/paragraph').
		$block_type = $block_registry->get_registered( $block_name );

		// Check if the block type exists and has attributes.
		if ( $block_type && isset( $block_type->attributes ) ) {
			$default_values = array();

			// Loop through each attribute and extract only the default value.
			foreach ( $block_type->attributes as $attribute_name => $attribute_data ) {
				if ( isset( $attribute_data['default'] ) ) {
					// Store the attribute name and its default value.
					$default_values[ $attribute_name ] = $attribute_data['default'];
				}
			}

			return $default_values; // Return only the attribute names and default values.
		}

		// Return null if block type not found or has no default values.
		return null;
	}
}