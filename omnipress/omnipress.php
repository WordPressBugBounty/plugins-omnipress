<?php
/**
 * Plugin Name: Omnipress
 * Description: Omnipress is a ready-made WordPress Design Blocks, similar to the Gutenberg WordPress block editor, that takes a holistic approach to changing your complete site.
 * Author: omnipressteam
 * Author URI: https://omnipressteam.com/
 * Version: 1.5.5
 * Text Domain: omnipress
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Omnipress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Omnipress {

	/**
	 * Plugin version.
	 */
	const VERSION = '1.5.5';

	/**
	 * Singleton instance.
	 */
	private static $instance = null;

	/**
	 * Get singleton instance.
	 *
	 * @return Omnipress
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			self::$instance->setup_constants();
			self::$instance->includes();
			self::$instance->init_hooks();
		}

		return self::$instance;
	}

	/**
	 * Setup plugin constants.
	 */
	private function setup_constants() {
		define( 'OMNIPRESS_VERSION', self::VERSION );
		define( 'OMNIPRESS_FILE', __FILE__ );
		define( 'OMNIPRESS_PATH', trailingslashit( plugin_dir_path( OMNIPRESS_FILE ) ) );

		define( 'OMNIPRESS_TEMPLATES_PATH', trailingslashit( OMNIPRESS_PATH . 'templates' ) );

		define( 'OMNIPRESS_BLOCK_STYLES_PATH', trailingslashit( wp_upload_dir()['basedir'] . '/omnipress/css/' ) );
		define( 'OMNIPRESS_BLOCK_STYLES_URL', trailingslashit( wp_upload_dir()['baseurl'] . '/omnipress/css/' ) );

		define( 'OMNIPRESS_URL', trailingslashit( plugin_dir_url( OMNIPRESS_FILE ) ) );

		define( 'OMNIPRESS_POST_EDIT_TIME', 'op_post_edit_time' );

		define( 'OMNIPRESS_PREFIX', 'opafg' ); // omnipress addons for gutenberg
		define( 'OMNIPRESS_I18', 'omnipress' );
		define( 'OMNIPRESS_BLOCK_PREFIX', 'omnipress' );

		define( 'OMNIPRESS_BLOCK_EDIT_CAPABILITY', 'omnipress_edit_block' );
	}

	/**
	 * Include required files.
	 */
	private function includes() {
		require_once OMNIPRESS_PATH . 'vendor/autoload.php';
	}

	/**
	 * Initialize hooks.
	 */
	private function init_hooks() {
		add_action( 'plugins_loaded', array( $this, 'on_plugins_loaded' ) );
		add_action( 'admin_init', array( $this, 'redirect_to_settings_page' ) );
		add_action( 'init', array( $this, 'load_textdomain' ) );
		register_activation_hook( __FILE__, array( $this, 'on_activation' ) );
	}

	/**
	 * Plugins loaded hook.
	 */
	public function on_plugins_loaded() {
		do_action( 'omnipress_init' );
		Omnipress\Init::instance();
	}

	/**
	 * Load plugin textdomain.
	 */
	public function load_textdomain() {
		do_action( 'omnipress_loaded', self::$instance );

		load_plugin_textdomain( 'omnipress', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


		load_plugin_textdomain( 'omnipress', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	public function create_database() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'op_block_settings';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            block_name VARCHAR(255) NOT NULL,
            styles_attributes LONGTEXT NULL,
            styles_variations LONGTEXT NULL,
            selectors VARCHAR(255)  NULL,
            PRIMARY KEY (id),
            UNIQUE KEY block_name (block_name)
        ) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	/**
	 * Activation hook.
	 */
	public function on_activation() {
		$this->create_database(); // create databse for existing block's details and setting.
		set_transient( 'omnipress_activation_redirect', true, 30 );
		set_transient( 'omnipress_recommended_plugins_notice', true, 30 );
	}

	/**
	 * Redirect to settings page on activation.
	 */
	public function redirect_to_settings_page() {
		if ( get_transient( 'omnipress_activation_redirect' ) ) {
			delete_transient( 'omnipress_activation_redirect' );

			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}

			$settings_page_url = admin_url( 'admin.php?page=omnipress' );
			wp_safe_redirect( $settings_page_url );
			exit;
		}
	}
}

// Initialize the plugin.
Omnipress::instance();
