<?php
declare(strict_types=1);

namespace Omnipress\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * OptionManager class to handle WordPress options with AJAX.
 *
 * @since 1.6.3
 */
class OptionManager {
	/**
	 * Constructor to initialize AJAX hooks.
	 */
	public function __construct() {
		// AJAX actions for logged-in and non-logged-in users.
		add_action( 'wp_ajax_manage_option', array( $this, 'handle_ajax_request' ) );
		add_action( 'wp_ajax_nopriv_manage_option', array( $this, 'handle_ajax_request' ) );
	}

	/**
	 * Add or update an option.
	 *
	 * @param string $option_name Option name.
	 * @param mixed  $value       Option value.
	 * @return bool True on success, false on failure.
	 */
	public function add_option( $option_name, $value ) {
		if ( empty( $option_name ) ) {
			return false;
		}
		return update_option( $option_name, $value );
	}

	/**
	 * Add or update an option by key.
	 *
	 * @param string $option_name Option name.
	 * @param string $key         Key to update in the option array.
	 * @param mixed  $value       New value for the key.
	 * @return bool True on success, false on failure.
	 */
	public function add_option_by_key( $option_name, $key, $value ): bool {
		$option = $this->get_option( $option_name, false );

		if ( is_array( $option ) ) {
			$option[ $key ] = $value;
			return $this->add_option( $option_name, $option );
		}

		return false;
	}

	/**
	 * Update an existing option.
	 *
	 * @param string $option_name Option name.
	 * @param mixed  $value       New value.
	 * @return bool True on success, false on failure.
	 */
	public function update_option( $option_name, $value ) {
		return $this->add_option( $option_name, $value );
	}

	/**
	 * Get an option value.
	 *
	 * @param string $option_name Option name.
	 * @param mixed  $default     Default value if option doesn't exist.
	 * @return mixed Option value or default.
	 */
	public function get_option( $option_name, $default = false ) {
		if ( empty( $option_name ) ) {
			return $default;
		}
		return get_option( $option_name, $default );
	}

	/**
	 * Get a specific value from an associative array option by key.
	 *
	 * @param string $option_name Option name.
	 * @param string $key         Key to retrieve from the option array.
	 * @param mixed  $default     Default value if key doesn't exist.
	 * @return mixed Value associated with the key or default.
	 */
	public function get_option_by_key( $option_name, $key, $default = false ) {
		if ( empty( $option_name ) || empty( $key ) ) {
			return $default;
		}
		$option = $this->get_option( $option_name, false );
		if ( is_array( $option ) && array_key_exists( $key, $option ) ) {
			return $option[ $key ];
		}
		return $default;
	}

	/**
	 * Delete an option.
	 *
	 * @param string $option_name Option name.
	 * @return bool True on success, false on failure.
	 */
	public function delete_option( $option_name ) {
		if ( empty( $option_name ) ) {
			return false;
		}
		return delete_option( $option_name );
	}

	/**
	 * Handle AJAX requests for managing options.
	 */
	public function handle_ajax_request() {
		// Check nonce for security.
		if ( ! check_ajax_referer( 'option_manager_nonce', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
		}

		// Check user capability.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Insufficient permissions' ) );
		}

		// Get request data.
		$action_type = isset( $_POST['action_type'] ) ? sanitize_text_field( $_POST['action_type'] ) : '';
		$option_name = isset( $_POST['option_name'] ) ? sanitize_key( $_POST['option_name'] ) : '';
		$value       = isset( $_POST['value'] ) ? wp_unslash( $_POST['value'] ) : '';
		$key         = isset( $_POST['key'] ) ? sanitize_key( $_POST['key'] ) : '';

		// Validate inputs.
		if ( empty( $action_type ) || empty( $option_name ) ) {
			wp_send_json_error( array( 'message' => 'Missing required fields' ) );
		}

		$response = array();
		switch ( $action_type ) {
			case 'add':
			case 'update':
				// Sanitize value based on type.
				$value    = is_array( $value ) ? array_map( 'sanitize_text_field', $value ) : sanitize_text_field( $value );
				$result   = $this->add_option( $option_name, $value );
				$response = array(
					'success' => $result,
					'message' => $result ? 'Option saved successfully' : 'Failed to save option',
				);
				break;

			case 'get':
				$value    = $this->get_option( $option_name, false );
				$response = array(
					'success' => true,
					'value'   => $value,
				);
				break;

			case 'get_by_key':
				if ( empty( $key ) ) {
					$response = array(
						'success' => false,
						'message' => 'Missing key for get_by_key action',
					);
				} else {
					$value    = $this->get_option_by_key( $option_name, $key, false );
					$response = array(
						'success' => true,
						'value'   => $value,
					);
				}
				break;

			case 'delete':
				$result   = $this->delete_option( $option_name );
				$response = array(
					'success' => $result,
					'message' => $result ? 'Option deleted successfully' : 'Failed to delete option',
				);
				break;

			default:
				$response = array(
					'success' => false,
					'message' => 'Invalid action type',
				);
				break;
		}

		// Send response.
		if ( $response['success'] ) {
			wp_send_json_success( $response );
		} else {
			wp_send_json_error( $response );
		}
	}

	/**
	 * Enqueue scripts and localize AJAX data.
	 */
	public static function enqueue_scripts() {
		wp_enqueue_script(
			'option-manager',
			OMNIPRESS_URL . 'assets/js/option-manager.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);

		wp_localize_script(
			'option-manager',
			'optionManager',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'option_manager_nonce' ),
			)
		);
	}
}

// Initialize the class .
$option_manager = new OptionManager();

// Enqueue scripts on admin pages.
add_action( 'admin_enqueue_scripts', array( $option_manager, 'enqueue_scripts' ) );
