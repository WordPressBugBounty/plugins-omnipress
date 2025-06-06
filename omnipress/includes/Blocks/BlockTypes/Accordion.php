<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


/**
 * Class Accordion
 *
 * @author WpOmnipress
 * @package app\core
 */

class Accordion extends AbstractBlock {

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$accordion_lists = $attributes['lists'];

		if ( ! empty( $accordion_lists ) ) {
			$schema      = $this->generateSchema( $accordion_lists );
			$schema_json = wp_json_encode( $schema );

			$content .= '<script type="application/ld+json">' . $schema_json . '</script>';
		}

		return $content;
	}

	public function generateSchema( $accordion_lists ) {
		$schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(),
		);

		foreach ( $accordion_lists as $accordion ) {
			$schema['mainEntity'][] = array(
				'@type'          => 'Question',
				'name'           => $accordion['header'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $accordion['desc'],
				),
			);
		}

		return $schema;
	}
}
