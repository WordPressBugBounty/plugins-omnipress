<?php
/**
 * Main file for initializing admin.
 *
 * @package Omnipress\Admin
 */

namespace Omnipress\Admin;

defined( 'ABSPATH' ) || exit;

use Omnipress\Controllers\SettingsController;
use Omnipress\Helpers;
use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Models\BlocksSettingsModel;
use Omnipress\Transient;

/**
 * Main admin class to initialize our admin functionalities.
 *
 * @since 1.1.0
 */
class Init {

	/**
	 * Menu slug.
	 *
	 * @var string
	 */
	public $menu_slug = 'omnipress';


	/**
	 * Menu title.
	 *
	 * @var string
	 */
	public $menu_title = 'Omnipress';


	/**
	 * Capability
	 *
	 * @var string
	 */
	public $capability = 'manage_options';


	/**
	 * Menu icon.
	 *
	 * @var string
	 */
	public $menu_icon = 'dashicons-admin-generic';

	/**
	 * Setting model
	 *
	 * @var BlocksSettingsModel|null
	 */
	private $block_setting_model;

	/**
	 * Blocks settings model.
	 *
	 * @var BlocksSettingsModel
	 * @since 1.1.0
	 */
	public $blocks_settings_model;

	/**
	 * Settings controller.
	 *
	 * @var SettingsController
	 */
	private $settings_controller;


	/**
	 * Current object instance.
	 *
	 * @var Init
	 */
	protected static $instance;

	/**
	 * Current object instance.
	 *
	 * @since 1.1.0
	 *
	 * @static
	 *
	 * @return Init
	 */
	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Define admin related constants .
	 *
	 * @since 1.1.0
	 *
	 * @static
	 *
	 * @return void
	 */
	public function define_admin_constants() {
		if ( ! defined( 'OP_ADMIN_PATH' ) ) {
			define( 'OP_ADMIN_PATH', OMNIPRESS_PATH . 'includes/Admin/' );
		}

		if ( ! defined( 'OP_ADMIN_URL' ) ) {
			define( 'OP_ADMIN_URL', OMNIPRESS_URL . 'includes/Admin/' );
		}
	}

	/**
	 * Constructor.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action(
			'in_plugin_update_message-' . plugin_basename( OMNIPRESS_FILE ),
			function ( $plugin_data ) {
				$this->version_update_warning( OMNIPRESS_VERSION, $plugin_data['new_version'] );
			}
		);

		$this->define_admin_constants();// Define Admin related constants.
		$this->block_setting_model = new BlocksSettingsModel();
		$this->settings_controller = new SettingsController( $this->block_setting_model );

		$this->menu_icon = 'data:image/svg+xml;base64,' . base64_encode( file_get_contents( OMNIPRESS_PATH . 'assets/images/omnipress-dashboard-menu-icon.svg' ) );

		add_action( 'admin_menu', array( $this, 'setup_menu' ) );

		if ( ( ! Helpers::is_localhost() ) && ( ! Helpers::is_test_site() ) ) {
			add_action( 'init', array( $this, 'handle_usage_stats' ) );
			add_action( 'admin_notices', array( $this, 'consent_notice' ) );
		}

		add_action( 'admin_footer', array( $this, 'add_app_root' ) );

		add_action( 'admin_init', array( $this, 'force_cold_boot' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'update_demo_styles' ) );
		add_action( 'save_post', array( $this, 'save_selected_fonts' ) );

		add_action( 'admin_notices', array( $this, 'admin_notice' ) );

		// post handler.
		add_action( 'admin_post_op_notice_dismissal', array( $this, 'notice_dismiss_handler' ) );
		/* Extensions */
		\Omnipress\Admin\Extensions\Init::init();

