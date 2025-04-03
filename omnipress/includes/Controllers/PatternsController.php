<?php


namespace Omnipress\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( PatternController::class ) ) {
	/**
	 * Class PatternController
	 *
	 * Handles the registration of block patterns and categories for a WordPress plugin.
	 *
	 * Methods:
	 * - register_patterns(): Registers block patterns by reading PHP files from a specified directory,
	 *   extracting metadata, and using it to register each pattern.
	 * - get_pattern_metadata($file): Extracts metadata from comments within a PHP file.
	 * - init(): Initializes the PatternController by setting up WordPress actions to register patterns
	 *   and categories.
	 * - register_categories(): Registers a custom block pattern category.
	 *
	 * @package Omnipress\Controllers
	 * @since 1.6.0
	 */
	class PatternController {
		public function register_patterns() {
			$pattern_dir = plugin_dir_path( __DIR__ ) . '../views/patterns/';
			$files       = glob( $pattern_dir . '*.php' );

			foreach ( $files as $file ) {
				$pattern_content = file_get_contents( $file );
				$slug            = basename( $file, '.php' );

				// Metadata extract from the comments in the PHP file.
				$metadata    = $this->get_pattern_metadata( $file );
				$title       = $metadata['Title'] ?? ucfirst( str_replace( '-', ' ', $slug ) );
				$description = $metadata['Description'] ?? '';
				$categories  = $metadata['Categories'] ?? array( 'omnipress' );

				register_block_pattern(
					"omnipress/{$slug}",
					array(
						'title'       => $title,
						'description' => $description,
						'content'     => $pattern_content,
						'categories'  => $categories,
					)
				);
			}
		}

		private function get_pattern_metadata( $file ) {
			$content  = file_get_contents( $file );
			$metadata = array();
			if ( preg_match( '/\/\*\*(.*?)\*\//s', $content, $match ) ) {
				$lines = explode( "\n", $match[1] );
				foreach ( $lines as $line ) {
					if ( preg_match( '/^\s*\*\s*([^:]+):\s*(.+)$/', $line, $meta ) ) {
						$metadata[ trim( $meta[1] ) ] = trim( $meta[2] );
					}
				}
			}
			return $metadata;
		}

		public static function init() {
			$instance = new self();
			add_action( 'init', array( $instance, 'register_patterns' ) );
			add_action( 'init', array( $instance, 'register_categories' ) );
		}

		public function register_categories() {
			register_block_pattern_category(
				'omnipress-patterns',
				array(
					'label' => __( 'Omnipress Patterns', 'omnipress' ),
				)
			);
		}
	}
}
