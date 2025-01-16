<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use Omnipress\Helpers\GeneralHelpers;

/**
 * Query Template block.
 *
 * @since   1.4.1
 * @package Omnipress
 */
class QueryLoop extends AbstractBlock {
	/**
	 * Block name.
	 *
	 * @var string $name Block name.
	 */
	public $name = 'query-template';

	/**
	 * {@inheritDoc}
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		wp_enqueue_script_module( 'omnipress/module-query' );
		wp_enqueue_script( 'wp-api-fetch' );

		$current_query = json_decode( wp_unslash( $_GET[ 'query_' . $attributes['blockId'] ] ?? '' ), true );

		$filters = array(
			'queryId'   => 'query_' . $attributes['blockId'],
			'min_price' => 0,
			'max_price' => 'max',
		);

		if ( GeneralHelpers::is_valid_array( $current_query ) ) {
			foreach ( $current_query as $key => $value ) {
				if ( strpos( $key, 'pa_' ) !== false ) {
					$filters['attributes'][ $key ] = explode( ',', $value );
					continue;
				}

				$filters[ $key ] = $value;
			}
		}

		$context = wp_interactivity_data_wp_context(
			array(
				'view_layout' => 'grid',
				'filters'     => $filters,
			),
		);

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'data-wp-interactive'         => 'omnipress/query',
				'data-wp-router-region'       => 'query-' . $attributes['blockId'],
				'data-wp-bind--aria-controls' => 'context.view_layout',
				'data-wp-key'                 => esc_attr( $attributes['blockId'] ),
			)
		);

		$tag = $attributes['tagName'] ?? 'div';

		$content = sprintf(
			'<%1$s %2$s %3$s> %4$s</%1$s>',
			$tag,
			$context,
			$wrapper_attributes,
			$content
		);

		return $content;
	}
}