		/* LOCALIZE PLUGINS SETTINGS*/
		add_filter(
			'omnipress_localize_admin_script',
			static function ( $prev_val ) {
				return array_merge(
					$prev_val,
					array(
						'nonce'            => wp_create_nonce( '_omnipress_block_nonce' ),
						'omnipressVersion' => OMNIPRESS_VERSION,
						'isDevmode'        => ( 'development' === wp_get_environment_type() || 'local' === wp_get_environment_type() ) ? true : false,
						'urls'             => array(
							'home'        => home_url(),
							'wpDashboard' => admin_url(),
							'omnipress'   => OMNIPRESS_URL,
							'ajax_url'    => admin_url( 'admin-ajax.php' ),
						),
					)
				);
			},
		);
	}


	/**
	 * Notice dismissal handler.
	 *
	 * @return void
	 */
	public function notice_dismiss_handler() {
		delete_transient( 'omnipress_recommended_plugins_notice' );
		wp_safe_redirect( admin_url() );
	}


	/**
	 * Register menus and submenus
	 *
	 * @since  1.1.2
	 *
	 * @return void
	 */
	public function setup_menu() {
		$this->settings_controller->register_menu_page()->register_submenu_page();
	}

	/**
	 * Register plugin's notices
	 *
	 * @since 1.1.2
	 *
	 * @return void
	 */
	public function admin_notice() {
		$recommended_plugins_notices = $this->recommended_plugins_notice();

		echo $recommended_plugins_notices; //phpcs:ignore
	}

	/**
	 * Adds the required html element for library app modal in post/page editor.
	 *
	 * @return void
	 */
	public function add_app_root() {
		?>
		<div id="omnipress"></div>
		<?php
	}


	/**
	 * Get current demo's global styles.
	 *
	 * @param object $theme_json previous theme gobal styles.
	 *
	 * @since 1.1.2
	 *
	 * @return object
	 */
	public function get_demo_global_styles( $theme_json ) {
		$global_style_url    = \get_option( 'demo_styles_link' );
		$styles_request      = wp_remote_get( $global_style_url );
		$styles_request_body = wp_remote_retrieve_body( $styles_request );

		return $theme_json->update_with( json_decode( $styles_request_body, true ) );
	}

	/**
	 * Update Demo styles.
	 *
	 * @return void
	 */
	public function update_demo_styles() {
		if ( wp_theme_has_theme_json() ) {
			add_filter(
				'wp_theme_json_data_theme',
				function ( $theme_data ) {
					return $this->get_demo_global_styles( $theme_data );
				}
			);
		}
	}


	/**
	 * Saved that fonts which used omnipress blocks
	 *
	 * @param int $post_id post id.
	 *
	 * @return bool|int
	 */
	public function save_selected_fonts( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		Helpers::get_blocks_attributes( parse_blocks( get_the_content( null, false, $post_id ) ), $attrs );

		$fonts = Helpers::extract_fonts_from_attrs( $attrs );

		$post_type = get_post_type( $post_id );

		switch ( $post_type ) {
			case 'wp_template':
			case 'wp_template_part':
				return update_option( "omnipress_global_{$post_type}_fonts", $fonts );

			default:
				return update_post_meta( $post_id, 'omnipress_post_type_fonts', $fonts );
		}
	}

	/**
	 * Handle the "force_cold_boot" request.
	 *
	 * @return void
	 */
	public function force_cold_boot() {
		if ( empty( $_GET['force_cold_boot'] ) ) {
			return;
		}

		if ( empty( $_GET['op_nonce'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['op_nonce'] ) ), '_omnipress_nonce' ) ) {
			return;
		}

		do_action( 'omnipress_doing_force_cold_boot' );

		$transient = new Transient();
		$transient->delete_all();

		wp_safe_redirect( remove_query_arg( array( 'force_cold_boot', 'op_nonce' ) ) );
		exit;
	}

	/**
	 * Enqueue admin scripts and styles.
	 *
	 * @return void
	 */
	public function enqueue_scripts( $hook_prefix ) {
		wp_register_style( 'omnipress-admin-css', OMNIPRESS_URL . 'build/css/admin.css', array( 'wp-components' ), OMNIPRESS_VERSION, 'all' );

		$editor_assets['dependencies'][] = 'omnipress-admin-script';
		switch ( $hook_prefix ) {
			case 'post.php':
			case 'post-new.php':
			case 'site-editor.php':
			case 'toplevel_page_omnipress':
			case 'omnipress_page_omnipress-extensions':
				break;
			default:
				return;
		}

		$admin_assets = include OMNIPRESS_PATH . 'build/admin/admin.asset.php';
		do_action( 'omnipress_before_admin_scripts', $hook_prefix );

		$current_user = get_userdata( get_current_user_id() );

		$status['is_active'] = false;

		if ( class_exists( 'OmnipressPro\Edd\Edd' ) ) {
			$status = get_option( \OmnipressPro\Edd\Edd::LIC_STATUS_METAKEY, array( 'is_active' => false ) );
		}

		$environment    = wp_get_environment_type();
		$block_settings = new BlocksSettingsModel();

		if ( $current_user ) {
			$user = array(
				'firstName' => $current_user ? $current_user->first_name : '',
				'username'  => $current_user ? $current_user->user_login : '',
				'avatarURL' => $current_user ? get_avatar_url( $current_user->ID ) : '',
			);
		}

		add_filter(
			'omnipress_localize_admin_script',
			static function ( $localize ) use ( $status, $hook_prefix, $block_settings, $user ) {
				return array_merge(
					$localize,
					array(
						'isOmnipressPage' => 'toplevel_page_omnipress' === $hook_prefix,
						'status'          => $status['is_active'],
						'settings'        => array(
							'disabledBlocks' => $block_settings->get_disabled_blocks(),
						),
						'user'            => $user,
					)
				);
			}
		);

		wp_register_script( 'omnipress-local-vars', null, array(), OMNIPRESS_VERSION, true );
		wp_localize_script(
			'omnipress-local-vars',
			'_omnipress',
			apply_filters( 'omnipress_localize_admin_script', array() )
		);

		wp_enqueue_script( 'omnipress-local-vars' );

		wp_enqueue_script( 'omnipress-admin-script', OMNIPRESS_URL . 'build/admin/admin.js', $admin_assets['dependencies'], $admin_assets['version'], true );

		do_action( 'omnipress_after_admin_scripts', $hook_prefix );
	}

	/**
	 * Returns usage stats class object.
	 */
	private function get_stats_object() {
		if ( ! class_exists( 'EverestThemes_Stats' ) ) {
			require_once OMNIPRESS_PATH . 'includes/Libraries/stats/class-stats.php';
		}

		return \EverestThemes_Stats::get_instance( OMNIPRESS_FILE, 'https://ps.w.org/omnipress/assets/icon-128X128.png' );
	}

	public function handle_usage_stats() {

		$stats = $this->get_stats_object();
		if ( ! empty( $_POST['omnipress_consent_optin'] ) ) {
			if ( wp_verify_nonce( $_POST['omnipress_consent_optin'], 'omnipress_consent_optin' ) ) {
				update_option( 'omnipress_consent_optin', 'yes' );
			}
		}

		if ( ! empty( $_POST['omnipress_consent_skip'] ) ) {
			if ( wp_verify_nonce( $_POST['omnipress_consent_skip'], 'omnipress_consent_skip' ) ) {
				set_transient( 'omnipress_consent_skip', 'yes', MONTH_IN_SECONDS );
			}
		}

		if ( 'yes' === get_option( 'omnipress_consent_optin' ) ) {
			$stats->init();
		}
	}

	/**
	 * All required or Recommended Plugins to functions properly.
	 *
	 * @return array
	 */
	public function recommended_plugins_notice() {
		$can_we_show_admin_notices = get_transient( 'omnipress_recommended_plugins_notice' );

		if ( ! $can_we_show_admin_notices ) {
			return ' ';
		}

		$recommended_plugins = apply_filters(
			'omnipress_recommended_plugins',
			array()
		);

		$recommended_plugins_markup = '';

		if ( GeneralHelpers::is_valid_array( $recommended_plugins ) ) {
			$recommended_plugins_markup = '<div class="notice notice-warning"> <h3>' . esc_html__( 'Omnipress plugin recommend following plugins', 'omnipress' ) . '</h3><ul style="display:grid;gap:20px;place-items:start;">';

			foreach ( $recommended_plugins as $path => $recommended_plugin ) {
				$recommended_plugins_markup .= $this->recommended_plugins_with_install_link( $path, $recommended_plugin['slug'], $recommended_plugin['title'], $recommended_plugin['message'] );
			}

			$recommended_plugins_markup .= $this->dismiss_admin_notice();

			$recommended_plugins_markup .= '</ul></div>';
		}

		return $recommended_plugins_markup;
	}

	public function recommended_plugins_with_install_link( $plugin_path, $plugin_slug, $title = '', $message = '' ) {
		$plugin_status = Helpers::get_plugin_status( $plugin_path );
		$install_url   = wp_nonce_url( self_admin_url( "update.php?action=install-plugin&plugin=$plugin_slug" ), "install-plugin_$plugin_slug" );

		$activate_url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $plugin_path ), 'activate-plugin_' . $plugin_path );

		switch ( $plugin_status ) {
			case 'not-found':
				return '<li><strong>' . $message . '</strong><a style="margin-left:12px" href="' . esc_url( $install_url ) . '" class="button button-primary">' . __( "Install $title", 'omnipress' ) . '</a></li>';

			case 'paused':
				return '<li><strong>' . $message . '</strong><a style="margin-left:12px" href="' . esc_url( $activate_url ) . '" class="button button-primary">' . __( "Activate $title", 'omnipress' ) . '</a></li>';

			default:
				return '';
		}
	}

	/**
	 * Show consent notice.
	 *
	 * @return void
	 */
	public function consent_notice() {
		if ( 'yes' === get_option( 'omnipress_consent_optin' ) || 'yes' === get_transient( 'omnipress_consent_skip' ) ) {
			return;
		}

		include_once OMNIPRESS_PATH . 'templates/admin/notice.php';
	}

	public function dismiss_admin_notice() {
		$notice_dismissal_link = wp_nonce_url( admin_url( 'admin-post.php?action=op_notice_dismissal' ), 'op_admin_notice_dismissal' );

		$dismissal_link = sprintf(
			'<a href="%s" class="button button-secondary">%s</a>',
			esc_url( $notice_dismissal_link ),
			esc_html__( 'Dismiss', 'omnipress' )
		);

		return $dismissal_link;
	}

	public function version_update_message( $plugin_data ) {

		// version update notice hook. `[in_plugin_update_message]`.
	}

	public function version_update_warning( string $current_version, string $new_version ) {
		$current_version_minor_part = explode( '.', $current_version )[1];
		$new_version_minor_part     = explode( '.', $new_version )[1];
		if ( $current_version_minor_part === $new_version_minor_part ) {
			return;
		}
		?>
		<div class="op-update-warning-wrapper">
			<hr />
			<h3>Important: Take a Backup Before Updating!</h3>
			<p>
			We strongly recommend taking a complete backup of your website before proceeding with the plugin update.<br>
			This ensures you can restore your site if anything goes wrong during the update process.
			<hr>
			</p>
			<em>
				For a quick and reliable backup solution,
				you can use the
				<a href="https://wordpress.org/plugins/everest-backup/" target="_blank" rel="noopener noreferrer"><b>Everest Backup plugin</b></a>.
				( It’s easy to use and offers robust backup and restore features.)
			</em>
		</div>
		<?php
	}
}
