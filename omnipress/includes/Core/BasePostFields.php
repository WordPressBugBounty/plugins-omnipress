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
	 *
	 * @var array
	 */
	protected array $linked_attributes = array();

	/**
	 * Post Id
	 *
	 * @var int $post_id Post Id.
	 */
	protected $post_id;

	public function __construct( int $post_id, array $hidden_fields = array(), array $linked_attributes = array( 'title' ) ) {
		$this->post_id           = $post_id;
		$this->hidden_fields     = $hidden_fields;
		$this->linked_attributes = $linked_attributes;
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
		$thumbnail_url = get_the_post_thumbnail_url( $this->post_id );

		return sprintf(
			'<a href="%2$s"><figure><img loading="lazy" %3$s %4$s src="%5$s" class="post-thumbnail" alt="%7$s"></figure></a>',
			in_array( 'thumbnail', $this->linked_attributes, true ) ? 'a' : 'div',
			esc_url( get_the_permalink( $this->post_id ) ),
			$this->is_interactive ? 'data-wp-bind--src="context.thumbnail" ' : '', // This added to make dynamic thumbnail when user choose different types of variation of current product then changed it's thumbnail according to variation.
			$this->is_interactive ? 'data-wp-bind--srcset="context.thumbnailSrcset" ' : '', // This added to make dynamic thumbnail when user choose different types of variation of current product then changed it's thumbnail according to variation.
			esc_url( $thumbnail_url ? $thumbnail_url : OMNIPRESS_URL . 'assets/images/placeholder.webp' ),
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
			$link ? sprintf(
				'<%1$s %2$s>%3$s</%1$s>',
				in_array( 'title', $this->linked_attributes, true ) ? 'a' : 'div',
				in_array( 'title', $this->linked_attributes ) ? "href='" . esc_url( get_the_permalink( $this->post_id ) ) . "'" : '',
				esc_html( get_the_title( $this->post_id ) )
			) : esc_html( get_the_title( $this->post_id ) )
		);
	}

	public function render_date( $classes = '' ): string {
		if ( $this->is_hidden( 'date' ) ) {
			return '';
		}

		return sprintf(
			'<%1$s %2$s class="post-date %3$s">%4$s</%1$s>',
			in_array( 'date', $this->linked_attributes, true ) ? 'a' : 'div',
			in_array( 'date', $this->linked_attributes, true ) ? 'href="' . esc_url( get_the_permalink( $this->post_id ) ) . '"' : 'div',
			esc_attr( $classes ),
			esc_html( get_the_date( 'F j, Y' ) )
		);
	}

	public function render_author( $classes = '', $prefix = 'By' ): string {
		if ( ! $this->is_hidden( 'author' ) ) {
			return sprintf(
				'<div class="post-author %1$s"><%2$s href="%3$s">%4$s %5$s</%2$s></div>',
				esc_attr( $classes ),
				in_array( 'author', $this->linked_attributes, true ) ? 'a' : 'div',
				in_array( 'author', $this->linked_attributes, true ) ? esc_url( get_author_posts_url( \get_the_author_meta( 'ID' ) ) ) : '',
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
			'<div class="post - excerpt % s">%s</div>',
			esc_attr( $classes ),
			esc_html( get_the_excerpt( $this->post_id ) )
		);
	}

	public function render_categories( $classes = '', $separator = ', ' ): string {
		if ( $this->is_hidden( 'categories' ) ) {
			return '';
		}

		return sprintf(
			'<div class="post - categories % s">%s</div>',
			esc_attr( $classes ),
			get_the_category_list( $separator, $this->post_id )
		);
	}
}
