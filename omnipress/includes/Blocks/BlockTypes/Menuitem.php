<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

( defined( 'ABSPATH' ) ) || exit;

/**
 * Menuitem Block class.
 *
 * @author omnipressteam
 *
 * @since 1.4.2
 *
 * @package Omnipress\Blocks
 */
class Menuitem extends AbstractBlock {
	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		if ( ! isset( $attributes['submenuId'] ) ) {
			return $content;
		}

		$submenu_post_content = get_post( $attributes['submenuId'] )->post_content;
		$submenu_post_content = apply_filters(
			'the_content',
			$submenu_post_content
		);

		$content = str_replace( '{content}', $submenu_post_content, $content );

		return $content;
	}
}
