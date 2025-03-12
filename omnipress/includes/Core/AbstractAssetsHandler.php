<?php

declare(strict_types=1);

namespace Omnipress\Core;

( defined( 'ABSPATH' ) ) || exit;


/**
 * This class is responsible for handling the assets related to the plugin.
 *
 * @since 1.5.5
 */
if ( ! class_exists( 'AbstractAssetsHandler' ) ) {
	abstract class AbstractAssetsHandler {

		/**
		 * @var string $build_assets_url The path to the asset's directory.
		 */
		protected string $build_assets_url;

		/**
		 * @var string $op_version The path to the asset's directory.
		 */
		protected string $op_version;

		/**
		 * Constructor.
		 *
		 * @param string $build_assets_url The path to the asset's directory.
		 * @param string $op_version The path to the asset's directory.
		 */
		public function __construct( string $build_assets_url, string $op_version ) {
			$this->build_assets_url = $build_assets_url;
			$this->op_version       = $op_version;

			add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
			add_action( 'enqueue_block_editor_assets', array( $this, 'register_and_enqueue_block_editor_scripts' ) );
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			// assets optimization.
			// add_filter( 'script_loader_tag', array( $this, 'defer_specific_registered_scripts' ), 10, 3 );

			add_filter(
				'style_loader_tag',
				function ( $html, $handle ) {
					if ( is_user_logged_in() ) {
						return $html;
					}

					$style_handles = array(
						'omipress/blocks/styles',
						'fontawesome',
						'woocommerce-general',
					);

					if ( in_array( $handle, $style_handles, true ) ) {
						$html = preg_replace(
							"/<link rel='stylesheet'/",
							'<link rel="preload" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"',
							$html,
							1 // 1 ensures we only replace the first occurrence
						);
					}

					return $html;
				},
				10,
				2
			);
		}

		public function defer_specific_registered_scripts( $url, $handle, $src ) {

			if ( strpos( $url, 'gsap' ) || strpos( $url, 'omnipress-slider-script-js' ) ) {
				return str_replace( '<script src', '<script defer src', $url );
			}
			return $url;
		}

		/**
		 * Register and enqueue scripts for editors only.
		 *
		 * @return void
		 */
		abstract public function register_and_enqueue_block_editor_scripts(): void;

		/**
		 * Enqueue frontend scripts and styles related blocks.
		 *
		 * @return void
		 */
		abstract public function enqueue_scripts(): void;

		/**
		 * Register scripts, module scripts, and styles for blocks.
		 *
		 * @return void
		 */
		abstract public function register_scripts(): void;

		/**
		 * Enqueue frontend and editor scripts and styles related blocks.
		 *
		 * @return void
		 */
		abstract public function enqueue_block_assets(): void;

		/**
		 * Register only Module scripts which related to the interactivity api.
		 *
		 * @return void
		 */
		public function register_script_module( string $handle, string $relative_path, $deps = array(), $version = null ) {

			$dependencies = array_merge(
				$deps,
				array(
					array(
						'id'     => '@wordpress/interactivity',
						'import' => 'dynamic',
					),
					array(
						'id'     => '@wordpress/interactivity-router',
						'import' => 'dynamic',
					),
				)
			);

			if ( is_null( $version ) ) {
				$version = $this->op_version;
			}

			wp_register_script_module(
				$handle,
				"{$this->build_assets_url}block-interactivity/$relative_path.js",
				$dependencies,
				$version
			);
		}

		/**
		 * Get the path to the asset's directory.
		 *
		 * @param string $file_name name of the script or style file.
		 *
		 * @param string $file_type type of the file. (js or css).
		 *
		 * @return string
		 */
		public function get_build_assets_url( string $file_name, string $file_type ): string {
			return $this->build_assets_url . $file_name . '.' . $file_type;
		}

		/**
		 * Registers scripts or styles for the frontend based on file type.
		 *
		 * This method registers either a script or a style for use on the frontend of the website.
		 * It distinguishes between JavaScript (.js) and CSS (.css) files to use the appropriate WordPress
		 * function for registration. It also uses a default version if none is provided and decides
		 * whether to place scripts in the footer.
		 *
		 * @param string      $handle The name of the script or style handle.
		 * @param string      $relative_path The relative path from the asset base URL to the file.
		 * @param string      $file_type The type of the file to register ('js' or 'css').
		 * @param array       $deps An array of dependencies for the script or style.
		 * @param string|null $version The version of the script or style. If null, uses the plugin's version.
		 * @param bool        $footer Whether to enqueue the script in the footer. Only applies to scripts.
		 *
		 * @return void
		 *
		 * @throws \InvalidArgumentException If the file type is not 'js' or 'css'.
		 */
		public function register_script( string $handle, string $relative_path, string $file_type, array $deps = array(), ?string $version = null, bool $footer = true ): void {

			switch ( $file_type ) {
				case 'js':
					wp_register_script(
						$handle,
						"{$this->build_assets_url}{$relative_path}",
						$deps,
						$version,
						$footer
					);
					break;
				case 'css':
					wp_register_style(
						$handle,
						"{$this->build_assets_url}{$relative_path}",
						$deps,
						$version
					);
					break;
				default:
					throw new \InvalidArgumentException( esc_textarea( "Unsupported file type: {$file_type}. Must be 'js' or 'css'." ) );
			}
		}
	}
}
