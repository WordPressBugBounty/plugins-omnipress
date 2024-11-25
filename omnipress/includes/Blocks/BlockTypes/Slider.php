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
	public function render( $attributes, $content, $block ) {
		$block->parsed_block['attrs'] = $attributes;
		$block_id                     = $attributes['blockId'];

		$swiper_settings = array(
			'loop'         => 'true' === $attributes['loop'],
			'autoplay'     => 'true' === $attributes['autoplay'],
			'delay'        => $attributes['autoplayDelay'],
			'speed'        => $attributes['speed'],
			'effect'       => $attributes['effect'],
			'slidePerView' => $attributes['slidePerView'],
			'spaceBetween' => $attributes['spaceBetween'],

			'breakpoints'  => array(
				'680'  => array(
					'slidesPerView' => $attributes['mdSlidePerView'],
					'spaceBetween'  => $attributes['mdSpaceBetween'],
				),
				'1024' => array(
					'slidesPerView' => $attributes['slidePerView'],
					'spaceBetween'  => $attributes['spaceBetween'],
				),
			),
		);

		if ( 'true' === $attributes['showPagination'] ) {
			$swiper_settings['pagination'] = array(
				'el'        => '.swiper-pagination-' . $block_id,
				'clickable' => true,
				'type'      => $attributes['paginationType'],
			);
		}

		if ( 'true' === $attributes['showScrollbar'] ) {
			$swiper_settings['scrollbar'] = array(
				'el' => '.swiper-scrollbar-' . $block_id,
			);
		}

		if ( $attributes['showNavigation'] ) {
			$swiper_settings['navigation'] = array(
				'nextEl' => '.swiper-button-next-' . $block_id,
				'prevEl' => '.swiper-button-prev-' . $block_id,
			);
		}

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'data-type'           => 'omnipress/slider',
				'class'               => "op-block__slider op-{$block_id} op-isolation swiper",
				'data-wp-interactive' => 'omnipress/slider',
				'data-wp-init'        => 'callbacks.init',
			)
		);

		wp_register_script_module(
			'omnipress-slider-script',
			OMNIPRESS_URL . 'assets/block-interactivity/slider-module.js',
			array(
				array(
					'id'     => '@wordpress/interactivity',
					'import' => 'static',
				),
			),
			OMNIPRESS_VERSION
		);

		$slider_wrapper_attributes = $this->get_slider_wrapper_attributes( $block );

		wp_enqueue_script_module( 'omnipress-slider-script' );
		$navigation = '<button class="swiper-button-prev swiper-button-prev-' . esc_attr( $attributes['blockId'] ) . '"><i class="' . $attributes['arrowIconPrev'] . '"></i></button><button class="swiper-button-next swiper-button-next-' . $attributes['blockId'] . '"><i class="' . $attributes['arrowIconNext'] . '"></i></button>';

		$pagination = '<div class="swiper-pagination swiper-pagination-' . esc_attr( $attributes['blockId'] ) . '"></div>';
		$scrollbar  = '<div class="swiper-scrollbar swiper-scrollbar-' . esc_attr( $attributes['blockId'] ) . '"></div>';

		$content = sprintf(
			'<div %1$s  %4$s><div %8$s >%2$s</div> %5$s %6$s %7$s </div>',
			$wrapper_attributes,
			$content,
			$block_id,
			wp_interactivity_data_wp_context( $swiper_settings ),
			$attributes['showNavigation'] ? $navigation : '',
			'true' === $attributes['showPagination'] ? $pagination : '',
			'true' === $attributes['showScrollbar'] ? $scrollbar : '',
			$slider_wrapper_attributes
		);

		return $content;
	}

	public function get_slider_wrapper_attributes( $block ) {
		if ( empty( $block ) || 1 !== count( $block->parsed_block['innerBlocks'] ) ) {
			return 'class="swiper-wrapper"';
		}

		$inner_block = $block->parsed_block['innerBlocks'][0];
		return "class='swiper-wrapper op-{$inner_block['attrs'] ['blockId']}' data-type='{$inner_block['blockName']}'";
	}
}
