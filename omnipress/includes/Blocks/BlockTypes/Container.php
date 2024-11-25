<?php

namespace Omnipress\Blocks\BlockTypes;

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
	public function render( $attributes, $content, $block ) {

		$inherit_id = isset( $attributes['extraClasses'] ) ? $attributes['extraClasses'] : '';

		$inherit_classes = isset( $block->context['classNames'] ) ? $block->context['classNames'] : '';

		$block_wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class' => 'op-block op-container op-' . esc_attr( $attributes['blockId'] ) . ' ' . esc_attr( $inherit_classes ) . ' ' . esc_attr( $inherit_id ),
			)
		);

		$updated_wrapper = false;
		$increment       = 0;

		$p = new \WP_HTML_Tag_Processor( $content );

		while ( $p->next_tag() && false === $updated_wrapper ) {
			$id = $p->get_attribute( 'id' );

			$p->set_attribute( 'id', $id . $inherit_id );

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
