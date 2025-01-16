<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


class Dualbutton extends AbstractBlock {
	protected array $default_attributes = array(
		'wrapper' => array(
			'justifyContent' => 'center',
		),
	);

	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$attributes = array_merge( $this->default_attributes, $attributes );

		$block->parsed_block['attrs'] = $attributes;

		return $content;
	}
}
