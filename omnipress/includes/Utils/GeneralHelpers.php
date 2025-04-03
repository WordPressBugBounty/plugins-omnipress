<?php
/**
 * Class for providing helper methods for omnipress.
 *
 * @package Omnipress
 */

namespace Omnipress\Helpers;

if ( ! class_exists( 'Omnipress\Helpers\GeneralHelpers' ) ) {
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

		public static function validate_wc_query_args( array $default_query_args, \WP_Block $block, $params = null ): array {
			if ( is_null( $params ) ) {
				$params = $_GET;
			}

			// phpcs:disable
			$category = sanitize_text_field(wp_unslash($params['category'] ?? $block->context['query']['product_cat'] ?? ''));
			$product_attributes = sanitize_text_field(wp_unslash($params['attributes'] ?? ''));
			$min_price = sanitize_text_field(wp_unslash($params['min_price'] ?? ''));
			$max_price = sanitize_text_field(wp_unslash($params['max_price'] ?? ''));
			$order_by = sanitize_text_field(wp_unslash($params['orderby'] ?? ''));
			$order = sanitize_text_field(wp_unslash($params['order'] ?? ''));
			$min_ratings = sanitize_text_field(wp_unslash($params['ratings'] ?? ''));

			$search = sanitize_text_field(wp_unslash($params['search'] ?? ''));

			if (!empty($search)) {
				$default_query_args['s'] = $search;
			}

			foreach ($params as $key => $val) {
				$val = sanitize_text_field(wp_unslash($val));

				switch ($key) {
					case '_stock_status':
						$default_query_args['meta_query'][] = array(
							'key' => '_stock_status',
							'value' => $val,
							'compare' => '=',
						);
						break;

					case '_wc_average_rating':
						$default_query_args['meta_query'][] = array(
							'key' => '_wc_average_rating',
							'value' => $val,
							'compare' => '>=',                // Filter products with rating >= 4
							'type' => 'NUMERIC',
						);
						break;

					case 'sort':
						if (false !== strpos($val, 'date')) {
							$default_query_args['orderby'] = 'date';
							$default_query_args['order'] = 'DESC';
						} else {
							$sort_val = explode('&', $val);
							if (2 == count($sort_val)) {
								$default_query_args['meta_key'] = explode('=', $sort_val[1])[1] ?? 'total_sales';
								$default_query_args['order'] = explode('=', $sort_val[0])[1] ?? 'DESC';
								$default_query_args['orderby'] = 'meta_value_num';

							}
						}

						break;
					case '_sale_price':
						$default_query_args['meta_query']['relation'] = 'AND';

						$default_query_args['meta_query'][] = array(
							'key' => '_sale_price',
							'value' => '',
							'compare' => '!=', // Sale price is not empty
						);
						$default_query_args['meta_query'][] = array(
							'key' => '_price',
							'value' => 0,
							'compare' => '>',  // Price is greater than 0
							'type' => 'NUMERIC',
						);
						break;

					default:
						break;
				}

				if (strpos($key, 'pa_') === 0) {
					$default_query_args['tax_query'][] = array(
						'taxonomy' => $key,
						'field' => 'slug',
						'terms' => explode(',', $val),
						'operator' => 'IN',
					);
				}
			}

			//phpcs:enable
			if ( ! empty( $category ) ) {
				$default_query_args['tax_query'][] = array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => $category,
					),
				);
			}

			if ( ! empty( $min_price ) || ! empty( $max_price ) ) {
				$default_query_args['meta_query']['relation'] = 'AND';

				if ( ! empty( $min_price ) ) {
					$default_query_args['meta_query'][] = array(
						'key'     => '_price',
						'value'   => ! empty( $min_price ) ? intval( $min_price ) : '',
						'compare' => '>=',
						'type'    => 'NUMERIC',
					);
				}
				if ( ! empty( $max_price ) ) {
					$default_query_args['meta_query'][] = array(
						'key'     => '_price',
						'value'   => ! empty( $max_price ) ? intval( $max_price ) : '',
						'compare' => '<=',
						'type'    => 'NUMERIC',
					);
				}
			}

			if ( ! empty( $order_by ) ) {
				$default_query_args['orderby'] = $order_by;
			}

			if ( ! empty( $order ) ) {
				$default_query_args['order'] = $order;
			}

			if ( ! empty( $min_ratings ) ) {
				$default_query_args['meta_query'][] = array(
					'key'     => '_wc_average_rating',
					'value'   => intval( $min_ratings ),
					'compare' => '>=',
					'type'    => 'NUMERIC',
				);
			}

			return $default_query_args;
		}

		public static function is_assoc_array( $arr ): bool {
			return is_array( $arr ) && array_keys( $arr ) !== range( 0, count( $arr ) - 1 );
		}
		/**
		 * Get the current unique context ID.
		 */
		public static function get_current_unique_context_id() {
			$context_id = 'default';

			if ( is_singular() ) {
				$context_id = get_the_ID();
			} elseif ( is_category() || is_tag() || is_tax() ) {
				$term = get_queried_object();
				if ( $term instanceof \WP_Term ) {
					$context_id = $term->name;
				}
			} elseif ( is_post_type_archive() ) {
				$post_type  = get_post_type();
				$context_id = 'archive-' . $post_type;
			} elseif ( is_front_page() || is_home() ) {
				$page_id    = is_front_page() ? get_option( 'page_on_front' ) : get_option( 'page_for_posts' );
				$context_id = $page_id ? $page_id : 'home';
			} elseif ( is_search() ) {
				$context_id = 'search';
			} elseif ( is_404() ) {
				$context_id = '404';
			} else {
				$template = get_block_template( get_queried_object_id(), 'wp_template' );
				if ( $template && isset( $template->slug ) ) {
					$context_id = 'template-' . $template->slug;
				}
			}

			return $context_id;
		}


		public static function render_switcher_button( string $name, string $id, string $value, bool $is_enabled = false ): string {
			ob_start();
			?>
			<div class="op-space-x-2 op-items-center op-flex">
				<label id="<?php echo esc_attr( $id ); ?>" class="op-switch op-relative op-inline-flex op-items-center op-cursor-pointer op-h-[33px]">
					<input value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $id ); ?>"  name="<?php echo esc_attr( $name ); ?>" <?php checked( $is_enabled ); ?> type="checkbox" class="op-sr-only op-peer">
					<span class="op-slider op-w-14 op-h-7 op-bg-gray-300 op-rounded-full op-shadow-inner op-transition op-duration-300 op-peer-checked:op-bg-blue-500"></span>
					<span class="op-slide-indicator op-absolute op-left-1 op-top-[50%] -op-translate-y-1/2 op-w-5 op-h-5 op-bg-white op-rounded-full op-shadow-md op-transition-transform op-duration-300 op-transform op-peer-checked:op-translate-x-7"></span>
				</label>

				<?php if ( $is_enabled ) : ?>
					<span class="op-inline-flex op-items-center op-justify-center op-gap-1 op-text-secondary">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
							<path d="M21.03 5.72a.75.75 0 0 1 0 1.06l-11.5 11.5a.747.747 0 0 1-1.072-.012l-5.5-5.75a.75.75 0 1 1 1.084-1.036l4.97 5.195L19.97 5.72a.75.75 0 0 1 1.06 0Z"></path>
						</svg>
						Enabled
					</span>

				<?php else : ?>
					<!-- <span class="op-inline-flex op-items-center op-justify-center op-gap-1 op-text-red-500">
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 10.586l-4.95-4.95-1.414 1.415L10.586 12l-4.95 4.95 1.414 1.414L12 13.414l4.95 4.95 1.414-1.414L13.414 12l4.95-4.95-1.414-1.415z"></path>
						</svg>
						Disabled
					</span> -->
				<?php endif; ?>

			</div>
			<?php
			return ob_get_clean();
		}

		/**
		 * Parses a CSV file and returns its contents as an associative array.
		 *
		 * @param string $csv_file Path to the CSV file.
		 * @return array|\WP_Error An associative array of CSV data or \WP_Error on failure.
		 */
		public static function get_csv_data( $csv_file ) {
			// Initialize the WP_Filesystem API.
			global $wp_filesystem;
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			// Initialize the filesystem.
			if ( ! WP_Filesystem() ) {
				return new \WP_Error( 'filesystem_error', 'Unable to initialize WP_Filesystem.' );
			}

			// Check if the file exists.
			if ( ! $wp_filesystem->exists( $csv_file ) ) {
				return new \WP_Error( 'file_not_found', 'CSV file not found.' );
			}

			// Read the file contents.
			$file_contents = $wp_filesystem->get_contents( $csv_file );
			if ( ! $file_contents ) {
				return new \WP_Error( 'file_read_error', 'Unable to read CSV file.' );
			}

			// Parse the CSV content into rows.
			$rows = array_map(
				function ( $line ) {
					// Explicitly provide the $escape parameter to str_getcsv().
					return str_getcsv( $line, ',', '"', '\\' );
				},
				explode( "\n", $file_contents )
			);

			// Extract the header row.
			$header = array_shift( $rows );
			if ( ! $header ) {
				return new \WP_Error( 'invalid_csv', 'CSV file is empty or invalid.' );
			}

			// Initialize an array to store the parsed data.
			$data = array();

			// Loop through each row and combine with the header.
			foreach ( $rows as $row ) {
				if ( ! empty( $row ) && count( $row ) === count( $header ) ) {
					$data[] = array_combine( $header, $row );
				}
			}

			// Return the parsed data.
			return $data;
		}
	}
}
