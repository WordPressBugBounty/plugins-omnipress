<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use Omnipress\Helpers;

/**
 * Query Template block.
 *
 * @since   1.4.1
 * @package Omnipress
 */
class QueryTemplate extends AbstractBlock {


	private $attributes = array(
		'blockId'      => '',
		'queryId'      => false,
		'otherFilters' => array(),
		'layout'       => array(
			'columnCount'   => 3,
			'mdColumnCount' => 2,
			'smColumnCount' => 1,
		),
	);

	/**
	 * Block name.
	 *
	 * @var string $name Block name.
	 */
	private $name = 'query-template';

	/**
	 * {@inheritDoc}
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {

		$attributes          = array_merge( $this->attributes, $attributes );
		$template            = $attributes['template'] ?? false;
		$page_key            = isset( $block->context['queryId'] ) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
		$query_key           = "query_{$block->context['queryId']}";
		$query_params        = isset( $_GET[ $query_key ] ) ? json_decode( sanitize_text_field( wp_unslash( $_GET[ $query_key ] ) ), true ) : array(); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$enhanced_pagination = isset( $block->context['enhancedPagination'] ) && $block->context['enhancedPagination'];

		$page   = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ];
		$layout = $attributes['layout'];

		$query_args = array(
			'per_page'    => 6,
			'post_type'   => 'post',
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_status' => 'publish',
		);

		$use_global_query = ( isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'] );

		if ( $use_global_query ) {
			global $wp_query;

			/*
			 * If already in the main query loop, duplicate the query instance to not tamper with the main instance.
			 * Since this is a nested query, it should start at the beginning, therefore rewind posts.
			 * Otherwise, the main query loop has not started yet and this block is responsible for doing so.
			 */
			$post_types = $wp_query->query_vars['post_type'];

			if ( in_the_loop() ) {
				$query = clone $wp_query;

				$query->rewind_posts();
			} else {

				$query = clone $wp_query;

				if ( 'product' === $post_types ) {

					$custom_args = array();

					if ( ! empty( $query_params ) ) {
						$custom_args = Helpers\GeneralHelpers::validate_wc_query_args( array(), $block, $query->query_vars );
					}

					if ( Helpers\GeneralHelpers::is_valid_array( $custom_args ) ) {
						$new_query = clone $wp_query;

						$query_args = array_merge( $new_query->query_vars, $custom_args );

						$new_query->query( $query_args );

						$new_query->rewind_posts();

						$query = $new_query;
					}
				}
			}
		} else {
			if ( isset( $block->context['query'] ) ) {
				$query_args = Helpers::build_query_vars_from_omnipress_query_block( $block ?? null, $page );
			}

			if ( ( isset( $block->context['query']['product_cat'] ) && 'product' === $query_args['post_type'] ) || ! empty( $query_params ) ) {

				$query_args = Helpers\GeneralHelpers::validate_wc_query_args( $query_args, $block, $query_params );
			}

			if ( isset( $block->context['query']['queryType'] ) && 'related-products' === $block->context['query']['queryType'] ) {
				$query_args['post__in'] = $this->get_related_products_ids( $block->context['query']['per_page'] ?? 6 );
			}

			$query = new \WP_Query( $query_args );
		}

		if ( ! $query->have_posts() ) {

			return '';
		}

		// generate classes according to its attributes values.
		$classnames = 'op-block__query-template op-grid-container op-' . $attributes['blockId'];

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'     => trim( $classnames ),
				'data-type' => 'omnipress/query-template',

			)
		);

		$content = '';

		$filters = $this->get_block_template( 'query/sorting', 'pro', array( 'query' => $query ) );

		while ( $query->have_posts() ) {
			$query->the_post();

			// Get an instance of the current Post Template block.
			$block_instance = $block->parsed_block;

			// Set the block name to one that does not correspond to an existing registered block.
			// This ensures that for the inner instances of the Post Template block, we do not render any block supports.
			$block_instance['blockName'] = 'omnipress/null';

			$post_id              = get_the_ID();
			$post_type            = get_post_type();
			$filter_block_context = static function ( $context ) use ( $post_id, $post_type ) {
				$context['postType'] = $post_type;
				$context['postId']   = $post_id;

				return $context;
			};

			// Use an early priority to so that other 'render_block_context' filters have access to the values.
			add_filter( 'render_block_context', $filter_block_context, 1 );
			// Render the inner blocks of the Post Template block with `dynamic` set to `false` to prevent calling
			// `render_callback` and ensure that no wrapper markup is included.
			$block_content = ( new \WP_Block( $block_instance ) )->render();
			remove_filter( 'render_block_context', $filter_block_context, 2 );

			// Wrap the render inner blocks in a `li` element with the appropriate post classes.
			$grid_layout_classes = '';

			if ( isset( $layout['columnCount'] ) ) {
				$grid_layout_classes .= " op-grid-col-{$layout['columnCount']}";
			}

			if ( isset( $layout['mdColumnCount'] ) ) {
				$grid_layout_classes .= " op-grid-col-{$layout['mdColumnCount']}-md";
			}

			if ( isset( $layout['smColumnCount'] ) ) {
				$grid_layout_classes .= " op-grid-col-{$layout['smColumnCount']}-sm";
			}

			$inner_block_directives = ! $enhanced_pagination ? ' data-wp-key="query-template-item-' . $post_id . '"' : '';
			$content               .= '<li' . $inner_block_directives . ' class="' . esc_attr( implode( ' ', get_post_class() ) ) . '">' . $block_content . '</li>';

			/*
			* Use this function to restore the context of the template tags
			* from a secondary query loop back to the main query loop.
			* Since we use two custom loops, it's safest to always restore.
			*/
			wp_reset_postdata();
		}

		return sprintf(
			'<div %s> %s <ul data-wp-bind--data-is-processing="context.isProcessing" data-wp-init="omnipress/query::callbacks.initTemplate" class="%s">%s</ul></div>',
			$wrapper_attributes,
			$attributes['isHeaderEnabled'] ? $filters : '',
			$grid_layout_classes,
			$content,
		);
	}

	private function get_related_products_ids( $product_per_page = 5 ) {
		global $post;

		$product = wc_get_product( $post->ID );

		$related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $product_per_page, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
		$related_products = wc_products_array_orderby( $related_products, 'rand', 'desc' );

		$related_product_ids = array_map(
			function ( $product ) {
				return $product->get_id();
			},
			$related_products
		);

		return $related_product_ids;
	}


	public function getAttributes(): array {
		return $this->attributes;
	}
}
