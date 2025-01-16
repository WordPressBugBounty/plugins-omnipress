<?php

namespace Omnipress\Models;

use Omnipress\Transient;

( defined( 'ABSPATH' ) ) || exit;

/**
 * WoocommerceModel class to handle all woocommerce related functionalities.
 */
class WoocommerceModel {

	private static $instance = null;

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new static();
		}
		return self::$instance;
	}


	/**
	 * Get the product details.
	 *
	 * @param \WC_Product|int $product The product object or product ID.
	 * @return array The product details.
	 */
	public function get_product_details( $product ) {
		if ( is_int( $product ) ) {
			$product = wc_get_product( $product );
		}

		return array(
			'categories'                    => get_the_term_list( get_the_ID(), 'product_cat', '', ', ', '' ),
			'currency_symbol'               => get_woocommerce_currency_symbol(),
			'permalink'                     => get_the_permalink(),
			'thumbnail_url'                 => get_the_post_thumbnail_url(),
			'post_title'                    => get_the_title(),
			'product_rating'                => $product->get_average_rating(),
			'product_stock'                 => $product->get_stock_quantity(),
			'product_price'                 => $product->get_price(),
			'product_sale_price'            => $product->get_sale_price(),
			'product_regular_price'         => $product->get_regular_price(),
			'product_add_to_cart_text'      => $product->add_to_cart_text(),
			'product_max_purchase_quantity' => $product->get_max_purchase_quantity(),
			'product_add_to_cart_url'       => $product->add_to_cart_url(),
			'product_id'                    => is_int( $product ) ? $product : $product->get_id(),
			'product_images'                => $this->get_product_images( $product ),
		);
	}

	public function get_product_images( $product ): string {
		$gallery_ids = $product->get_gallery_image_ids();
		$images      = array();

		foreach ( $gallery_ids as $image_id ) {
			$images[] = '<img src="' . wp_get_attachment_url( $image_id ) . '" alt="' . get_the_title( $image_id ) . '">';
		}

		return implode( '', $images );
	}

	private function __construct() {
		if ( ! class_exists( 'Woocommerce' ) ) {
			exit; // early exit if Product class not found.
		}
	}

	public function get_all_categories( $args = array() ) {
		$default_args = array(
			'orderby'      => 'name',
			'order'        => 'ASC',
			'taxonomy'     => 'product_cat',
			'show_count'   => 0,
			'pad_counts'   => 0,
			'hierarchical' => 1,
			'title_li'     => '',
			'hide_empty'   => 0,
			'number'       => 4,
			'parent'       => 0,
			'offset'       => 0,
		);

		$args      = wp_parse_args( $args, $default_args );
		$cache_key = 'categories_' . md5( wp_json_encode( $args ) );
		$transient = new Transient( $cache_key );

		$cached_categories = $transient->get();

		if ( false !== $cached_categories ) {
			return $cached_categories;
		}

		$terms = get_categories( $args );
		$transient->set( $terms );

		return $terms;
	}
	private function format_product_data( \WC_Product $product ) {
		$regular_price       = $product->get_regular_price();
		$sale_price          = $product->get_sale_price();
		$discount_percentage = 0;

		if ( $sale_price && $regular_price ) {
			$discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
		}
		return array(
			'id'                  => $product->get_id(),
			'name'                => $product->get_name(),
			'description'         => $product->get_description(),
			'short_description'   => $product->get_short_description(),
			'sku'                 => $product->get_sku(),
			'stock_status'        => $product->get_stock_status(),
			'price'               => $product->get_price(),
			'regular_price'       => $product->get_regular_price(),
			'sale_price'          => $product->get_sale_price(),
			'price_html'          => $product->get_price_html(),
			'discount_percentage' => $discount_percentage,
			'currency'            => get_woocommerce_currency(),
			'currency_symbol'     => get_woocommerce_currency_symbol(),
			'categories'          => wp_get_post_terms( $product->get_id(), 'product_cat', array( 'fields' => 'names' ) ),
			'tags'                => wp_get_post_terms( $product->get_id(), 'product_tag', array( 'fields' => 'names' ) ),
			'images'              => array_map(
				function ( $image_id ) {
					return array(
						'src' => wp_get_attachment_url( $image_id ),
						'alt' => get_post_meta( $image_id, '_wp_attachment_image_alt', true ),
					);
				},
				$product->get_gallery_image_ids()
			),
			'thumbnail'           => $product->get_image(
				'woocommerce_thumbnail',
				array(
					'class' => 'op-product-thumbnail op-woo__media-wrapper-img',
				)
			),
			'attributes'          => $product->get_attributes(),
			'variations'          => $product->is_type( 'variable' ) ? $product->get_children() : array(),
			'is_in_stock'         => $product->is_in_stock(),
			'is_on_sale'          => $product->is_on_sale(),
			'average_rating'      => $product->get_average_rating(),
			'review_count'        => $product->get_review_count(),
			'featured'            => $product->is_featured(),
			'type'                => $product->get_type(),
			'add_to_cart'         => $product->add_to_cart_url(),
			'add_to_cart_text'    => $product->add_to_cart_text(),
			'permalink'           => $product->get_permalink(),
		);
	}


	/**
	 * Retrieve all products.
	 *
	 * @since 1.5.1
	 * @param array $args Arguments for the query.
	 * @return array|mixed
	 */
	public function get_all_products( $args ) {
		/*
			$args = array(
				'limit'   => $args['posts_per_page'] ?? 6,
				'orderby' => $args['orderby'] ?? 'date',
				'order'   => $args['order'] ?? 'DESC',
				'page'    => $args['page'] ?? 1,
				'offset'  => $args['offset'] ?? 0,
				'status'  => 'publish',
			);
		*/

		global $wpdb;

		$query_script = "
			SELECT
				p.ID as id,
				p.post_title as title,
				pm_price.meta_value as price,
				pm_regular_price.meta_value as regular_price,
				pm_sale_price.meta_value as sale_price,
				pm_excerpt.meta_value as excerpt,
				pm_stock_status.meta_value as stock_status,
				(
					(pm_regular_price.meta_value - pm_sale_price.meta_value) / pm_regular_price.meta_value * 100
				) AS discount_percentage,
				GROUP_CONCAT(t.name SEPARATOR ', ') as categories
			FROM
				{$wpdb->posts} AS p
			LEFT JOIN
				{$wpdb->postmeta} AS pm_price ON p.ID = pm_price.post_id AND pm_price.meta_key = '_price'
			LEFT JOIN
				{$wpdb->postmeta} AS pm_regular_price ON p.ID = pm_regular_price.post_id AND pm_regular_price.meta_key = '_regular_price'
			LEFT JOIN
				{$wpdb->postmeta} AS pm_sale_price ON p.ID = pm_sale_price.post_id AND pm_sale_price.meta_key = '_sale_price'
			LEFT JOIN
				{$wpdb->postmeta} AS pm_excerpt ON p.ID = pm_excerpt.post_id AND pm_excerpt.meta_key = '_short_description'
			LEFT JOIN
				{$wpdb->postmeta} AS pm_stock_status ON p.ID = pm_stock_status.post_id AND pm_stock_status.meta_key = '_stock_status'
			LEFT JOIN
				{$wpdb->term_relationships} AS tr ON p.ID = tr.object_id
			LEFT JOIN
				{$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat'
			LEFT JOIN
				{$wpdb->terms} AS t ON tt.term_id = t.term_id
			WHERE
				p.post_type = 'product' AND
				p.post_status = 'publish'
			GROUP BY
				p.ID
			LIMIT 20;
		";

		$products = wc_get_products( $args );

		$formatted_products = array();

		foreach ( $products as $product ) {
			$formatted_products[] = $this->format_product_data( $product );
		}

		return $formatted_products;
	}

	public function get_product( $id ) {
		return wc_get_product( $id );
	}

	/**
	 * Get the product categories.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_categories( $product_id ) {
		return wc_get_product_term_ids( $product_id, 'product_cat' );
	}

	/**
	 * Get the product tags.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_tags( $product_id ) {
		return wc_get_product_term_ids( $product_id, 'product_tag' );
	}

	/**
	 * Get the product type.
	 *
	 * @param int $product_id Product ID.
	 * @return string
	 */
	public function get_product_type( $product_id ) {
		return get_post_meta( $product_id, '_product_type', true );
	}

	/**
	 * Get the product cross sells.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_cross_sells( $product_id ) {
		return get_post_meta( $product_id, '_crosssell_ids', true );
	}

	/**
	 * Get the product upsells.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_up_sells( $product_id ) {
		return get_post_meta( $product_id, '_upsell_ids', true );
	}

	/**
	 * Get the product related products.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_related( $product_id ) {
		return get_post_meta( $product_id, '_related_product_ids', true );
	}

	/**
	 * Get the product variations.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_variations( $product_id ) {
		return get_post_meta( $product_id, '_product_attributes', true );
	}

	/**
	 * Get the product variations.
	 *
	 * @param int $product_id Product ID.
	 * @return array
	 */
	public function get_product_custom_fields( $product_id ) {
		return get_post_meta( $product_id, '_product_custom_fields', true );
	}
}
