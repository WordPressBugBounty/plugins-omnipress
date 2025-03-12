<?php

namespace Omnipress\Controllers;

use Omnipress\Core\BasePostFields;
use Omnipress\Helpers\GeneralHelpers;

defined( 'ABSPATH' ) || exit;

// phpcs:disable Generic.Commenting.FunctionComment.Missing.Recommended
/**
 * Woocommerce fields class.
 *
 * It Works only inside the Wp_query loop.
 *
 * @author        Asishwor
 * @copyright (c) 2024
 */
class WoocommerceFields extends BasePostFields {


	protected array $existing_attributes;

	/**
	 * Default attribute.
	 *
	 * @var array|bool
	 * */
	protected $default_attribute = false;

	/**
	 * The product.
	 *
	 * @var \WC_Product | \WC_Product_Variable
	 */
	public $product;

	public function __construct( int $id, array $hidden_fields = array(), bool $interactive = false ) {
		parent::__construct( $id, $hidden_fields );

		$this->product = wc_get_product( $id );

		if ( ! is_a( $this->product, 'WC_Product' ) ) {
			return;
		}
		$this->is_interactive = $interactive;

		if ( is_a( $this->product, 'Wc_Product_Variable' ) ) {
			$this->existing_attributes = $this->extract_existing_attributes( $this->product );
		}
	}

	public function render_rating( $classes = '' ): string {
		if ( $this->is_hidden( 'rating' ) ) {
			return '';
		}

		$rating = $this->product->get_average_rating();

		if ( 0 == $rating ) {
			return '';
		}

		$rating_html = '';
		$half_star   = '<li><i class="fas fa-star-half-alt"></i></li>';
		$full_star   = '<li><i class="fas fa-star"></i></li>';

		for ( $i = 1; $i <= 5; $i++ ) {
			if ( $rating >= $i ) {
				$rating_html .= $full_star;
			} elseif ( $rating > $i - 1 ) {
				$rating_html .= $half_star;
			} else {
				$rating_html .= '<li><i class="far fa-star op-star empty"></i></li>';
			}
		}

		return sprintf(
			'<div class="woocommerce-product-rating %s">
				<ul>%s <span class="rating-count">(%s)</span></ul>
			</div>',
			esc_attr( $classes ),
			$rating_html,
			$this->product->get_rating_count()
		);
	}

	public function render_price_html( $classes = '' ): string {

		if ( $this->is_hidden( 'price' ) || $this->product->is_type( 'grouped' ) ) {
			return '';
		}

		$price = $this->product->get_price_html();

		if ( $this->default_attribute ) {
			$price = $this->default_attribute['price_html'];
		}

		return sprintf(
			'<div class="product-price-html %s">%s</div>',
			esc_attr( $classes ),
			$price
		);
	}

	public function render_add_to_cart( $classes = '' ): string {
		if ( $this->is_hidden( 'add_to_cart' ) ) {
			return '';
		}

		// We can't add to cart if the product is not purchasable but we can still show the button if the product type is grouped.
		if ( ! $this->product->is_purchasable() && ! $this->product->is_type( 'grouped' ) ) {
			return '';
		}

		if ( $this->product->is_type( 'variable' ) ) {
			return '<div class="' . $classes . '"><input type="button" data-product-type="' . $this->product->get_type() . '" data-wp-on--click="omnipress/query::actions.addToCart" class="add-to-cart button" data-wp-bind--aria-disabled="context.isCartDisabled" data-quantity="' . esc_attr( $this->product->get_max_purchase_quantity() ) . '" data-product-id="' . esc_attr( $this->product->get_id() ) . '" value="Add to cart" /></div>';
		}

		return '<div class="' . $classes . '"><a data-product-type="' . $this->product->get_type() . '" href="' . esc_attr( $this->product->add_to_cart_url() ) . '" type="button" class="add-to-cart button" data-wp-bind--aria-disabled="context.isAddable" data-wp-on--click="omnipress/query::actions.addToCart" data-quantity="' . esc_attr( $this->product->get_max_purchase_quantity() ) . '" data-product-id="' . esc_attr( $this->product->get_id() ) . '" >' . esc_html( $this->product->add_to_cart_text() ) . '</a></div>';
	}


