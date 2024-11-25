<?php

namespace Omnipress\Blocks;

use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Main class to handler block's general settings.
 *
 * @author omnipressteam
 * @copyright (c) 2024
 *
 * @since 1.4.4
 */
class BlockGeneralSettings {
	use Singleton;

	const  DISABLED_BLOCKS_KEY                = 'omnipress_disabled_blocks';
	const OMNIPRESS_CONTAINER_BREAKPOINTS     = 'omnipress_container_breakpoints';
	const OMNIPRESS_CONTAINER_DEFAULT_STYLING = 'omnipress_container_default_styling';
	const OMNIPRESS_LIBRARY_BUTTON_OPTION     = 'omnipress_library_button_option';

	public static function get_default_settings() {
		return array(
			'library_button'   => array(
				'is_enabled' => true,
			),
			'breakpoints'      => array(
				'desktop' => 1200,
				'tablet'  => 991,
				'mobile'  => 768,
			),
			'container_styles' => array(
				'container_padding' => 20,
				'container_margin'  => 10,
				'container_gap'     => 20,
			),
			'disabled_blocks'  => array(),
		);
	}




	private function __construct() {
		$this->setup_general_settings();
	}

	public function setup_general_settings() {
		add_filter( '_omnipress_blocks_localize', array( $this, 'localize_general_setting_vars' ) );
		add_filter( 'omnipress_localize_admin_script', array( $this, 'localize_general_setting_vars' ) );
	}

	/**
	 * General settings are
	 * container default styling,
	 * Media query Breakpoints
	 * block enable/disable
	 * user Permission
	 */
	public static function register_settings() {
	}

	public function handle_user_permission() {
	}

	public function blocks_supports_handler() {
	}

	public function localize_general_setting_vars( $previous_localized_vars ) {

		$previous_localized_vars['libraryButton']    = $this->is_library_button_enabled();
		$previous_localized_vars['breakpoints']      = $this->get_breakpoints();
		$previous_localized_vars['containerStyles']  = $this->get_container_blocks_initial_styles();
		$previous_localized_vars['block_permission'] = current_user_can( OMNIPRESS_BLOCK_EDIT_CAPABILITY );

		$disabled_blocks = $this->get_disabled_blocks();

		$previous_localized_vars['disabledBlocks'] = $disabled_blocks;

		$block_details = $this->get_blocks_lists();

		$filtered_items = array();

		if ( is_object( $block_details ) && ! empty( $block_details ) ) {

			foreach ( $block_details as $block_name => $block ) {
				$filtered_item               = array();
				$filtered_item['type']       = $block->type;
				$filtered_item['block_name'] = $block->block_name;
				$filtered_item['icon']       = $block->icon ?? '';
				$filtered_item['label']      = $block->label ?? '';
				$filtered_item['isEnabled']  = ! $disabled_blocks || ! in_array( $block->block_name, $disabled_blocks, true );
				$filtered_item['required']   = $block->required ?? false;

				$filtered_items[] = $filtered_item;
			}
		}

		$previous_localized_vars['blocks'] = $filtered_items;

		return $previous_localized_vars;
	}

	/*
	################################################################
						Library Button
	################################################################
	*/

	public function is_library_button_enabled() {
		$library_button_settings = get_option( self::OMNIPRESS_LIBRARY_BUTTON_OPTION, array() );

		if ( GeneralHelpers::is_valid_array( $library_button_settings ) && ! $library_button_settings['is_enabled'] ) {
			return false;
		}

		return true;
	}

	public static function toggle_library_button() {
		$library_button_settings = get_option( self::OMNIPRESS_LIBRARY_BUTTON_OPTION, array() );

		if ( GeneralHelpers::is_valid_array( $library_button_settings ) ) {
			$library_button_settings['is_enabled'] = ! $library_button_settings['is_enabled'];
		} else {
			$library_button_settings = array(
				'is_enabled' => true,
			);
		}

		$result = update_option( self::OMNIPRESS_LIBRARY_BUTTON_OPTION, $library_button_settings );

		if ( $result ) {
			return new \WP_REST_Response(
				array(
					'message' => __( 'Library button settings updated successfully.', 'omnipress' ),
				),
				200
			);
		}
	}

