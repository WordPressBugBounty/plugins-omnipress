<?php

namespace Omnipress\Models;

defined( 'ABSPATH' ) || exit;

use Omnipress\Abstracts\ModelsBase;
use Omnipress\Helpers\GeneralHelpers;

/**
 * Users Model Class.
 */
class UsersModel extends ModelsBase {
	const BLOCK_EDIT_RESTRICTED_USER_ROLES = 'omnipress_restricted_user_roles';

	/**
	 * Callback function to get all roles
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public static function get_roles( $restricted_user_roles = false ) {
		global $wp_roles;

		if ( false === $restricted_user_roles ) {
			$restricted_user_roles = get_option( self::BLOCK_EDIT_RESTRICTED_USER_ROLES, array() );
		}

		if ( GeneralHelpers::is_valid_array( $restricted_user_roles ) ) {

			foreach ( $wp_roles->roles as $key => $role ) {

				if ( in_array( $key, $restricted_user_roles, true ) ) {

					$role_object = get_role( $key );

					$role_object->remove_cap( OMNIPRESS_BLOCK_EDIT_CAPABILITY );
				} else {
					$role_object = get_role( $key );

					$role_object->add_cap( OMNIPRESS_BLOCK_EDIT_CAPABILITY );
				}
			}
		} else {
			foreach ( $wp_roles->roles as $key => $role ) {

				$role_object = get_role( $key );

				$role_object->add_cap( OMNIPRESS_BLOCK_EDIT_CAPABILITY );
			}
		}

		return new \WP_REST_Response( $wp_roles->roles, 200 );
	}

	public static function update_user_block_permissions( $role_name ) {
		$restricted_user_roles = get_option( self::BLOCK_EDIT_RESTRICTED_USER_ROLES, false );

		if ( GeneralHelpers::is_valid_array( $restricted_user_roles ) && is_string( $role_name ) && in_array( $role_name, $restricted_user_roles, true ) ) {
			$restricted_user_roles = array_diff( $restricted_user_roles, array( $role_name ) );

		} else {
			$restricted_user_roles[] = $role_name;
		}

		$result = update_option( self::BLOCK_EDIT_RESTRICTED_USER_ROLES, $restricted_user_roles );

		if ( $result ) {
			return static::get_roles( $restricted_user_roles );
		}

		return new \WP_Error( 'update_user_block_permissions', 'Unable to update user block permissions', array( 'status' => 500 ) );
	}
}