	public function render_stock_status( $classes = '' ): string {
		if ( $this->is_hidden( 'stock_status' ) ) {
			return '';
		}

		return sprintf(
			'<div class="%s">%s</div>',
			esc_attr( $classes ),
			esc_html( $this->product->get_stock_status() )
		);
	}


	public function render_sku( $classes = '' ): string {
		if ( $this->is_hidden( 'sku' ) ) {
			return '';
		}

		return sprintf(
			'<div class="product-sku %s">%s</div>',
			esc_attr( $classes ),
			esc_html( $this->product->get_sku() )
		);
	}

	public function render_categories( $classes = '', $separator = ', ' ): string {
		if ( $this->is_hidden( 'categories' ) ) {
			return '';
		}

		return sprintf(
			'<div class="product-categories %s">%s</div>',
			esc_attr( $classes ),
			get_the_term_list( get_the_ID(), 'product_cat', '', $separator, '' )
		);
	}

	public function render_tags( $classes = '' ): string {
		if ( $this->is_hidden( 'tags' ) ) {
			return '';
		}

		return sprintf(
			'<div class="product-tags %s">%s</div>',
			esc_attr( $classes ),
			get_the_term_list( get_the_ID(), 'product_tag', '', ', ', '' )
		);
	}

	public function render_sale_badge( $classes = '' ): string {
		if ( $this->is_hidden( 'sale_badge' ) || ! $this->product->is_on_sale() ) {
			return '';
		}

		return sprintf(
			'<span class="sale-badge %s">On Sale</span>',
			esc_attr( $classes )
		);
	}

	public function render_discount_percent( $classes = '' ) {
		if ( $this->is_hidden( 'discount_percent' ) || ! $this->product->is_on_sale() ) {
			return '';
		}

		$discount_percent = round(
			(
				( intval( $this->product->get_regular_price() ) - intval( $this->product->get_sale_price() ) )
				/ max( intval( $this->product->get_regular_price() ), 1 )
			) * 100
		);

		return sprintf(
			'<span class="discount-percent %s">%s</span>',
			esc_attr( $classes ),
			esc_html( $discount_percent ) . '% off'
		);
	}

	public function render_wishlist_button( $classes = '' ): string {
		if ( $this->is_hidden( 'wishlist_button' ) || true ) {
			return '';
		}

		return sprintf(
			'<a href="#" class="wishlist-button button %s" alt="%s" data-wp-on--click="actions.addToWishlist" data-product-id="%s">
				<svg
					stroke="currentColor"
					fill="currentColor"
					stroke-width="0"
					viewBox="0 0 24 24"
					height="1em"
					width="1em"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="M12 20.703l.343.667a.748.748 0 0 1-.686 0l-.003-.002-.007-.003-.025-.013a31.138 31.138 0 0 1-5.233-3.576C3.8 15.573 1 12.332 1 8.514v-.001C1 5.053 3.829 2.5 6.736 2.5 9.03 2.5 10.881 3.726 12 5.605 13.12 3.726 14.97 2.5 17.264 2.5 20.17 2.5 23 5.052 23 8.514c0 3.818-2.801 7.06-5.389 9.262a31.148 31.148 0 0 1-5.233 3.576l-.025.013-.007.003-.002.001ZM6.736 4C4.657 4 2.5 5.88 2.5 8.514c0 3.107 2.324 5.96 4.861 8.12a29.655 29.655 0 0 0 4.566 3.175l.073.041.073-.04c.271-.153.661-.38 1.13-.674.94-.588 2.19-1.441 3.436-2.502 2.537-2.16 4.861-5.013 4.861-8.12C21.5 5.88 19.343 4 17.264 4c-2.106 0-3.801 1.389-4.553 3.643a.751.751 0 0 1-1.422 0C10.537 5.389 8.841 4 6.736 4Z"
					></path>
				</svg>
				<span>wishlist</span>
			</a>',
			esc_attr( $classes ),
			esc_attr( $this->product->get_title() ),
			esc_attr( $this->product->get_id() )
		);
	}

