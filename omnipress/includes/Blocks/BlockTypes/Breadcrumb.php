<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use OmnipressPro\DynamicContent\source\Woocommerce;

/**
 * Class BreadCrumb
 *
 * @package app\core
 */

class BreadCrumb extends AbstractBlock {
	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->set_attributes( $attributes );
		$this->set_block_name( $block->name );
		$layout = isset( $attributes['layout'] ) ? $attributes['layout'] : 'minimalist';

		$wrapper_attributes = $this->get_block_wrapper_attributes(
			"op-breadcrumb $layout alignwide",
		);

		if ( is_front_page() ) {
			return ''; // Not show breadcrumb on front page.
		}

		ob_start();
		echo '<nav ' . $wrapper_attributes . ' aria-label="Breadcrumb">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<ol class="breadcrumb-list">';
		echo '<li class="breadcrumb-item"><a rel="home" href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';

		if ( is_singular( 'post' ) ) {
			$categories = get_the_category();

			if ( $categories ) {
				$category = $categories[0];
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
			}
			echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
		} elseif ( is_category() ) {
			echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( single_cat_title( '', false ) ) . '</li>';
		} elseif ( is_page() && ! is_front_page() ) {
			$parent_id = wp_get_post_parent_id( get_the_ID() );
			if ( $parent_id ) {
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a></li>';
			}
			echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
		} elseif ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
			if ( is_shop() ) {
				echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( woocommerce_page_title( false ) ) . '</li>';
			} elseif ( is_product_category() ) {
				$term      = get_queried_object();
				$ancestors = get_ancestors( $term->term_id, 'product_cat' );

				foreach ( array_reverse( $ancestors ) as $ancestor_id ) {
					$ancestor = get_term( $ancestor_id, 'product_cat' );
					echo '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a></li>';
				}
				echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( $term->name ) . '</li>';
			} elseif ( is_product() ) {
				$terms = wc_get_product_terms(
					get_the_ID(),
					'product_cat',
					array(
						'orderby' => 'parent',
						'order'   => 'DESC',
					)
				);

				if ( $terms ) {
					$main_term = $terms[0];
					$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
					foreach ( array_reverse( $ancestors ) as $ancestor_id ) {
						$ancestor = get_term( $ancestor_id, 'product_cat' );
						echo '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a></li>';
					}
					echo '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a></li>';
				}
				echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
			}
		}
		echo '</ol>';
		echo '</nav>';

		echo $this->add_schema( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		return ob_get_clean();
	}

	function add_schema( $attributes ): string {
		$enable_schema = isset( $attributes['enableSchema'] ) ? $attributes['enableSchema'] : true;

		ob_start();
		if ( $enable_schema ) {
			$position = 1;
			$schema   = array(
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => array(),
			);

			$schema['itemListElement'][] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => 'Home',
				'item'     => esc_url( home_url( '/' ) ),
			);

			if ( is_singular( 'post' ) ) {
				$categories = get_the_category();
				if ( $categories ) {
					$category                    = $categories[0];
					$schema['itemListElement'][] = array(
						'@type'    => 'ListItem',
						'position' => $position++,
						'name'     => esc_html( $category->name ),
						'item'     => esc_url( get_category_link( $category->term_id ) ),
					);
				}
				$schema['itemListElement'][] = array(
					'@type'    => 'ListItem',
					'position' => $position++,
					'name'     => esc_html( get_the_title() ),
					'item'     => esc_url( get_permalink() ),
				);
			} elseif ( class_exists( Woocommerce::class ) && is_woocommerce() && is_product() ) {
				$terms = wc_get_product_terms(
					get_the_ID(),
					'product_cat',
					array(
						'orderby' => 'parent',
						'order'   => 'DESC',
					)
				);

				if ( $terms ) {
					$main_term = $terms[0];
					$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
					foreach ( array_reverse( $ancestors ) as $ancestor_id ) {
						$ancestor                    = get_term( $ancestor_id, 'product_cat' );
						$schema['itemListElement'][] = array(
							'@type'    => 'ListItem',
							'position' => $position++,
							'name'     => esc_html( $ancestor->name ),
							'item'     => esc_url( get_term_link( $ancestor ) ),
						);
					}
					$schema['itemListElement'][] = array(
						'@type'    => 'ListItem',
						'position' => $position++,
						'name'     => esc_html( $main_term->name ),
						'item'     => esc_url( get_term_link( $main_term ) ),
					);
				}
				$schema['itemListElement'][] = array(
					'@type'    => 'ListItem',
					'position' => $position++,
					'name'     => esc_html( get_the_title() ),
					'item'     => esc_url( get_permalink() ),
				);
			}

			echo '<script type="application/ld+json">' . json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>';

		}
		return ob_get_clean();
	}
}
