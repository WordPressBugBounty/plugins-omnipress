<?php

declare(strict_types=1);

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use OmnipressPro\PostsFields;

defined( 'ABSPATH' ) || exit;

/**
 * Class DynamicQueryField
 *
 * @author omnipressteam
 *
 * @since 1.4.2
 *
 * @package Omnipress\Blocks
 */
class DynamicFieldQuery extends AbstractBlock {

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$post_id                = isset( $block->context['postId'] ) ? $block->context['postId'] : get_queried_object_id();
		$post_type              = isset( $attributes['postType'] ) ? $attributes['postType'] : get_post_type( $post_id );
		$field_tye              = isset( $attributes['fieldType'] ) ? $attributes['fieldType'] : '';
		$query_field_name       = isset( $attributes['queryFieldName'] ) ? $attributes['queryFieldName'] : '';
		$this->block_attributes = $attributes;
		$this->block_name       = $block->name;

		if ( is_single() && ! $post_id ) {
			$post_id = get_queried_object_id();
		}

		if ( ! $post_id || ! $field_tye || ! $query_field_name ) {
			return '';
		}

		if ( ! class_exists( PostsFields::class ) ) {
			return '';
		}

		$is_link_enabled    = isset( $attributes['isLink'] ) && $attributes['isLink'];
		$wrapper_attributes = $this->get_block_wrapper_attributes( $is_link_enabled ? 'is-linked-element' : '' );
		$tag_name           = isset( $attributes['tag'] ) ? $attributes['tag'] : 'div';

		$tag_name = 'p' === $tag_name ? 'div' : $tag_name;

		$args = array(
			'post_id'      => $post_id,
			'field_source' => $field_tye,
			'field'        => $query_field_name,
			'source'       => 'current-page',
			'post_type'    => $post_type,
		);

		$content = apply_filters( "omnipress_dynamic_content_content_{$args['source']}_{$args['field_source']}", $content, $args, $block );
		// $post_field         = new PostsFields();
		// $content = $post_field->retrieve_query_content( $args );

		return sprintf(
			'<%1$s %2$s>%3$s</%1$s>',
			$tag_name,
			$wrapper_attributes,
			$is_link_enabled ? "<a href='" . get_permalink( $post_id ) . "'>$content</a>" : $content
		);
	}
}
