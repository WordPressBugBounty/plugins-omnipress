<?php

namespace Omnipress\Core;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Class Container block main class.
 *
 * @author Ishwor Khadka <asishwor@gmail.com>
 * @package app\core
 */
class Swiper extends AbstractBlock {
	/**
	 * Get Swiper configuration and required modules based on effect.
	 *
	 * @param string $effect Swiper effect. E.g., 'slide', 'fade', 'cube', 'coverflow', 'flip', 'creative'.
	 * @param array  $custom_options Optional. Additional options to merge.
	 * @return array {
	 *     @type array $modules  List of required Swiper modules.
	 *     @type array $options  Swiper options array.
	 * }
	 */
	public function get_swiper_config_by_effect( string $effect = 'slide' ): array {
		$options = array(
			'effect' => $effect,
		);

		switch ( $effect ) {
			case 'fade':
				$options['fadeEffect'] = array( 'crossFade' => true );
				break;

			case 'cube':
				$options['cubeEffect'] = array(
					'shadow'       => true,
					'slideShadows' => true,
					'shadowOffset' => 20,
					'shadowScale'  => 0.94,
				);
				break;

			case 'coverflow':
				$options['coverflowEffect'] = array(
					'rotate'       => 50,
					'stretch'      => 0,
					'depth'        => 100,
					'modifier'     => 1,
					'slideShadows' => true,
				);
				break;

			case 'flip':
				$options['flipEffect'] = array(
					'slideShadows'  => true,
					'limitRotation' => true,
				);
				break;

			case 'creative':
				$options['creativeEffect'] = array(
					'prev' => array(
						'shadow'    => true,
						'translate' => array( 0, 0, -400 ),
					),
					'next' => array(
						'translate' => array( '100%', 0, 0 ),
					),
				);
				break;

			// default 'slide' effect doesn't need extra module.
			default:
				break;
		}

		return $options;
	}

	public function get_configs(): array {
		return $this->get_block_attributes()['configs'] ?? array(
			'spaceBetween' => 0,
			'slidePerView' => 1,
		);
	}

	public function validate_configs( $swiper_settings ): array {
		$block_id = $this->get_block_attributes()['blockId'];

		/* Swiper Pagination */
		if ( ! empty( $swiper_settings['showPagination'] ) ) {
			$swiper_settings['pagination'] = array(
				'el'        => '.swiper-pagination-' . $block_id,
				'clickable' => true,
				'type'      => $swiper_settings['paginationType'] ?? 'bullets',
			);
		}

		/* Swiper Scrollbar */
		if ( $swiper_settings['showScrollbar'] ?? false ) {
			$swiper_settings['scrollbar'] = array(
				'el' => '.swiper-scrollbar-' . $block_id,
			);
		}

		/* Swiper Navigation */
		if ( ! empty( $swiper_settings['showNavigation'] ) ) {
			$swiper_settings['navigation'] = array(
				'nextEl' => '.swiper-button-next-' . $block_id,
				'prevEl' => '.swiper-button-prev-' . $block_id,
			);
		}

		/* Effect */
		$swiper_settings = array_merge( $swiper_settings, $this->get_swiper_config_by_effect( $swiper_settings['effect'] ?? 'slide' ) );

		return $swiper_settings;
	}
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


	/**
	 * Get Swiper elements. Like Navigation, Pagination, Scrollbar.
	 *
	 * @return string
	 */
	public function get_swiper_els(): string {
		$config     = $this->get_configs();
		$attributes = $this->get_block_attributes();
		$els        = '';

		if ( ! empty( $config['showNavigation'] ) ) {
			$els .= '<button class="swiper-button-prev swiper-button-prev-' . esc_attr( $attributes['blockId'] ) . '" type="button"><i class="' . esc_attr( $config['prevIcon'] ?? '<' ) . '"></i></button>';
		}

		if ( ! empty( $config['showNavigation'] ) ) {
			$els .= '<button class="swiper-button-next swiper-button-next-' . esc_attr( $attributes['blockId'] ) . '" type="button"><i class="' . esc_attr( $config['nextIcon'] ?? '>' ) . '"></i></button>';
		}

		if ( ! empty( $config['showPagination'] ) && empty( $config['thumbs'] ) ) {
			$els .= '<div class="swiper-pagination swiper-pagination-' . esc_attr( $attributes['blockId'] ) . '"></div>';
		}

		if ( ! empty( $config['showScrollbar'] ) && empty( $config['thumbs'] ) ) {
			$els .= '<div class="swiper-scrollbar swiper-scrollbar-' . esc_attr( $attributes['blockId'] ) . '"></div>';
		}

		return $els;
	}
}
