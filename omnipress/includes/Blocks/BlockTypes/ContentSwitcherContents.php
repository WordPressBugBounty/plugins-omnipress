<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


/**
 * Class ContentSwitcher
 *
 * @author Omnipressteam
 * @package Omnipress/Block
 *
 * @sincw
 */

class ContentSwitcherContents extends AbstractBlock {

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$block->parsed_block['attrs'] = $attributes;

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'                     => "op-block__content-switcher-contents op-{$attributes['blockId']}",
				'data-target'               => 'switch-1',
				'data-wp-bind--data-target' => 'context.activeTarget',
				'data-type'                 => 'omnipress/content-switcher-contents',

			)
		);

		wp_enqueue_script_module( 'omnipress/content/switcher' );

		return sprintf( '<div %s>%s</div>', $wrapper_attributes, $content );
	}
}
