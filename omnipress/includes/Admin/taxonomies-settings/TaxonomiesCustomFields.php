<?php

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'TaxonomiesCustomFields' ) ) {

	/**
	 * TaxonomiesCustomFields class.
	 */
	class TaxonomiesCustomFields {

		public function __construct() {
			add_action( 'category_add_form_fields', array( $this, 'add_category_image_field' ), 10, 2 );
			add_action( 'category_edit_form_fields', array( $this, 'edit_category_image_field' ), 10, 2 );
			add_action( 'edited_category', array( $this, 'save_category_image' ), 10, 2 );
			add_action( 'create_category', array( $this, 'save_category_image' ), 10, 2 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			// Rest API.
			add_action( 'rest_api_init', array( $this, 'update_category_rest_field' ) );
		}

		public function update_category_rest_field( $response ) {
			register_rest_field(
				'category',
				'thumbnail',
				array(
					'get_callback' => array( $this, 'get_category_image_rest_field' ),
					'schema'       => array(
						'description' => __( 'Category image', OMNIPRESS_I18N ),
						'type'        => 'string',
						'context'     => array( 'view', 'edit' ),
					),
				)
			);
		}

		public function get_category_image_rest_field( $object, $field_name, $request ) {
			return get_term_meta( $object['id'], 'thumbnail', true );
		}

		/**
		 * Enqueue admin scripts and styles.
		 *
		 * @param string $hook The current admin page hook.
		 * @return void
		 */
		public function enqueue_admin_assets( $hook ) {
			if ( 'edit-tags.php' !== $hook && 'term.php' !== $hook ) {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_script( 'omnipress-taxonomy-image-script', OMNIPRESS_URL . 'assets/library/taxonomies-select.js', array( 'jquery' ), '1.0.0', true );
		}

		/**
		 * Add image field for new category.
		 *
		 * @return void
		 */
		public function add_category_image_field() {
			?>
			<div class="form-field term-image-wrap">
				<label for="taxonomy_image"><?php esc_html_e( 'Featured Image', OMNIPRESS_I18N ); ?></label>

				<input type="hidden" name="taxonomy_image" id="taxonomy_image" value="">

				<div id="taxonomy_image_preview"></div>

				<p>
					<button
						type="button"
						class="button op-bg-blue-500 op-text-white op-px-4 op-py-2 op-rounded op-hover:op-bg-blue-600 op-transition-colors op-duration-300"
						id="upload_taxonomy_image"
					>
						<?php esc_html_e( 'Upload/Add Image', OMNIPRESS_I18N ); ?>
					</button>

					<button
						type="button"
						class="button op-bg-red-500 op-text-white op-px-4 op-py-2 op-rounded op-hover:op-bg-red-600 op-transition-colors op-duration-300"
						id="remove_taxonomy_image"
						style="display:none;"
					>
						<?php esc_html_e( 'Remove Image', OMNIPRESS_I18N ); ?>
					</button>
				</p>
				<p><?php esc_html_e( 'Upload an image to represent this category.', OMNIPRESS_I18N ); ?></p>
			</div>
			<?php
		}

		/**
		 * Edit image field for existing category.
		 *
		 * @param WP_Term $term The term object.
		 * @return void
		 */
		public function edit_category_image_field( $term ) {
			$image_url = get_term_meta( $term->term_id, 'thumbnail', true );
			?>
			<tr class="form-field term-image-wrap">
				<th><label for="taxonomy_image"><?php esc_html_e( 'Featured Image', OMNIPRESS_I18N ); ?></label></th>
				<td>
					<input
						type="hidden"
						name="taxonomy_image"
						id="taxonomy_image"
						value="<?php echo esc_attr( $image_url ); ?>"
					>

					<div id="taxonomy_image_preview">
						<?php if ( $image_url ) : ?>
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" style="max-width: 200px;">
						<?php endif; ?>
					</div>
					<p>
						<button
							type="button"
							class="button op-bg-blue-500 op-text-white op-px-4 op-py-2 op-rounded op-hover:op-bg-blue-600 op-transition-colors op-duration-300"
							id="upload_taxonomy_image"
						>
							<?php esc_html_e( 'Upload/Add Image', OMNIPRESS_I18N ); ?>
						</button>

						<button
							type="button"
							class="button op-bg-red-500 op-text-white op-px-4 op-py-2 op-rounded op-hover:op-bg-red-600 op-transition-colors op-duration-300"
							id="remove_taxonomy_image" <?php echo $image_url ? '' : 'style="display:none;"'; ?>
						>
							<?php esc_html_e( 'Remove Image', OMNIPRESS_I18N ); ?>
						</button>
					</p>

				</td>
			</tr>
			<?php
		}

		/**
		 * Save the taxonomy image.
		 *
		 * @param int $term_id The term ID.
		 * @return void
		 */
		public function save_category_image( $term_id ) {
			//phpcs:ignore W
			if ( isset( $_POST['taxonomy_image'] ) && ! empty( $_POST['taxonomy_image'] ) ) {
				update_term_meta( $term_id, 'thumbnail', esc_url_raw( wp_unslash( $_POST['taxonomy_image'] ) ) );
			} elseif ( isset( $_POST['remove_image'] ) ) {
				delete_term_meta( $term_id, 'thumbnail' );
			}
		}
	}
}

new TaxonomiesCustomFields();