	public function render_compare_button( $classes = '' ): string {
		if ( $this->is_hidden( 'compare_button' ) || true ) {
			return '';
		}

		return sprintf(
			'<a href="#" class="compare-button button %s" alt="%s" data-wp-on--click="actions.addToCompare" data-product-id="%s">
					<svg
						stroke="currentColor"
						fill="currentColor"
						stroke-width="0"
						viewBox="0 0 24 24"
						height="1em"
						width="1em"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M11.063 1.456a1.749 1.749 0 0 1 1.874 0l8.383 5.316a1.751 1.751 0 0 1 0 2.956l-8.383 5.316a1.749 1.749 0 0 1-1.874 0L2.68 9.728a1.751 1.751 0 0 1 0-2.956Zm1.071 1.267a.25.25 0 0 0-.268 0L3.483 8.039a.25.25 0 0 0 0 .422l8.383 5.316a.25.25 0 0 0 .268 0l8.383-5.316a.25.25 0 0 0 0-.422Z"
						></path>
						<path
							d="M1.867 12.324a.75.75 0 0 1 1.035-.232l8.964 5.685a.25.25 0 0 0 .268 0l8.964-5.685a.75.75 0 0 1 .804 1.267l-8.965 5.685a1.749 1.749 0 0 1-1.874 0l-8.965-5.685a.75.75 0 0 1-.231-1.035Z"
						></path>
						<path
							d="M1.867 16.324a.75.75 0 0 1 1.035-.232l8.964 5.685a.25.25 0 0 0 .268 0l8.964-5.685a.75.75 0 0 1 .804 1.267l-8.965 5.685a1.749 1.749 0 0 1-1.874 0l-8.965-5.685a.75.75 0 0 1-.231-1.035Z"
						></path>
					</svg>
					<span>compare</span>
				</a>',
			esc_attr( $classes ),
			esc_attr( $this->product->get_title() ),
			esc_attr( $this->product->get_id() )
		);
	}

	public function render_quick_view_button( $classes = '' ): string {
		if ( $this->is_hidden( 'quick_view_button' ) || true ) {
			return '';
		}

		return sprintf(
			'<a href="#" class="quick-view-button button %s" alt="%s" data-wp-on--click="actions.quickView" data-product-id="%s">
			<svg
					stroke="currentColor"
					fill="currentColor"
					stroke-width="0"
					viewBox="0 0 24 24"
					height="1em"
					width="1em"
					xmlns="http://www.w3.org/2000/svg"
					>
					<path d="M15.5 12a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"></path>
					<path
						d="M12 3.5c3.432 0 6.124 1.534 8.054 3.241 1.926 1.703 3.132 3.61 3.616 4.46a1.6 1.6 0 0 1 0 1.598c-.484.85-1.69 2.757-3.616 4.461-1.929 1.706-4.622 3.24-8.054 3.24-3.432 0-6.124-1.534-8.054-3.24C2.02 15.558.814 13.65.33 12.8a1.6 1.6 0 0 1 0-1.598c.484-.85 1.69-2.757 3.616-4.462C5.875 5.034 8.568 3.5 12 3.5ZM1.633 11.945a.115.115 0 0 0-.017.055c.001.02.006.039.017.056.441.774 1.551 2.527 3.307 4.08C6.691 17.685 9.045 19 12 19c2.955 0 5.31-1.315 7.06-2.864 1.756-1.553 2.866-3.306 3.307-4.08a.111.111 0 0 0 .017-.056.111.111 0 0 0-.017-.056c-.441-.773-1.551-2.527-3.307-4.08C17.309 6.315 14.955 5 12 5 9.045 5 6.69 6.314 4.94 7.865c-1.756 1.552-2.866 3.306-3.307 4.08Z"
					></path>
				</svg>
				<span>quick view</span>
			</a>',
			esc_attr( $classes ),
			esc_attr( $this->product->get_title() ),
			esc_attr( $this->product->get_id() )
		);
	}

