<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Image Block class.
 *
 * @author omnipressteam
 *
 * @since 1.4.2
 *
 * @package Omnipress\Blocks
 */
class Image extends AbstractBlock {
	public function render( array $attributes, string $content, \WP_Block $block ): string {

		if ( isset( $attributes['post']['url'] ) && ! $attributes['enabledLightbox'] ) {
			$content = sprintf(
				'<a href="%s" target="%s" class="%s" rel="%s">%s</a>',
				esc_attr( $attributes['post']['url'] ),
				esc_attr( $attributes['target'] ),
				esc_attr( $attributes['linkClass'] ?? '' ),
				esc_attr( $attributes['target'] ? 'noopener noreferrer' : '' ),
				$content
			);
		}

		$p = new \WP_HTML_Tag_Processor( $content );

		if ( $p->next_tag( 'figure' ) ) {
			$p->set_bookmark( 'figure' );
			$p->set_attribute( 'data-wp-interactive', 'omnipress/image' );
		}

		if ( $p->next_tag( 'img' ) ) {
			$alt = $p->get_attribute( 'alt' );
			$src = $p->get_attribute( 'src' );

			$p->set_attribute( 'src', '' );
			$p->set_attribute( 'decoding', 'async' );
			$image_height = $p->get_attribute( 'height' );
			$image_width  = $p->get_attribute( 'width' );

			if ( isset( $attributes['id'] ) ) {
				$p->set_attribute( 'srcset', wp_get_attachment_image_srcset( $attributes['id'] ) );

				$size = $p->get_attribute( 'data-size' );
				$p->set_attribute( 'sizes', wp_get_attachment_image_sizes( $attributes['id'], $size ) );
				$src          = wp_get_attachment_url( $attributes['id'] );
				$metadata     = wp_get_attachment_metadata( $attributes['id'] );
				$image_width  = $metadata['width'] ?? 'none';
				$image_height = $metadata['height'] ?? 'none';
			}

			if ( $attributes['enabledLightbox'] || $attributes['isLoadLazily'] ) {
				$p->set_attribute(
					'data-wp-context',
					wp_json_encode(
						array(
							'alt'         => $alt ?? '',
							'src'         => empty( $src ) ? $attributes['src'] : $src,
							'width'       => $image_width,
							'imageHeight' => $image_height,
							'imageWidth'  => $image_width,
						)
					)
				);
				$p->set_attribute( 'data-lightbox', 'true' );

				wp_register_script_module(
					'~omnipress/block-interactivity/image',
					OMNIPRESS_URL . 'assets/block-interactivity/image-view.js',
					array( '@wordpress/interactivity' ),
					OMNIPRESS_VERSION
				);

				wp_enqueue_script_module( '~omnipress/block-interactivity/image' );

				add_action( 'wp_footer', array( $this, 'render_lightbox_container' ) );
				$p->set_attribute( 'data-wp-init', 'callbacks.setImageStyles' );
			}

			if ( $attributes['enabledLightbox'] ) {
				$p->set_attribute( 'data-wp-on-async--click', 'actions.showLightbox' );
			}
		}

		if ( ! $attributes['enabledLightbox'] ) {

			return $p->get_updated_html();
		}

		if ( false === stripos( $content, '<img' ) ) {
			return '';
		}

		// seek figure.
		$p->seek( 'figure' );

		$updated_content = $p->get_updated_html();

		$content = $updated_content;

		return $content;
	}

	public function render_lightbox_container() {
		?>
			<div data-wp-interactive="omnipress/image" data-wp-on--click="actions.hideLightbox" data-wp-bind--style="state.currentImage.style" data-wp-context="{}" id="op-lightbox"><button data-wp-on--click="actions.hideLightbox"  type="button" aria-label="Close" style="fill: var(--wp--preset--color--contrast)" class="close-button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path></svg>
				</button><img data-wp-bind--src="state.currentImage.src"  data-wp-bind--alt=state.currentImage.alt"/></div>
		<?php
	}
}
