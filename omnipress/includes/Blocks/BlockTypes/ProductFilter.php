<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Query Template block.
 *
 * @since   1.4.1
 * @package Omnipress
 */
class ProductFilter extends AbstractBlock {


	/**
	 * Block name.
	 *
	 * @var string $name Block name.
	 */
	public $name = 'product-filter';

	/**
	 * {@inheritDoc}
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {

		$product_attribute = array();

		foreach ( $_GET as $key => $val ) {
			if ( ! is_string( $val ) ) {
				continue;
			}

			if ( strpos( $key, 'pa_' ) === 0 ) {
				if ( ! empty( $val ) ) {
					$product_attribute[ $key ] = explode( ',', $val );
				}
			}
		}

		$attributes['hiddenFields'] ??= array();

		if ( 6 === count( $attributes['hiddenFields'] ) ) {
			return '';
		}

		$template_content = $this->get_block_template(
			'product-filter',
			'pro',
			array(
				'hidden_fields' => $attributes['hiddenFields'],
				'queryId'       => $block->context['queryId'] ??= '',
			)
		);

		if ( empty( $template_content ) ) {
			return '';
		}

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'                 => 'op-block-product-filter op-' . ( $attributes['blockId'] ??= '' ),
				'data-type'             => 'omnipress/product-filter',
				'data-wp-interactivity' => 'omnipress/query',
				'data-wp-init'          => 'callbacks.filterInit',
			)
		);

		$rendered_content = sprintf(
			'<div %s>%s</div>',
			$wrapper_attributes,
			$template_content
		);

		return $rendered_content;
	}
}
