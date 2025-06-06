<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;
use Omnipress\Helpers;
use Omnipress\Helpers\GeneralHelpers;
use WP_HTML_Tag_Processor;

/**
 * Query Template block.
 *
 * @since 1.4.1
 * @package Omnipress
 */
class QueryPaginationNumbers extends AbstractBlock {

	private $attributes = array(
		'blockId'      => '',
		'queryId'      => false,
		'otherFilters' => array(),
		'layout'       => array(
			'columnCount'   => 3,
			'mdColumnCount' => 2,
			'smColumnCount' => 1,
		),
	);

	/**
	 * Block name.
	 *
	 * @var string $name Block name.
	 */
	private $name = 'query-template';

	/**
	 * {@inheritDoc}
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {

		if ( empty( $block->context['postId'] ) ) {
			return '';
		}

		$inherit             = isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'];
		$page_key            = isset( $block->context['queryId'] ) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
		$enhanced_pagination = isset( $block->context['enhancedPagination'] ) && $block->context['enhancedPagination'];
		$page                = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ];
		$max_page            = isset( $block->context['query']['pages'] ) ? (int) $block->context['query']['pages'] : 0;

		$content = '';

		global $wp_query;

		if ( $inherit ) {
			// Take into account if we have set a bigger `max page`
			// than what the query has.
			$total         = ! $max_page || $max_page > $wp_query->max_num_pages ? $wp_query->max_num_pages : $max_page;
			$paginate_args = array(
				'prev_next' => true,
				'total'     => $total,
			);

			$content = paginate_links( $paginate_args );
		} else {
			$prev_query = $wp_query;
			$query_args = Helpers::build_query_vars_from_omnipress_query_block( $block, $page );

			if ( 'product' === $query_args['post_type'] ) {
				$query_args = GeneralHelpers::validate_wc_query_args( $query_args, $block );
			}

			$query_vars = new \WP_Query( $query_args );

			$paginate_args['add_args'] = array( 'cst' => '' );

			$paged = empty( $_GET['paged'] ) ? null : (int) $_GET['paged'];

			if ( $paged ) {
				$paginate_args['add_args'] = array( 'paged' => $paged );
			}

			$content = paginate_links(
				array(
					'base'      => '%_%',
					'format'    => "?{$page_key}=%#%",
					'current'   => max( 1, $page ),
					'total'     => $query_vars->max_num_pages,
					'prev_next' => false,
				)
			);

			wp_reset_postdata(); // Restore original Post Data.
			$wp_query = $prev_query; // phpcs:ignore

			$wrapper_attributes = get_block_wrapper_attributes(
				array(
					'class'     => 'op-block__query-pagination-numbers--wrapper op-' . ( $attributes['blockId'] ?? '' ),
					'data-type' => 'omnipress/query-pagination-numbers',
				)
			);

			$content = sprintf(
				'<div %1$s>%2$s</div>',
				$wrapper_attributes,
				$content
			);

			$p = new WP_HTML_Tag_Processor( $content );

			if ( $enhanced_pagination ) {
				$tag_index = 0;
				while ( $p->next_tag(
					array( 'class_name' => 'page-numbers' )
				) ) {
					if ( null === $p->get_attribute( 'data-wp-key' ) ) {
						$p->set_attribute( 'data-wp-key', 'index-' . $tag_index++ );
						$p->add_class( 'op-block__query-pagination-numbers' );
					}

					if ( 'A' === $p->get_tag() ) {
						$p->set_attribute( 'data-wp-on--click', 'actions.navigate' );
					}
				}
			} else {
				$tag_index = 0;
				while ( $p->next_tag(
					array( 'class_name' => 'page-numbers' )
				) ) {
					if ( null === $p->get_attribute( 'data-wp-key' ) ) {
						$p->add_class( 'op-block__query-pagination-numbers' );
					}
				}
			}
			$content = $p->get_updated_html();
		}

		return $content ?? '';
	}

	public function getAttributes(): array {
		return $this->attributes;
	}
}