	/*
		################################################################
		Container
		################################################################
	*/
	public function get_container_blocks_initial_styles() {
		$settings = get_option( self::OMNIPRESS_CONTAINER_DEFAULT_STYLING, false );

		if ( GeneralHelpers::is_valid_array( $settings ) ) {
			return $settings;
		}

		return $this->get_default_settings()['container_styles'];
	}

	public function update_container_default_styles( array $container_settings ) {
		$result = update_option( self::OMNIPRESS_CONTAINER_DEFAULT_STYLING, $container_settings );

		if ( $result ) {
			return new \WP_REST_Response(
				array(
					'message' => __( 'Container settings updated successfully.', 'omnipress' ),
				),
				200
			);
		}

		return new \WP_Error(
			'omnipress_update_container_settings_error',
			__( 'Container settings update failed.', 'omnipress' ),
			array(
				'status' => 500,
			)
		);
	}

	/*
		################################################################
				Breakpoints
		################################################################
	*/
	public static function get_breakpoints() {
		$custom_breakpoints = get_option( self::OMNIPRESS_CONTAINER_BREAKPOINTS, false );

		if ( GeneralHelpers::is_valid_array( $custom_breakpoints ) ) {
			return $custom_breakpoints;
		}

		return static::get_default_settings()['breakpoints'];
	}

	public function update_breakpoints( array $values ) {
		$reault = update_option( self::OMNIPRESS_CONTAINER_BREAKPOINTS, $values );

		if ( $reault ) {
			return new \WP_REST_Response(
				array(
					'message' => __( 'Breakpoints settings updated successfully.', 'omnipress' ),
				),
				200
			);
		} else {
			return new \WP_Error(
				'omnipress_update_breakpoints_settings_error',
				__( 'Breakpoints settings update failed.', 'omnipress' ),
				array(
					'status' => 500,
				)
			);
		}
	}

	/*
		################################################################
				Disable/Enable Blocks
		################################################################
	*/

	/**
	 * That will update the list of disabled blocks.
	 *
	 * @param string $block_name Name of the block {like: omnipress/heading}.
	 */
	public function update_disabled_blocks( string $block_name ) {

		$disabled_blocks = get_option( self::DISABLED_BLOCKS_KEY, array() );

		if ( in_array( $block_name, $disabled_blocks, true ) ) {
			$disabled_blocks = array_diff( $disabled_blocks, array( $block_name ) );
		} else {
			$disabled_blocks[] = $block_name;
		}

		$result = update_option( self::DISABLED_BLOCKS_KEY, $disabled_blocks );

		if ( $result ) {
			return new \WP_REST_Response(
				array(
					'message' => __( 'Block state successfully Updated.', 'omnipress' ),
				),
				200
			);
		} else {
			return new \WP_Error(
				'omnipress_update_disabled_blocks_error',
				__( 'Block state update failed.', 'omnipress' ),
				array(
					'status' => 500,
				)
			);
		}
	}

	public function get_blocks_lists() {
		return GeneralHelpers::get_all_blocks_details();
	}

	/**
	 * This method will check current block was disabled or enabled.
	 *
	 * @return bool
	 */
	public function is_block_disabled( string $block_name ): bool {

		$disabled_blocks = get_option( self::DISABLED_BLOCKS_KEY, false );

		if ( GeneralHelpers::is_valid_array( $disabled_blocks ) ) {
			return ! in_array( $block_name, $disabled_blocks, true );
		}

		return false;
	}

	public function get_disabled_blocks() {
		return get_option( self::DISABLED_BLOCKS_KEY, false );
	}
}

BlockGeneralSettings::init();
