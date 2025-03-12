<?php
/**
 * Admin settings page for selecting taxonomies for image feature and extensions menu.
 *
 * @package Omnipress\Admin
 */

namespace Omnipress\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'Taxonomy_Settings' ) ) {
	return;
}
/**
 * Class Taxonomy_Settings
 *
 * @package Omnipress\Admin
 * @since 1.6.0
 *
 * @author Omnipressteam
 * */
class Taxonomy_Settings {
	const OPTION_NAME = 'taxonomy_image_enabled_taxonomies';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	/**
	 * Add admin menu and submenu pages.
	 *
	 * @return void
	 */
	public function add_admin_menu() {
		add_submenu_page(
			'omnipress',
			__( 'Extensions', 'omnipress' ),
			__( 'Extensions', 'omnipress' ),
			'manage_options',
			'omnipress-extensions',
			array( $this, 'render_extensions_page' )
		);
	}

	/**
	 * Register settings and fields.
	 *
	 * @return void
	 */
	public function register_settings() {
		register_setting(
			'taxonomy_image_settings_group',
			'taxonomy_image_enabled_taxonomies',
			array(
				'sanitize_callback' => array( $this, 'sanitize_taxonomies' ),
			)
		);

		add_settings_section(
			'taxonomy_image_section',
			__( 'Select Taxonomies for Image Feature', 'omnipress' ),
			array( $this, 'section_callback' ),
			'taxonomy-image-settings'
		);

		add_settings_field(
			'enabled_taxonomies',
			__( 'Enable Image for Taxonomies', 'omnipress' ),
			array( $this, 'taxonomies_field_callback' ),
			'taxonomy-image-settings',
			'taxonomy_image_section'
		);
	}

	/**
	 * Enqueue admin scripts and styles.
	 *
	 * @param string $hook The current admin page hook.
	 * @return void
	 */
	public function enqueue_admin_assets( $hook ) {
		if ( 'omnipress_page_omnipress-extensions' === $hook ) {
			wp_enqueue_style( 'myplugin-tailwind-css', 'https://cdn.tailwindcss.com', array(), '3.3.0' );
			// Custom styles to prefix Tailwind classes with 'op-'
			wp_add_inline_style(
				'myplugin-tailwind-css',
				'
                .op-container { max-width: 1200px; margin: 0 auto; padding: 1rem; }
                .op-nav { @apply flex space-x-4 border-b; }
                .op-nav-item { @apply px-4 py-2 text-gray-600 hover:text-gray-900; }
                .op-nav-item.active { @apply border-b-2 border-blue-500 text-blue-600; }
                .op-tab-content { @apply mt-6; }
            '
			);
		}
	}

	/**
	 * Render the Omnipress main page (placeholder).
	 *
	 * @return void
	 */
	public function render_omnipress_page() {
		echo '<div class="wrap"><h1>' . esc_html__( 'Omnipress Dashboard', 'omnipress' ) . '</h1></div>';
	}

	/**
	 * Render the Extensions page with navigation menu.
	 *
	 * @return void
	 */
	public function render_extensions_page() {
		$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'taxonomy-image';

		?>
		<div class="wrap op-container">
			<h1><?php esc_html_e( 'Omnipress Extensions', 'omnipress' ); ?></h1>

			<!-- Navigation Menu -->
			<div class="op-nav">
				<a href="?page=omnipress-extensions&tab=taxonomy-image" class="op-nav-item <?php echo $active_tab === 'taxonomy-image' ? 'active' : ''; ?>">
				<?php esc_html_e( 'Taxonomy Image', 'omnipress' ); ?>
				</a>
				<a href="?page=omnipress-extensions&tab=coming-soon" class="op-nav-item <?php echo $active_tab === 'coming-soon' ? 'active' : ''; ?>">
				<?php esc_html_e( 'Coming Soon', 'omnipress' ); ?>
				</a>
				<a href="?page=omnipress-extensions&tab=other-settings" class="op-nav-item <?php echo $active_tab === 'other-settings' ? 'active' : ''; ?>">
				<?php esc_html_e( 'Other Settings', 'omnipress' ); ?>
				</a>
			</div>

			<!-- Tab Content -->
			<div class="op-tab-content">
			<?php
			switch ( $active_tab ) {
				case 'taxonomy-image':
					settings_errors();
					?>
						<form method="post" action="options.php">
						<?php
						settings_fields( 'taxonomy_image_settings_group' );
						do_settings_sections( 'taxonomy-image-settings' );
						submit_button();
						?>
						</form>
						<?php
					break;

				case 'coming-soon':
					echo '<h2>' . esc_html__( 'Coming Soon Settings', 'omnipress' ) . '</h2>';
					echo '<p>' . esc_html__( 'Configure coming soon page settings here.', 'omnipress' ) . '</p>';
					// Add coming soon settings form or content here
					break;

				case 'other-settings':
					echo '<h2>' . esc_html__( 'Other Settings', 'omnipress' ) . '</h2>';
					echo '<p>' . esc_html__( 'Additional settings can be added here.', 'omnipress' ) . '</p>';
					// Add other settings form or content here
					break;

				default:
					echo '<p>' . esc_html__( 'Select a tab to view its content.', 'omnipress' ) . '</p>';
					break;
			}
			?>
			</div>
		</div>
			<?php
	}

	/**
	 * Sanitize the taxonomies input.
	 *
	 * @param array $input The input array.
	 * @return array Sanitized array.
	 */
	public function sanitize_taxonomies( $input ) {
		$valid_taxonomies = array_keys( get_taxonomies( array(), 'objects' ) );
		$sanitized        = array();

		if ( is_array( $input ) ) {
			foreach ( $input as $taxonomy ) {
				if ( in_array( $taxonomy, $valid_taxonomies, true ) ) {
					$sanitized[] = sanitize_text_field( $taxonomy );
				}
			}
		}

		return $sanitized;
	}

	/**
	 * Section callback.
	 *
	 * @return void
	 */
	public function section_callback() {
		esc_html_e( 'Select the taxonomies where you want to enable the featured image feature.', 'omnipress' );
	}

	/**
	 * Render the taxonomies field.
	 *
	 * @return void
	 */
	public function taxonomies_field_callback() {
		$taxonomies          = get_taxonomies( array(), 'objects' );
		$selected_taxonomies = get_option( 'taxonomy_image_enabled_taxonomies', array() );
		?>
		<fieldset>
		<?php foreach ( $taxonomies as $taxonomy ) : ?>
				<label>
					<input
						type="checkbox"
						name="taxonomy_image_enabled_taxonomies[]"
						value="<?php echo esc_attr( $taxonomy->name ); ?>"
						<?php checked( in_array( $taxonomy->name, $selected_taxonomies, true ) ); ?>
					/>
					<?php echo esc_html( $taxonomy->labels->singular_name ); ?> (<?php echo esc_html( $taxonomy->name ); ?>)
				</label><br>
			<?php endforeach; ?>
		</fieldset>
		<?php
	}
}
new Taxonomy_Settings();
