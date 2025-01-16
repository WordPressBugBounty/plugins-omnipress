<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

( defined( 'ABSPATH' ) ) || exit;

/**
 * Heading class.
 */
class Heading extends AbstractBlock {
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		return $content;
	}
}
