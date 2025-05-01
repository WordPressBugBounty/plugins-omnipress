<?php

declare( strict_types=1 );

namespace Omnipress\Blocks\BlockTypes;

defined( 'ABSPATH' ) || exit;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Class Container block main class.
 *
 * @author Omnipressteam <omnipressteam.com>
 * @package app\core
 */
class Container extends AbstractBlock {
	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->block_attributes = $attributes;
		$this->block_name       = $block->name;

		$inherit_id = isset( $attributes['extraClasses'] ) ? $attributes['extraClasses'] : ' ';

		$inherit_classes = isset( $block->context['classNames'] ) ? $block->context['classNames'] : ' ';

		if ( $attributes ) {
			$classes = array();

			if ( isset( $attributes['styles']['wrapper']['backgroundType'] ) && 'video' === $attributes['styles']['wrapper']['backgroundType'] && ! empty( $attributes['styles']['wrapper']['backgroundVideo'] ) ) {
				$classes[] = ' has-bg-video has-background-media';
			}

			if ( isset( $attributes['styles']['wrapper']['backgroundType'] ) && 'image' === $attributes['styles']['wrapper']['backgroundType'] && ! empty( $attributes['styles']['wrapper']['backgroundImage'] ) ) {
				$classes[] = ' has-bg-image has-background-media';
			}

			$inherit_classes         .= ! empty( $classes ) ? implode( ' ', $classes ) : '';
			$block_wrapper_attributes = $this->get_block_wrapper_attributes(
				'op-block-container ' . esc_attr( $inherit_classes ) . ' ' . esc_attr( $inherit_id ),
			);

		}

		$updated_wrapper = false;
		$increment       = 0;

		$p = new \WP_HTML_Tag_Processor( $content );

		while ( $p->next_tag() && false === $updated_wrapper ) {
			if ( ! empty( $attributes['hideOnDesktop'] ) ) {
				$p->set_attribute( 'data-hide-desktop', 'true' );
			}

			if ( ! empty( $attributes['hideOnTablet'] ) ) {
				$p->set_attribute( 'data-hide-tablet', 'true' );
			}

			if ( ! empty( $attributes['hideOnMobile'] ) ) {
				$p->set_attribute( 'data-hide-mobile', 'true' );
			}

			$id = $p->get_attribute( 'id' );

			if ( ! empty( $id ) ) {
				$p->set_attribute( 'id', $id . $inherit_id );
			}

			if ( preg_match( '/class="([^"]*)"/', $block_wrapper_attributes, $matches ) ) {
				$class_value = $matches[1];

				$p->set_attribute( 'class', $class_value );
			}

			$updated_wrapper = true;
			$content         = $p->get_updated_html();

			++$increment;

		}

		return $content;
	}
}
