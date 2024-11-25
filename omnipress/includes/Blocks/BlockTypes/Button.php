<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

class Button extends AbstractBlock {

	/**
	 * Block's default attributes.
	 *
	 * @var array
	 */
	protected array $attributes = array(
		'wrapper'   => array(

			'backgroundColor' => '#175fff',
			'padding'         => '10px 20px',
			'border'          => 'unset',
			'cursor'          => 'pointer',
		),
		'button'    => array(
			'fontWeight' => '500',
			'fontSize'   => '16px',
			'color'      => '#ffffff',
			'gap'        => '8px',
		),
		'link'      => '',
		'newTab'    => false,
		'rel'       => '',
		'dataType'  => '',
		'dataId'    => '',
		'dataTitle' => '',
	);



	public function render( $attributes, $content, $block ) {
		$attributes = array_merge( $this->attributes, $attributes );

		$block->parsed_block['attrs'] = $attributes;

		$link       = esc_attr( $attributes['link'] );
		$target     = esc_attr( $attributes['newTab'] );
		$rel        = esc_attr( $attributes['rel'] );
		$data_type  = esc_attr( $attributes['dataType'] );
		$data_id    = esc_attr( $attributes['dataId'] );
		$data_title = esc_attr( $attributes['dataTitle'] );
		$text       = esc_html( $attributes['content'] );
		$unique_id  = esc_attr( $attributes['blockId'] );

		$markup = "<div data-id='$data_id' data-title='$data_title' data-type='$data_type' class='op-block-button__link op-block__button-content op-$unique_id'>";

		if ( $link ) {
			$markup .= Utils::generate_output_link( $link, $target, $rel, $text );
		}

		$markup .= "<button class='op-block-button__link op-block__button-content'> $text</button>";
		$markup .= '</div>';

		return $content;
	}
}
