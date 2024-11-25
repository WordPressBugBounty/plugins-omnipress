<?php

namespace Omnipress\RestApi\Controllers\V1;

use Omnipress\Abstracts\RestControllersBase;
use Omnipress\Models\UsersModel;

class UsersController extends RestControllersBase {
	public function get_roles() {
		return UsersModel::get_roles();
	}

	/**
	 * Update user block permissions.
	 * Who can Edit block settings and who cannot ?
	 *
	 * @since 1.4.4
	 *
	 * @param \WP_REST_Request $request
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function update_user_block_permissions( \WP_REST_Request $request ) {
		$role_name = $request->get_param( 'roleName' );

		return UsersModel::update_user_block_permissions( $role_name );
	}

	/**
	 * {@inheritdoc}
	 */
	public function register_routes() {
		$this->register_rest_route(
			array(
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_roles' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
			),
		);

		$this->register_rest_route(
			array(
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'update_user_block_permissions' ),
				'args'                => array(
					'roleName' => array(
						'sanitize_callback' => 'sanitize_text_field',
						'required'          => true,
					),
				),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
			),
		);
	}
}
