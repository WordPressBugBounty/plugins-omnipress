<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


/**
 * Class Container block main class.
 *
 * @author Ishwor Khadka <asishwor@gmail.com>
 * @package app\core
 */

class Slider extends AbstractBlock {
	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->set_attributes( $attributes );
		$this->set_block_name( $block->name );
		$block->parsed_block['attrs'] = $attributes;
		$block_id                     = $attributes['blockId'];

		$swiper_settings = array();

		/* Swiper Effect */
		if ( isset( $attributes['configs']['effect'] ) ) {
			$swiper_settings['effect'] = $attributes['configs']['effect'];
		}

		/*
			Responsive Settings.
			Mobile Settings OR Desktop Settings.
		 */
		if ( isset( $attributes['configs']['smSlidePerView'] ) ) {
			$swiper_settings['slidePerView'] = $attributes['configs']['smSlidePerView'];
		}

		if ( isset( $attributes['configs']['smSpaceBetween'] ) ) {
			$swiper_settings['spaceBetween'] = $attributes['configs']['smSpaceBetween'];
		}

		/* Tablet Settings. */
		if ( isset( $attributes['configs']['mdSlidePerView'] ) ) {
			$swiper_settings['breakpoints']['680']['slidesPerView'] = $attributes['configs']['mdSlidePerView'];
		}
		if ( isset( $attributes['configs']['mdSpaceBetween'] ) ) {
			$swiper_settings['breakpoints']['680']['spaceBetween'] = $attributes['configs']['mdSpaceBetween'];
		}

		/* Desktop Settings. */
		if ( isset( $attributes['configs']['slidePerView'] ) ) {
			$swiper_settings['breakpoints']['1024']['slidesPerView'] = $attributes['configs']['slidePerView'];
		}
		if ( isset( $attributes['configs']['spaceBetween'] ) ) {
			$swiper_settings['breakpoints']['1024']['spaceBetween'] = $attributes['configs']['spaceBetween'];
		}

		/* LOOP */
		if ( isset( $attributes['configs']['loop'] ) ) {
			$swiper_settings['loop'] = $attributes['configs']['loop'];
		}

		/* Autoplay */
		if ( isset( $attributes['configs']['autoplay'] ) ) {
			$swiper_settings['autoplay'] = $attributes['configs']['autoplay'];

			if ( isset( $attributes['configs']['speed'] ) ) {
				$swiper_settings['speed'] = $attributes['configs']['speed'];
			}
			if ( isset( $attributes['configs']['autoplayDelay'] ) ) {
				$swiper_settings['delay'] = $attributes['configs']['autoplayDelay'];
			}
		}

		/* Swiper Pagination */

		if ( 'true' === $attributes['showPagination'] ) {
			$swiper_settings['pagination'] = array(
				'el'        => '.swiper-pagination-' . $block_id,
				'clickable' => true,
				'type'      => $attributes['configs']['paginationType'] ?? 'bullets',
			);
		}

		/* Swiper Scrollbar */
		if ( $attributes['configs']['showScrollbar'] ?? false ) {
			$swiper_settings['scrollbar'] = array(
				'el' => '.swiper-scrollbar-' . $block_id,
			);
		}

		/* Swiper Navigation */
		if ( $attributes['showNavigation'] ) {
			$swiper_settings['navigation'] = array(
				'nextEl' => '.swiper-button-next-' . $block_id,
				'prevEl' => '.swiper-button-prev-' . $block_id,
			);
		}

		$wrapper_attributes = $this->get_block_wrapper_attributes(
			'op-block__slider op-isolation swiper',
			array(
				'data-wp-interactive' => 'omnipress/slider',
				'data-wp-init'        => 'callbacks.init',
			)
		);

		$slider_wrapper_attributes = $this->get_slider_wrapper_attributes( $block );
		$navigation                = '<button class="swiper-button-prev swiper-button-prev-' . esc_attr( $attributes['blockId'] ) . '"><i class="' . $attributes['arrowIconPrev'] . '"></i></button><button class="swiper-button-next swiper-button-next-' . $attributes['blockId'] . '"><i class="' . $attributes['arrowIconNext'] . '"></i></button>';

		$pagination = '<div class="swiper-pagination swiper-pagination-' . esc_attr( $attributes['blockId'] ) . '"></div>';
		$scrollbar  = '<div class="swiper-scrollbar swiper-scrollbar-' . esc_attr( $attributes['blockId'] ) . '"></div>';

		$content = sprintf(
			'<div %1$s  %4$s><div %8$s >%2$s</div> %5$s %6$s %7$s </div>',
			$wrapper_attributes,
			$content,
			$block_id,
			wp_interactivity_data_wp_context( $swiper_settings ),
			! empty( $attributes['configs']['showNavigation'] ) ? $navigation : '',
			! empty( $attributes['configs']['showPagination'] ) ? $pagination : '',
			! empty( $attributes['configs']['showScrollbar'] ) ? $scrollbar : '',
			$slider_wrapper_attributes
		);

		return $content;
	}

	public function get_slider_wrapper_attributes( $block ) {
		if ( empty( $block ) || 1 !== count( $block->parsed_block['innerBlocks'] ) || 'omnipress/container' === $block->parsed_block['innerBlocks'][0]['blockName'] ) {
			return 'class="swiper-wrapper"';
		}

		$inner_block = $block->parsed_block['innerBlocks'][0] ?? array();
		return "class='swiper-wrapper op-{$inner_block['attrs'] ['blockId']}' data-type='{$inner_block['blockName'] }'";
	}
}
