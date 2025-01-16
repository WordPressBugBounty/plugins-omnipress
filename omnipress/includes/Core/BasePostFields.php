<?php
namespace Omnipress\Core;

defined( 'ABSPATH' ) || exit;

/**
 * Base post fields class.
 *
 * It Works only inside the Wp_query loop.
 *
 * @author Asishwor
 * @copyright (c) 2024
 */
class BasePostFields {
	/**
	 * Check current block using interactivity api with dynamic changes on any fields we will update this value with context value from client side.
	 *
	 * @var bool $is_interactive Is interactive.
	 */
	protected $is_interactive;

	/**
	 * Hidden fields.
	 *
	 * @var array $hidden_fields Hidden fields.
	 */
	protected $hidden_fields = array();

	/**
	 * Post Id
	 *
	 * @var int $post_id Post Id.
	 */
	protected $post_id;

	public function __construct( int $post_id, array $hidden_fields = array() ) {
		$this->post_id       = $post_id;
		$this->hidden_fields = $hidden_fields;
	}

	/**
	 * Check if the field is hidden.
	 *
	 * @param string $field The field name.
	 * @return bool True if the field is hidden, false otherwise.
	 */
	public function is_hidden( $field ) {
		return in_array( $field, $this->hidden_fields, true );
	}

	public function render_thumbnail( $classes = '' ): string {

		if ( $this->is_hidden( 'thumbnail' ) ) {
			return '';
		}

		return sprintf(
			'<a href="%s"><figure><img loading="lazy" %s %s src="%s" class="post-thumbnail %s" alt="%s" /></figure></a>',
			esc_url( get_the_permalink( $this->post_id ) ),
			$this->is_interactive ? 'data-wp-bind--src="context.thumbnail"' : '', // This added to make dynamic thumbnail when user choose different types of variation of current product then changed it's thumbnail according to variation.
			$this->is_interactive ? 'data-wp-bind--srcset="context.thumbnailSrcset"' : '', // This added to make dynamic thumbnail when user choose different types of variation of current product then changed it's thumbnail according to variation.
			esc_url( get_the_post_thumbnail_url( $this->post_id ) ),
			esc_attr( $classes ),
			esc_attr( get_the_title( $this->post_id ) )
		);
	}

	public function render_title( $classes = '', $link = true, $tag = 'h2' ): string {
		if ( $this->is_hidden( 'title' ) ) {
			return '';
		}

		return sprintf(
			'<%1$s class="post-title %2$s">%3$s</%1$s>',
			esc_attr( $tag ),
			esc_attr( $classes ),
			$link ? sprintf( '<a href="%s">%s</a>', esc_url( get_the_permalink( $this->post_id ) ), esc_html( get_the_title( $this->post_id ) ) ) : esc_html( get_the_title( $this->post_id ) )
		);
	}

	public function render_date( $classes = '' ): string {
		if ( $this->is_hidden( 'date' ) ) {
			return '';
		}

		return sprintf(
			'<div class="post-date %s">%s</div>',
			esc_attr( $classes ),
			esc_html( get_the_date( 'F j, Y' ) )
		);
	}

	public function render_author( $classes = '', $prefix = 'By' ): string {
		if ( ! $this->is_hidden( 'author' ) ) {
			return sprintf(
				'<div class="post-author %s"><a href="%s">%s %s</a></div>',
				esc_attr( $classes ),
				esc_url( get_author_posts_url( \get_the_author_meta( 'ID' ) ) ),
				esc_html( $prefix ),
				esc_html( get_the_author() )
			);
		}
		return '';
	}

	public function render_excerpt( $classes = '' ): string {
		if ( $this->is_hidden( 'excerpt' ) ) {
			return '';
		}

		return sprintf(
			'<div class="post-excerpt %s">%s</div>',
			esc_attr( $classes ),
			esc_html( get_the_excerpt( $this->post_id ) )
		);
	}

	public function render_categories( $classes = '', $separator = ', ' ): string {
		if ( $this->is_hidden( 'categories' ) ) {
			return '';
		}

		return sprintf(
			'<div class="post-categories %s">%s</div>',
			esc_attr( $classes ),
			get_the_category_list( $separator, $this->post_id )
		);
	}
}
