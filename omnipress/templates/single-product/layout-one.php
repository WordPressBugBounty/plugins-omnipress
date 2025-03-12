<?php

use Omnipress\Controllers\WoocommerceFields;

$woo_fields = new WoocommerceFields( $product_id ? $product_id : get_the_ID(), $hidden_fields ?? array(), true );

// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<div class="op-single-product-thumbnail">
	<?php echo $woo_fields->render_thumbnail( 'op-single-product-image thumbnail' ); ?>

	<div class="product-labels">
		<?php
			echo $woo_fields->render_discount_percent( 'op-discount-percent' );
			echo $woo_fields->render_sale_badge( 'op-onsale' );
		?>
	</div>

	<div class="product-action-buttons">
		<ul>
			<li><?php echo $woo_fields->render_compare_button( 'compare-button' ); ?></li>
			<li><?php echo $woo_fields->render_quick_view_button( 'quick-view-button' ); ?></li>
			<li><?php echo $woo_fields->render_wishlist_button( 'wishlist-button' ); ?></li>
			<?php do_action( 'single_product_action_meta' ); ?>
		</ul>
	</div>
</div>

<div class="op-single-product-meta">
	<?php
		echo $woo_fields->render_categories( 'op-single-product-meta-categories categories' );
		echo $woo_fields->render_title( 'op-single-product-meta-title op-single-product-name title', true, 'h2' );
		echo $woo_fields->render_rating( 'op-single-product-meta-ratings' );
		echo $woo_fields->render_price_html( 'op-single-product-meta-price' );
		echo $woo_fields->render_product_attributes( 'op-single-product-meta-product-attributes' );

		do_action( 'single_product_before_add_to_cart' );
		echo $woo_fields->render_add_to_cart( 'op-single-product-meta-add-to-cart add-to-cart' );
		do_action( 'single_product_after_add_to_cart' );

		$woo_fields->clear_product();
	?>
</div>
