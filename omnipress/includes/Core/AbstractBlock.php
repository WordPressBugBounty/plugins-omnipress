<?php

namespace Omnipress\Abstracts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AbstractBlock' ) ) {
	abstract class AbstractBlock {

		const BLOCK_DIR = OMNIPRESS_PATH . 'assets/scripts/';

		/**
		 * Current Block instance.
		 *
		 * @var \WP_Block|null $block
		 */
		public $block;

		/**
		 * Block namespace.
		 *
		 * @var string
		 */
		protected string $namespace = 'omnipress';
		/**
		 * Block Type.
		 *
		 * @var string|null
		 */
		protected $block_name;


		protected array $default_attributes; // phpcs:ignore

		protected array $block_attributes;  // phpcs:ignore

		/**
		 * Block's category type.
		 *
		 * @var string Block Category.
		 */
		protected string $block_category = 'omnipress';

		/**
		 * Track current block enqueued scripts or not.
		 *
		 * @var bool
		 */
		protected bool $enqueued_scripts = false;

		/**
		 * Render the block.
		 *
		 * @param array     $attributes The block attributes.
		 * @param string    $content The block content.
		 * @param \WP_Block $block The block object.
		 * @return string The block content.
		 */
		abstract public function render( array $attributes, string $content, \WP_Block $block ): string;

		/**
		 * Get the block attributes.
		 *
		 * @return array The block attributes.
		 */
		protected function get_block_attributes() {
			return $this->block_attributes;
		}

		/**
		 * Get the block type context.
		 *
		 * @return array The block type context.
		 */
		public function get_block_type_context(): array {
			return array();
		}


		/**
		 * Get the block name.
		 *
		 * @return string The block name.
		 */
		public function get_block_name(): string {
			return $this->block_name;
		}

		/**
		 * Get the block template.
		 *
		 * @param string $template_name The template name.
		 * @param string $block_type The block type.
		 * @param array  $args The block arguments.
		 * @return string The block template.
		 */
		public function get_block_template( string $template_name, $block_type = 'free', $args = array() ) {
			$template_path = OMNIPRESS_PATH . "templates/$template_name.php";

			if ( 'pro' === $block_type && defined( 'OMNIPRESS_PRO_PATH' ) ) {
				$template_path = OMNIPRESS_PRO_PATH . "templates/$template_name.php";
			}

			if ( ! file_exists( $template_path ) ) {
				return '';
			}

			ob_start();
			// We are extract post fields from the args so we can use post fields directly in the template.
			foreach ( $args as $key => $value ) {
				$$key = $value;
			}

			include $template_path;
			return ob_get_clean();
		}

		/**
		 * Get the frontend scripts.
		 *
		 * @param string $block_name The block name.
		 * @return void
		 */
		protected function get_frontend_scripts( string $block_name ) {
			if ( file_exists( self::BLOCK_DIR . '/' . $block_name . '-view.js' ) ) {
				$script = file_get_contents(self::BLOCK_DIR . '/' . $block_name . '-view.js'); //phpcs:ignore

				wp_add_inline_script( $block_name . '-script', $script );
			}
		}

		/**
		 * Parse the block attributes.
		 *
		 * @param array|\WP_Block $attributes The block attributes or a block instatce.
		 * @return array The parsed block attributes.
		 */
		public function parses_block_attributes( $attributes ) {
			return is_a( $attributes, 'WP_BLOCK' ) ? $attributes->attributes : $attributes;
		}

		/**
		 * Get the block wrapper attributes.
		 *
		 * @param string $classes The block classes.
		 * @param array  $extra_attributes Block's extra attributes for block wrapper element.
		 *
		 * @return string
		 */
		protected function get_block_wrapper_attributes( string $classes = '', array $extra_attributes = array() ): string {
			$extra_attributes = apply_filters( 'omnipress_block_extra_attributes', $extra_attributes, $this->block_name );

			$attributes = $this->get_block_attributes();

			if ( ! empty( $this->get_block_attributes()['styles']['grid'] ) ) {

			}

			if ( isset( $attributes['hideOnTablet'] ) && $attributes['hideOnTablet'] ) {
				$classes .= ' op-hidden-tablet';
			}

			if ( isset( $attributes['hideOnMobile'] ) && $attributes['hideOnMobile'] ) {
				$classes .= ' op-hidden-mobile';
			}

			if ( isset( $attributes['hideOnDesktop'] ) && $attributes['hideOnDesktop'] ) {
				$classes .= ' op-hidden-desktop';
			}

			return get_block_wrapper_attributes(
				array_merge(
					array(
						'class'     => 'op-' . esc_attr( $this->get_block_attributes()['blockId'] ??= '' ) . ' ' . $classes,
						'data-type' => $this->block_name,
					),
					$extra_attributes
				)
			);
		}

		public function is_hidden_field( string $field_name ) {
			$attributes = $this->get_block_attributes();

			if ( ! isset( $attributes['hiddenFields'] ) ) {
				return false;
			}

			$attributes = $this->get_block_attributes();

			if ( in_array( $field_name, $attributes['hiddenFields'], true ) ) {
				return true;
			}

			return false;
		}

		public function cleanup() {
			$this->block            = null;
			$this->block_attributes = array();
			$this->block_name       = null;
			$this->enqueued_scripts = false;
		}
	}
}
