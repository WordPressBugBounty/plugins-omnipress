<?php

declare(strict_types=1);

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Class ContactForm
 *
 * @package Omnipress\Blocks\BlockTypes
 */

class ContactForm extends AbstractBlock {


	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->block_attributes = $attributes;
		$this->block_name       = $block->name;

		$wrapper_attributes = $this->get_block_wrapper_attributes();
		ob_start();
		?>
			<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> >
				<div className="op-block__contact-form-wrapper">
					<?php if ( empty( $attributes['hasDescription'] ) && empty( $attributes['hasTitle'] ) ) : ?>
						<div className="op-block__contact-form-header">
							<?php if ( ! empty( $attributes['hasTitle'] ) && isset( $attributes['title'] ) ) : ?>
								<h4><?php echo $$attributes['title']; ?></h4>
							<?php endif; ?>
							<?php if ( ! empty( $attributes['hasDescription'] ) && isset( $attributes['description'] ) ) : ?>
								<h4><?php echo $$attributes['description']; ?></h4>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div className="form-content" >
						<?php echo do_shortcode( '[contact-form-7 id="' . $attributes['selectedFormId'] . '" title="' . ( $attributes['title'] ?? '' ) . '" description="' . ( $attributes['description'] ?? '' ) . '"]' ); ?>
					</div>
				</div>
			</div>
		<?php
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
