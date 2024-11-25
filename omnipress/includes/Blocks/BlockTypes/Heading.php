<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

( defined( 'ABSPATH' ) ) || exit;

/**
 * Heading class.
 */
class Heading extends AbstractBlock {
	public function render( $attributes, $content, $block ) {

		return $content;
	}
}
