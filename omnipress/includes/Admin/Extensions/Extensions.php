<?php
declare(strict_types=1);

namespace Omnipress\Admin\Extensions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( Extensions::class ) ) {
	/**
	 * This class is responsible for handling the extensions.
	 *
	 * @author WPOmnipress
	 *
	 * @since 1.6.0
	 */
	abstract class Extensions {
		const PLUGIN_SLUG = 'omnipress/omnipress';
		const OPTION_NAME = 'op_extension';

		protected int $extension_priority = 10;

		const PREMIUM_EXTENSIONS = array(
			array(
				'label'       => 'Custom Code',
				'slug'        => 'custom-code',
				'description' => 'Add custom code to your website.',
			),
			array(
				'label'       => 'Taxonomy Image',
				'slug'        => 'taxonomy-image',
				'description' => 'Enable taxonomies thumbnail supports.',
			),
			array(
				'label'       => 'Custom Fields',
				'slug'        => 'custom-fields',
				'description' => 'Add custom fields to your website.',
			),
			array(
				'label'       => 'Preloader & Transitions',
				'slug'        => 'preloader-transition',
				'description' => 'Add a preloader and transitions to your website.',
			),
		);

		/**
		 * Tooltip.
		 */
		public function render_info_icon_with_help_text( string $text ): string {
			ob_start();
			?>
			<div class="op-relative op-inline-block op-group">
				<!-- Info Icon -->
				<svg class="op-w-5 op-h-5 op-text-gray-500 op-cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
				</svg>
				<!-- Help Text (Tooltip) -->
				<div class="op-absolute op-hidden op-min-w-[200px] op-w-auto op-max-w-[500px] group-hover:op-block op-bg-black op-text-white op-text-[11px] op-rounded-md op-px-2 op-py-1 op-z-10 op--mt-2 op-left-1/2 op--translate-x-1/2">
				<?php echo esc_html__( $text, OMNIPRESS_I18N ); ?>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}

		/**
		 * Constructor.
		 */
		public function __construct() {
			if ( ! is_admin() ) {
				return;
			}

			if ( ! $this->is_enabled() ) {
				return;
			}

			/* Add each extension's setting fields. */
			add_filter( 'omnipress_extension_setting_fields', array( $this, 'get_input_fields' ) );

			/* Add Premium Extensions. */
			add_action( 'admin_init', array( $this, 'add_premium_extensions' ) );

			/* Register settings Fields. */
			add_action( 'omnipress_extensions_' . $this->get_menu_slug(), array( $this, 'render_setting' ) );
			add_action( 'omnipress_render_extensions_form_field_' . $this->get_menu_slug(), array( $this, 'render_form_fields' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			/* Add taxonomy image setting menu. */
			add_filter(
				'omnipress_extensions_menus',
				function ( $prev_menus ) {
					$prev_menus[] = array(
						'slug'  => $this->get_menu_slug(),
						'label' => $this->get_menu_label(),
					);

					return $prev_menus;
				}
			);
		}

		public function add_premium_extensions() {

			if ( defined( 'OMNIPRESS_PRO_EXTENSIONS' ) ) {
				return;
			}

			$extensions_menus = apply_filters( 'omnipress_extensions_menus', array() );

			foreach ( static::PREMIUM_EXTENSIONS as $details ) {
				if ( ! in_array( $details['slug'], array_column( $extensions_menus, 'slug' ), true ) ) {
					add_filter(
						'omnipress_extensions_menus',
						function ( $prev_menus ) use ( $details ) {
							$prev_menus[] = array(
								'slug'  => $details['slug'],
								'label' => $details['label'],
							);
							return $prev_menus;
						}
					);
					add_action(
						'omnipress_extensions_' . $details['slug'],
						function () use ( $details ) {
							$this->render_premium_card( $details );
						}
					);
				}
			}
		}

		public function render_premium_card( array $details ): void {
			?>
				<div class="op-mt-2 op-bg-white op-shadow-sm op-rounded-lg op-p-6 op-border op-border-gray-200 op-flex op-items-center op-gap-4 op-transition op-duration-200 op-hover:shadow-md">
					<!-- Icon/Visual Element -->
					<!-- Content -->
					<div class="op-flex-1">
						<div class="op-flex-shrink-0 op-pl-4">
							<?php include OMNIPRESS_PATH . 'assets/images/omnipress-mobile-logo.svg'; ?>
						</div>
						<h3 class="op-text-lg op-font-semibold op-text-gray-800 op-my-1">Unlock with Pro</h3>
						<p class="op-mt-1 op-text-sm op-text-gray-600"></p>
						<ul class="op-mt-1 op-space-y-1 op-text-sm op-text-gray-700">
							<li class="op-flex op-items-center op-gap-2">
								<?php if ( isset( $details['label'] ) ) : ?>
									<svg class="op-w-4 op-h-4 op-text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
									</svg>
									<?php echo esc_html__( $details['label'], OMNIPRESS_I18N ); ?>
								<?php endif; ?>
							</li>
							<li class="op-flex op-items-center op-gap-2">
								<?php if ( isset( $details['description'] ) ) : ?>
									<svg class="op-w-4 op-h-4 op-text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
									</svg>
									<?php echo esc_html__( $details['description'], OMNIPRESS_I18N ); ?>
								<?php endif; ?>
							</li>
						</ul>
					</div>
					<!-- CTA Button -->
					<div>
						<a
							target="_blank"
							href="https://omnipressteam.com/pricing?utm_campaign=omnipress-extensions"
							class="op-bg-primary op-text-white op-font-medium op-text-sm op-px-4 op-py-2 op-rounded-lg hover:op-bg-blue-700 hover:op-text-white op-transition op-duration-200 op-no-underline"
						>Upgrade Now</a>
					</div>
				</div>
			<?php
		}

		public function enqueue_admin_assets() {
			wp_enqueue_media();
			wp_enqueue_style( 'omnipress-admin-css' );
			wp_enqueue_script( 'omnipress-admin-extensions-js', OMNIPRESS_URL . 'build/js/admin/extensions.js', array( 'wp-api-fetch' ), OMNIPRESS_VERSION, true );
			wp_localize_script(
				'omnipress-admin-extensions-js',
				'_omnipress',
				apply_filters( 'omnipress_localize_admin_script', array() )
			);
		}

		/**
		 * Saved the current extension's input fields with it's name and type. To Sanitization field value and saved securely into the database.
		 *
		 * @param array $prev_values Other Extension's fields.
		 *
		 * @return array
		 */
		abstract public function get_input_fields( array $prev_values ): array;

		public static function get_settings( $default_value = array() ) {
			return get_option(
				static::OPTION_NAME,
				$default_value
			);
		}

		/**
		 * Check is extension is enabled or not.
		 */
		abstract protected function is_enabled(): bool;

		/**
		 * Get menu slug.
		 */
		abstract public function get_menu_slug(): string;

		/**
		 * Get menu label. Which shows in the extensions menu.
		 */
		abstract public function get_menu_label(): string;

		/**
		 * Register settings fields. To handles the extension settings.
		 */
		abstract public function render_setting(): void;

		/**
		 * Render extensions settings related form's  fields.
		 *
		 * @return void
		 */
		abstract public function render_form_fields(): void;
	}
}

?>
