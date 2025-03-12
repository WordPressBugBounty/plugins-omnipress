<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

class PostCategory extends AbstractBlock {
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->block            = $block;
		$this->block_attributes = $attributes;
		$this->block_name       = $block->name;
		$content                = $this->get_block_template( 'posts/post-category' );
		$wrapper_attributes     = $this->get_block_wrapper_attributes();

		$content = sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$content
		);

		return $content;
	}
}
