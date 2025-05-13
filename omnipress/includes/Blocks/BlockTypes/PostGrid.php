<?php
namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Posts Grid Block.
 *
 * This class represents a block for displaying posts in a grid layout.
 *
 * @package Omnipress\Blocks
 * @since 1.2.3
 */
class PostGrid extends AbstractBlock {
	/**
	 * Block Default attributes.
	 *
	 * @var array
	 */
	protected array $attributes = array(
		'categoriesWrapper' => array(
			'borderRadius'    => '7px',
			'backgroundColor' => '#175fff',
			'color'           => '#ffffff',
			'padding'         => '0 12px;',
		),
	);
	/**
	 * Sets the attributes for the block.
	 *
	 * This method sets the attributes for the block.
	 *
	 * @param array $attributes The attributes to set for the block.
	 * @return void
	 */
	public function set_attributes( array $attributes ): void {
		$this->attributes = $attributes;
	}

	/**
	 * Sets the block name.
	 *
	 * This method sets the block name.
	 *
	 * @param string $block_name The name of the block.
	 * @return void
	 */
	public function set_block_name( string $block_name ): void {
		$this->block_name = $block_name;
	}


	/**
	 * Render All posts.
	 *
	 * This function renders the posts grid block by fetching posts based on attributes,
	 * and rendering the posts if there are any.
	 *
	 * @param array     $attributes Block's attributes.
	 * @param string    $content Block content.
	 * @param \WP_Block $block Block instance.
	 * @return string HTML content of the rendered block.
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$block->parsed_block['attrs'] = $attributes;
		$this->block_attributes       = $attributes;
		$this->block_name             = $block->name;

		$wp_query = new \WP_Query( $this->get_query_args() );

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'     => 'op-' . $attributes['blockId'] . ' op-block__post-grid',
				'data-type' => 'omnipress/post-grid',
			)
		);

		$content = '<div ' . $wrapper_attributes . '><div class="omnipress-layout-grid">';

		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$content .= $this->get_block_template(
					'posts/single-post/layout-one',
					'free',
					array(
						'hidden_fields'     => $attributes['hiddenFields'] ?? array(),
						'linked_attributes' => $this->block_attributes['linkedAttributes'],
					),
				);
			}
		}
		$content .= '</div></div>';

		return $content;
	}

	public function get_query_args() {
		if ( ! empty( $this->attributes ) ) {
			$args = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => $this->attributes['postPerPage'] ?? 6,
				'orderby'        => $this->attributes['orderby'] ?? 'desc',
				'order'          => $this->attributes['order'] ?? 'date',
				's'              => $this->attributes['search'] ?? '',
			);

			if ( isset( $this->attributes['selectedCategoryId'] ) && $this->attributes['selectedCategoryId'] ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => (int) ( $this->attributes['selectedCategoryId'] ?? '' ),
					),
				);
			}

			return $args;
		}
	}
}
