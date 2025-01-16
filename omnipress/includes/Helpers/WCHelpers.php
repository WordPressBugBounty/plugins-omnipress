<?php

namespace OMNIPRESS\Helpers;

( defined( 'ABSPATH' ) ) || exit;

/**
 * WCHelpers class.
 */
class WCHelpers {

	public static function get_stocked_count(): int {
		$in_stock_count = get_transient( 'in_stock_count' );

		if ( ! $in_stock_count ) {
			set_transient( 'in_stock_count', $in_stock_count, 60 * 60 * 24 );

			$in_stock_query = new \WP_Query(
				array(
					'post_type'   => 'product',
					'post_status' => 'publish',
					'meta_query'  => array(
						array(
							'key'     => '_stock_status',
							'value'   => 'instock',
							'compare' => '=',
						),
					),
					'fields'      => 'ids',
				)
			);

			$in_stock_count = $in_stock_query->found_posts;
			set_transient( 'in_stock_count', $in_stock_count, HOUR_IN_SECONDS );
		}

		return $in_stock_count ?? 0;
	}

	public static function get_out_of_stock_count(): int {
		$out_of_stock_count = get_transient( 'out_of_stock_count' );

		if ( ! $out_of_stock_count ) {
			set_transient( 'out_of_stock_count', $out_of_stock_count, 60 * 60 * 24 );

			$out_of_stock_query = new \WP_Query(
				array(
					'post_type'   => 'product',
					'post_status' => 'publish',
					'meta_query'  => array(
						array(
							'key'     => '_stock_status',
							'value'   => 'outofstock',
							'compare' => '=',
						),
					),
					'fields'      => 'ids',
				)
			);

			$out_of_stock_count = $out_of_stock_query->found_posts;
			set_transient( 'out_of_stock_count', $out_of_stock_count, HOUR_IN_SECONDS );
		}

		return $out_of_stock_count ?? 0;
	}

	public static function get_product_categories( array $query_args = array(), int $number = 10 ) {
		$default_args = array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'parent'     => 0,
			'number'     => $number
		);

		$categories = get_terms( array_merge( $default_args, $query_args ) );

		if ( ! is_wp_error( $categories ) ) {
			return $categories;
		} else {
			return array();
		}
	}
}
