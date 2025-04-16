<?php
declare( strict_types=1 );

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Testimonials
 *
 * @author omnipressteam
 * @package app\core
 *
 * @since 1.6.0
 */
final class SingleTestimonial extends AbstractBlock {
	protected array $default_attributes = array(
		'selectedTaxonomy' => 'category',
		'postsPerPage'     => 6,
		'selectedLayout'   => 'layout-one',
		'nextLabel'        => 'Next',
		'prevLabel'        => 'Previous',
		'blockId'          => '',

	);

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->block_attributes = array_merge( $this->default_attributes, $attributes );
		$this->block_name       = $block->name;
		$selected_layout        = ! empty( $attributes['selectedLayout'] ) ? sanitize_text_field( $attributes['selectedLayout'] ) : 'layout-one';
		$post_id                = isset( $block->context['postId'] ) ? $block->context['postId'] : '';

		if ( ! empty( $attributes['testimonialId'] ) ) {
			$post_id = $attributes['testimonialId'];
		}

		$post           = get_post( $post_id );
		$author         = get_post_meta( $post_id, '_author_name', true );
		$author_role    = get_post_meta( $post_id, '_author_role', true );
		$author_company = get_post_meta( $post_id, '_author_company', true );
		$image          = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
		$content        = $post->post_content;
		$title          = $post->post_title;
		$hidden_fields  = $attributes['hiddenFields'] ?? array();

		$layout = $this->get_block_presets(
			$selected_layout,
			array(
				'post_id'        => $post_id,
				'author'         => in_array( 'authorName', $hidden_fields, true ) ? false : $author_role,
				'author_role'    => in_array( 'authorRole', $hidden_fields, true ) ? false : $author_role,
				'author_company' => in_array( 'authorRole', $hidden_fields, true ) ? false : $author_company,
				'image'          => in_array( 'featureImage', $hidden_fields, true ) ? false : $image,
				'content'        => in_array( 'testimonial', $hidden_fields, true ) ? false : $content,
				'title'          => $title,
				'post'           => $post,
			)
		);

		$wrapper_attributes = $this->get_block_wrapper_attributes();

		$content = sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$layout
		);

		return $content;
	}
}
