<?php
namespace Omnipress;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Omnipress\OP_Ajax' ) ) {
	/**
	 * Class AjaxHandler
	 *
	 * Handles all AJAX requests for Omnipress plugin.
	 *
	 * @package Omnipress
	 * @since 1.6.0
	 */
	class OP_Ajax {
		/**
		 * Constructor to initialize AJAX hooks.
		 */
		public function __construct() {
			$this->add_ajax_events();
		}



		public function add_ajax_events() {
			$no_prev_events = array(
				'omnipress_load_more_terms',
			);

			foreach ( $no_prev_events    as $event ) {
				add_action( 'wp_ajax_nopriv_' . $event, array( __CLASS__, $event ) );
			}

			$prev_ajax_events = array(
				'omnipress_load_more_terms',
				'omnipress_insert_patterns',
			);
			foreach ( $prev_ajax_events as $event ) {
				add_action( 'wp_ajax_' . $event, array( __CLASS__, $event ) );
			}
		}

		/**
		 * Handle AJAX request to load more terms.
		 */
		public static function load_more_terms() {
			check_ajax_referer( 'wp_ajax_nonce', 'nonce' );

			$taxonomy          = isset( $_POST['taxonomy'] ) ? sanitize_text_field( $_POST['taxonomy'] ) : 'category';
			$page              = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;
			$posts_per_page    = isset( $_POST['posts_per_page'] ) ? absint( $_POST['posts_per_page'] ) : 6;
			$selected_layout   = isset( $_POST['selected_layout'] ) ? sanitize_text_field( $_POST['selected_layout'] ) : 'layout-one';
			$excluded_term_ids = ! empty( $_POST['exclude'] ) ? array_map( 'absint', (array) $_POST['exclude'] ) : array();

			$offset = ( $page - 1 ) * $posts_per_page;

			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
					'number'     => $posts_per_page,
					'offset'     => $offset,
					'exclude'    => $excluded_term_ids,
				)
			);

			if ( empty( $terms ) || is_wp_error( $terms ) ) {
				wp_send_json_error( array( 'message' => __( 'No more terms to load.', 'omnipress' ) ) );
			}

			ob_start();

			foreach ( $terms as $term ) {
				$image_url = '';
				if ( 'product_cat' === $taxonomy ) {
					$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
					if ( $thumbnail_id ) {
						$image_url = wp_get_attachment_url( $thumbnail_id );
					}
				} elseif ( 'product_brand' === $taxonomy ) {
					$brand_image_id = get_term_meta( $term->term_id, 'brand_image_id', true );
					if ( $brand_image_id ) {
						$image_url = wp_get_attachment_url( $brand_image_id );
					}
				} else {
					$image_url = get_term_meta( $term->term_id, 'op_thumbnail', true );
					if ( empty( $image_url ) ) {
						$image_url = '';
					}
				}

				if ( empty( $image_url ) ) {
					$image_url = OMNIPRESS_URL . 'assets/images/placeholder.webp';
				}
				?>
					<div class="op-tax-query-item-wrapper">
						<?php if ( 'layout-one' === $selected_layout ) : ?>
							<div class="op-tax-query-item op-tax-query-layout-one">
								<?php if ( in_array( 'image', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<?php if ( $image_url ) : ?>
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" class="op-tax-query-image">
									<?php else : ?>
										<div class="op-tax-query-no-image">
											<span><?php esc_html_e( 'No Image', 'omnipress' ); ?></span>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<?php if ( ! in_array( 'title', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<h3 class="op-tax-query-term-title"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></h3>
								<?php endif; ?>
								<?php if ( ! in_array( 'description', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<p class="op-tax-query-term-description"><?php echo esc_html( $term->description ?: 'No description available.' ); ?></p>
								<?php endif; ?>
							</div>
						<?php elseif ( 'layout-two' === $selected_layout ) : ?>
							<div class="op-tax-query-item op-tax-query-layout-two">
								<?php if ( ! in_array( 'image', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<?php if ( $image_url ) : ?>
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" class="op-tax-query-image op-tax-query-image-small">
									<?php else : ?>
										<div class="op-tax-query-no-image-small">
											<span><?php esc_html_e( 'No Image', 'omnipress' ); ?></span>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<div class="op-tax-query-text-content">
									<?php if ( ! in_array( 'title', $attributes['hiddenFields'] ?? array() ) ) : ?>
										<h3 class="op-tax-query-term-title"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></h3>
									<?php endif; ?>
									<?php if ( ! in_array( 'description', $attributes['hiddenFields'] ?? array() ) ) : ?>
										<p class="op-tax-query-term-description"><?php echo esc_html( $term->description ?: 'No description available.' ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php elseif ( 'layout-three' === $selected_layout ) : ?>
							<div class="op-tax-query-item op-tax-query-layout-three" style="background-image: url(<?php echo $image_url ? esc_url( $image_url ) : 'none'; ?>)">
								<?php if ( ! in_array( 'title', $attributes['hiddenFields'] ?? array() ) ) : ?>
								<h3 class="op-tax-query-term-title"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></h3>
								<?php endif; ?>
								<div class="op-tax-query-content">
									<?php if ( ! in_array( 'description', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<p class="op-tax-query-term-description"><?php echo esc_html( $term->description ?: 'No description available.' ); ?></p>
									<?php endif; ?>
									<?php if ( ! in_array( 'count', $attributes['hiddenFields'] ?? array() ) ) : ?>
									<p class="op-tax-query-term-count"><?php echo esc_html__( 'Count: ', 'omnipress' ) . esc_html( $term->count ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php elseif ( 'layout-four' === $selected_layout ) : ?>
							<div class="op-tax-query-item op-tax-query-layout-four" style="background-image: url(<?php echo $image_url ? esc_url( $image_url ) : 'none'; ?>)">
								<div class="op-tax-query-content">
									<?php if ( ! in_array( 'title', $attributes['hiddenFields'] ?? array() ) ) : ?>
										<h3 class="op-tax-query-term-title"><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></h3>
									<?php endif; ?>
									<?php if ( ! in_array( 'description', $attributes['hiddenFields'] ?? array() ) ) : ?>
										<p class="op-tax-query-term-description"><?php echo esc_html( $term->description ?: 'No description available.' ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php
			}
			$html = ob_get_clean();

			wp_send_json_success( array( 'html' => $html ) );
			exit;
		}

		/**
		 * Handles the AJAX request to insert or update a post pattern.
		 *
		 * This method checks the nonce for security, retrieves and sanitizes
		 * POST data, and either inserts a new "Coming Soon" page or updates
		 * an existing post with the provided pattern content. It sends a JSON
		 * response indicating success or failure of the operation.
		 */
		public static function omnipress_insert_patterns() {
			check_ajax_referer( '_omnipress_block_nonce', 'nonce' );

			$post_to_insert_pattern = isset( $_POST['post_id'] ) ? sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) : '';
			$is_coming_soon_pattern = isset( $_POST['is_coming_soon_pattern'] ) ? sanitize_text_field( wp_unslash( $_POST['is_coming_soon_pattern'] ) ) : '';
			$pattern_content        = isset( $_POST['pattern_content'] ) ? $_POST['pattern_content'] : '';

			if ( ! $post_to_insert_pattern && $is_coming_soon_pattern ) {
				$args = array(
					'post_type'      => 'page',
					'title'          => 'Coming Soon',
					'posts_per_page' => 1,
					'post_status'    => 'publish',
				);

				$query = new \WP_Query( $args );
				$page  = null;

				if ( $query->have_posts() ) {
					$page = $query->posts[0];
					wp_reset_postdata();
					return;
				}

				if ( ! is_null( $page ) ) {
					$post_to_insert_pattern = $page->ID;
				} else {
					$post_to_insert_pattern = wp_insert_post(
						array(
							'post_title'   => 'Coming Soon',
							'post_content' => $pattern_content,
							'post_status'  => 'publish',
							'post_type'    => 'page',
						)
					);

					if ( ! $post_to_insert_pattern ) {
						wp_send_json_error( array( 'message' => __( 'Failed to insert post.', 'omnipress' ) ) );
					}
					wp_send_json_success( array( 'message' => __( 'Post inserted successfully.', 'omnipress' ) ) );
					exit;
				}
			}

			$updated_page = array(
				'ID'           => $post_to_insert_pattern,
				'post_content' => $pattern_content,
			);

			$result = wp_update_post( $updated_page, true );

			if ( is_wp_error( $result ) ) {
				wp_send_json_error( array( 'message' => __( 'Failed to update post.', 'omnipress' ) ) );
			}
			wp_send_json_success( array( 'message' => __( 'Post updated successfully.', 'omnipress' ) ) );
			exit;
		}
	}
}




new OP_Ajax();
