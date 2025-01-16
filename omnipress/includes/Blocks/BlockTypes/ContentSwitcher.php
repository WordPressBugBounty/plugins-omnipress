<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


/**
 * Class ContentSwitcher
 *
 * @author Omnipressteam
 * @package Omnipress/Block
 *
 * @since v1.4.5
 */

class ContentSwitcher extends AbstractBlock {

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$block->parsed_block['attrs'] = $attributes;

		$active_styles = 'display:block;';

		$context = array(
			'activeTarget' => 'switch-1',
			'hide_styles'  => $active_styles,
			'uniqueId'     => $attributes['blockId'],
		);

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'               => "op-block__content-switcher op-{$context['uniqueId']}",
				'data-wp-interactive' => 'omnipress/content-switcher',
				'data-type'           => 'omnipress/content-switcher',
			)
		);

		wp_enqueue_script_module( 'omnipress/content/switcher' );

		$context_attrs       = wp_interactivity_data_wp_context( $context );
		$wrapper_attributes .= $context_attrs;

		$initial_styles = '[data-type="omnipress/content-switcher-contents"] > *{display:none;}';

		return sprintf( '<div %s><style data-wp-text="context.style">%s</style><style>%s</style>%s</div>', $wrapper_attributes, "#switch-1{{$active_styles}}", $initial_styles, $content );
	}
}

// write sum function
