<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use Omnipress\Models\WoocommerceModel;

( defined( 'ABSPATH' ) ) || exit;

/**
 * Woo-category class.
 */
class Woocategory extends AbstractBlock {

	/**
	 * Block's default attributes.
	 *
	 * @var $attributes
	 */
	protected $attributes = array(
		'blockId'        => '',
		'css'            => '',
		'card'           => array(),
		'perPage'        => 6,
		'columns'        => 6,
		'mdColumns'      => 3,
		'smColumns'      => 2,
		'columnGap'      => 30,
		'mdColumnGap'    => '',
		'smColumnGap'    => '',
		'rowGap'         => 30,
		'mdRowGap'       => '',
		'smRowGap'       => '',
		'rows'           => 1,
		'wrapper'        => array(),
		'categoryTitle'  => array(),
		'arrowNext'      => 'fa fa-angle-right',
		'arrowPrev'      => 'fa fa-angle-left',
		'preset'         => 'one',
		'productsCount'  => array(),
		'subCategory'    => true,
		'categoryButton' => array(),
		'categoryImage'  => array(),
		'cardContent'    => array(),
		'carousel'       => false,
	);


	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$attributes = array_merge( $this->attributes, $attributes );
		$this->set_attributes( $attributes );
		$this->set_block_name( $block->name );

		if ( isset( $block->context['classNames'] ) && 'swiper-slide' === $block->context['classNames'] ) {

			return $this->get_all_categories_markup( $attributes, 'swiper-slide' );
		}

		$layout_classes = 'op-grid-col-' . $attributes['columns'] . ' op-grid-col-' . $attributes['mdColumns'] . '-md op-grid-col-' . $attributes['smColumns'] . '-sm';

		$wrapper_attributes = $this->get_block_wrapper_attributes( 'op-block ' );

		$html = sprintf(
			'<div %s><div class="omnipress-layout-grid">%s</div></div>',
			$wrapper_attributes,
			$this->get_all_categories_markup( $attributes ),
		);

		$html .= $content;

		return $html;
	}

	public function get_all_categories_markup( $attributes, $class_names = '' ) {
		$preset_type = $attributes['preset'];
		$parent      = $attributes['subCategory'] ? '' : 0;
		$columns     = intval( $attributes['columns'] );
		$rows        = intval( $attributes['rows'] );
		$per_page    = $attributes['perPage'];
		$html        = '';
		$wc_model    = WoocommerceModel::get_instance();
		$args        = array(
			'taxonomy'     => 'product_cat',
			'orderby'      => 'name',
			'show_count'   => 0,
			'pad_counts'   => 0,
			'hierarchical' => 1,
			'title_li'     => '',
			'hide_empty'   => 0,
			'number'       => $per_page,
			'parent'       => $parent,
		);
		$categories  = $wc_model->get_all_categories( $args );

		foreach ( $categories as $category ) {
			$html .= $this->render_category( $preset_type, $attributes, $category, $class_names );
		}

		return $html;
	}
	private function render_category( $preset_type, array $attributes, $cata, $class_names ) {
		$term          = get_term_by( 'slug', $cata->slug, 'product_cat' );
		$category_link = '';

		if ( $term && ! is_wp_error( $term ) ) {
			$category_link = get_term_link( $term, 'product_cat' );
		}

		$thumbnail_id = get_term_meta( $cata->cat_ID, 'thumbnail_id', true );

		// Get the image URL.
		$shop_catalog_img = wp_get_attachment_image_src( $thumbnail_id, 'full' );

		$term_link = get_term_link( $cata, 'product_cat' );

		switch ( $preset_type ) {
			case 'two':
				return sprintf(
					'<a href="%4$s" class="op-woo__category-card op-woo__category-card-content op-woo__category-pre2 op-woo__category-card op-group op-relative op-flex op-justify-center op-items-center op-gap-3 op-rounded-none op-py-4 op-px-5 op-flex-col %5$s">
						<div class="op-relative">
							<figure class="op-max-w-[120px] op-w-[120px] op-rounded-full op-overflow-hidden op-m-0 op-flex op-mb-3">
								<img class="op-woo__category-image op-object-cover op-aspect-square op-w-full group-hover:op-scale-[1.051]" src="%3$s" alt="%1$s" />
							</figure>
							<span class="cat-count product-category-count op-absolute op-w-6 op-h-6 op-top-3 op-left-3 op-text-white op-bg-primary op-text-16 op-flex op-justify-center op-items-center op-rounded-full"> %2$s</span>
						</div>
						<div class="op-woo__category-card-title op-woo__card-content">
							<h3 class="op-woo__category-card-title-name op-woo__category-title op-text-[var(--op-clr-heading)] op-font-semibold op-m-0 op-p-0 op-text-sm op-text-center">%1$s</h3>
						</div>
					</a>',
					$cata->name,
					$cata->category_count,
					is_array( $shop_catalog_img ) ? $shop_catalog_img[0] : OMNIPRESS_URL . 'assets/images/placeholder_category.webp',
					$category_link,
					$class_names
				);
			case 'three':
				return sprintf(
					'<a href="%4$s" class="op-woo__category-card op-woo__category-pre3 op-woo__card op-woo__category-card op-group op-relative op-flex op-justify-center op-items-center op-overflow-hidden %5$s" title=" %3$s">
						<div class="op-woo__category-pre3-heading-img">
							<div class="op-woo__category-pre3-label-wrap op-absolute op-top-1/2 op-left-1/2 -op-translate-x-1/2 -op-translate-y-1/2 op-z-10 op-text-center op-cursor-pointer">
								<h3 class="op-woo__category-pre3-label op-woo__category-title category-title op-woo__category-title op-bg-[var(--op-clr-body-bg)] op-font-semibold op-text-nowrap op-rounded-2xl op-m-0 op-translate-x-4 op-transition-transform"> %1$s</h3>
								<span class="cat-count product-category-count"> %2$s Products</span>
							</div>
							<figure>
								<img alt="%1$s" class="op-woo__category-image category-image op-object-cover op-aspect-square op-w-full" src="%3$s" class="" decoding="async" />
							</figure>
						</div>
					</a>',
					$cata->name,
					$cata->category_count,
					$shop_catalog_img ? $shop_catalog_img[0] : OMNIPRESS_URL . 'assets/images/placeholder_category.webp',
					$category_link,
					$class_names
				);
			default:
				return sprintf(
					'<a href="%4$s" class="op-woo__category-card op-woo__category-pre1 op-woo__card op-woo__category-card %5$s op-gap-5 op-flex op-flex-col">
						<figure class="op-w-full op-flex op-relative op-p-0 op-m-0 op-overflow-hidden">
							<img class="op-woo__category-image op-object-cover op-aspect-square op-w-full" src=" %3$s" alt=" %1$s" />
						</figure>
						<div class="op-woo__category-card-title op-woo__category-pre1-title op-woo__card-content op-p-4">
							<h3 class="op-woo__category-title op-text-primary op-text-16 op-mb-4 op-p-0">
									%1$s
							</h3>
							<p class="op-woo__category-pre1-count product-category-count op-text-[var(--op-clr-font)] op-font-medium op-text-[12px]"> %2$s products</p>
						</div>
					</a>',
					$cata->name,
					$cata->category_count,
					$shop_catalog_img ? $shop_catalog_img[0] : OMNIPRESS_URL . 'assets/images/placeholder_category.webp',
					$category_link,
					$class_names
				);
		}
	}
}