	public function render_add_cart_button( $classes = '' ): string {
		if ( $this->is_hidden( 'add_cart_button' ) || $this->product->is_type( 'grouped' ) || ! $this->product->is_purchasable() || $this->product->is_type( 'external' ) || $this->product->is_type( 'variable' ) ) {
			return '';
		}

		return sprintf(
			'
			<a
				href="#"
				data-product-type="%s"
				class="add-to-cart-button button %s"
				aria-label="%s"
				data-wp-on--click="omnipress/query::actions.addToCart"
				 data-product-id="%s"
			>
				<svg
					stroke="currentColor"
					fill="none"
					stroke-width="0"
					viewBox="0 0 24 24"
					height="1em"
					width="1em"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M5.79166 2H1V4H4.2184L6.9872 16.6776H7V17H20V16.7519L22.1932 7.09095L22.5308 6H6.6552L6.08485 3.38852L5.79166 2ZM19.9869 8H7.092L8.62081 15H18.3978L19.9869 8Z" fill="currentColor"></path><path d="M10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20C8 21.1046 8.89543 22 10 22Z" fill="currentColor"></path>
					<path d="M19 20C19 21.1046 18.1046 22 17 22C15.8954 22 15 21.1046 15 20C15 18.8954 15.8954 18 17 18C18.1046 18 19 18.8954 19 20Z" fill="currentColor"></path>
				</svg>
				<span>%s</span>
			</a>',
			$this->product->get_type(),
			esc_attr( $classes ),
			esc_attr( $this->product->get_title() ),
			esc_attr( $this->product->get_id() ),
			esc_html( $this->product->add_to_cart_text() )
		);
	}

	public function render_product_attributes( string $classes = '' ): string {
		if ( $this->is_hidden( 'product_attributes' ) || ! $this->product->is_type( 'variable' ) || ! isset( $this->existing_attributes ) ) {
			return '';
		}

		$options = '';

		foreach ( $this->existing_attributes as $name => $terms ) {
			$options .= '<ul class="attribute-options-wrapper" >';

			if ( false !== stripos( $name, 'pa_color' ) ) {
				foreach ( $terms as $term ) {
					$options .= '<li data-wp-class--selected="context.isSelected" class="attribute-option color" data-wp-on--click="omnipress/query::callbacks.onSelectVariation" data-attribute-name="' . $name . '" data-attribute-value="' . $term . '" style="display: inline-block; background-color: ' . $term . '; margin: 5px; width: 20px; height: 20px;"></li>';
				}
			} else {
				foreach ( $terms as $term ) {
					$options .= '<li class="attribute-option other" data-wp-on--click="omnipress/query::callbacks.onSelectVariation" data-attribute-name="' . $name . '" data-attribute-value="' . $term . '" class="attribute-option">' . $term . '</li>';
				}
			}
			$options .= '</ul>';
		}

		return sprintf(
			'<div class="%s">%s</div>',
			esc_attr( $classes ),
			$options
		);
	}


	public function extract_existing_attributes( \WC_Product_Variable $product ): array {
		$existing_attributes = array();
		$variations          = $product->get_available_variations();

		foreach ( $variations as $variation ) {
			if ( GeneralHelpers::is_valid_array( $variation ) ) {
				$default_attributes = $this->product->get_default_attributes();

				$attributes = $variation['attributes'];

				if ( GeneralHelpers::is_valid_array( $attributes ) ) {
					foreach ( $attributes as $key => $value ) {
						// saved default variation to show initial price and other details of default variation instead of empty values.
						if ( array_values( $variation['attributes'] ) === array_values( $default_attributes ) ) {
							$this->default_attribute = $variation;
						}

						if ( ! isset( $existing_attributes[ $key ] ) || ! in_array( $value, $existing_attributes[ $key ], true ) ) {
							$existing_attributes[ $key ][] = $value;
						}
					}
				}
			}
		}

		return $existing_attributes;
	}

	public function clear_product() {
		$this->product = null;
	}
}
