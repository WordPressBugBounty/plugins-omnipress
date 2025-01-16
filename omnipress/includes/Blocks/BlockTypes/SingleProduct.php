<?php

namespace Omnipress\Blocks\BlockTypes;

defined( 'ABSPATH' ) || exit;

use Omnipress\Abstracts\AbstractBlock;
use Omnipress\Helpers\GeneralHelpers;
use WC_Product_Variable;

/**
 * Query Template block.
 *
 * @since 1.4.1
 * @package Omnipress
 */
class SingleProduct extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string $name Block name.
	 */
	public string $name = 'product-filter';

	public function render( array $attributes, string $content, \WP_Block $block ): string {
		wp_enqueue_script_module( 'omnipress/module-query' );
		wp_enqueue_script( 'wp-api-fetch' );

		if ( 'product' !== ( $block->context['postType'] ?? get_post_type() !== 'product' ) ) {
			return ''; // Return empty string if the post type is not a product.
		}

		/**
		 * WooCommerce Product.
		 *
		 * @var \Wc_Product | \WC_Product_Variable $product
		 */
		$product = wc_get_product( get_the_ID() );

		if ( ! $product ) {
			return 'Invalid Product or ID! ';
		}

		add_filter(
			'omnipress_product_filter_out_of_stock_count',
			static function ( $prev_value ) use ( $product ) {
				if ( $product->is_in_stock() ) {
					return intval( $prev_value ) + 1;
				}
				return intval( $prev_value );
			}
		);

		$context = array(
			'thumbnail'      => get_the_post_thumbnail_url( get_the_ID() ),
			'min_price'      => 'minPrice',
			'isCartDisabled' => $product->is_type( 'variable' ),
		);

		if ( is_a( $product, 'WC_Product_Variable' ) ) {

			$variables = $product->get_available_variations();

			foreach ( $variables as $variation ) {
				if ( GeneralHelpers::is_valid_array( $variation['attributes'] ) ) {
					$context['attributes'][] = array(
						'attributes' => $variation['attributes'],
						'price_html' => $variation['price_html'] ?? '',
						'maxQty'     => $variation['max_qty'] ?? '',
						'srcset'     => $variation['image']['srcset'] ?? '',
						'src'        => $variation['image']['src'] ?? '',
					);

				}
			}
		}

		$context             = wp_interactivity_data_wp_context( $context, 'omnipress/query' );
		$current_layout_type = $attributes['layoutType'] ?? 'one';

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'               => 'op-block-single-product op-single-product-wrapper  op-block-single-product-layout-' . $current_layout_type . " op-{$attributes['blockId']}",
				'data-type'           => 'omnipress/single-product',
				'data-wp-init'        => 'callbacks.initProduct',
				'data-wp-interactive' => 'omnipress/query',
			)
		);

		$content = $this->get_block_template(
			"single-product/layout-{$current_layout_type}",
			'free',
			array(
				'hidden_fields' => $attributes['hiddenFields'] ?? array(),
				'product_id'    => get_the_ID(),
			)
		);

		return sprintf( '<div %1$s %3$s>%2$s</div>', $wrapper_attributes, $content, $context );
	}
}
