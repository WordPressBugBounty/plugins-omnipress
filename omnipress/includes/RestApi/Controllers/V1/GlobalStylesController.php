<?php

namespace Omnipress\RestApi\Controllers\V1;

use Omnipress\Abstracts\RestControllersBase;
use OMNIPRESS\Core\FileSystemUtil;
use Omnipress\Helpers\BlockStylesHelper;
use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Models\GlobalStylesModel;

defined( 'ABSPATH' ) || exit;

/**
 * GlobalStyles class.
 */
class GlobalStylesController extends RestControllersBase {
	/**
	 * @var  ?GlobalStylesModel $model
	 */
	private GlobalStylesModel $model;

	public function register_routes() {
			$this->model = new GlobalStylesModel();

			$this->register_rest_route(
				array(
					array(
						'methods'             => \WP_REST_Server::READABLE,
						'callback'            => array( $this, 'get_items' ),
						'permission_callback' => array( $this, 'get_items_permissions_check' ),
					),
				)
			);
			$this->register_rest_route(
				array(
					array(
						'methods'             => \WP_REST_Server::READABLE,
						'callback'            => array( $this, 'get_attributes_items' ),
						'permission_callback' => array( $this, 'get_items_permissions_check' ),
					),
				),
				'attributes'
			);

			$this->register_rest_route(
				array(
					array(
						'methods'             => \WP_REST_Server::CREATABLE,
						'callback'            => array( $this, 'create_item' ),
						'permission_callback' => array( $this, 'create_item_permissions_check' ),
						'args'                => array(
							'blockName' => array(
								'required' => true,
								'type'     => 'string',
							),
							'id'        => array(
								'type'     => 'string',
								'required' => true,
							),
							'style'     => array(
								'required' => true,
								'type'     => 'object',
							),
						),
					),
				)
			);

			$this->register_rest_route(
				array(
					array(
						'methods'             => \WP_REST_Server::EDITABLE,
						'callback'            => array( $this, 'update_item' ),
						'permission_callback' => array( $this, 'update_item_permissions_check' ),
						'args'                => array(
							'styles' => array(
								'required' => true,
								'type'     => 'object',
							),
						),
					),
				)
			);

			$this->register_rest_route(
				array(
					array(
						'methods'             => \WP_REST_Server::DELETABLE,
						'callback'            => array( $this, 'delete_item' ),
						'permission_callback' => array( $this, 'delete_item_permissions_check' ),
						'args'                => array(
							'id'        => array(
								'type'     => 'string',
								'required' => true,
							),
							'blockName' => array(
								'type'     => 'string',
								'required' => true,
							),
						),
					),
				)
			);
	}

	/**
	 * Summary of delete_item
	 *
	 * @param \WP_REST_Request $request
	 */
	public function delete_item( $request ) {
		$block_name = $request->get_param( 'blockName' );
		$style_uid  = $request->get_param( 'id' );
		$nonce      = $request->get_header( 'X-WP-Nonce' );

		if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
			return new \WP_Error( 'invalid_nonce', 'Invalid nonce', array( 'status' => 403 ) );
		}

		return $this->model->delete_style( $block_name, $style_uid );
	}

	/**
	 * Summary of delete_item
	 *
	 * @param \WP_REST_Request $request
	 */
	public function create_item( $request ) {
		$block_name = $request->get_param( 'blockName' );
		$styles     = $request->get_param( 'style' );
		$style_uid  = $request->get_param( 'id' );

		return $this->model->add_style( $block_name, $style_uid, $styles, );
	}

	/**
	 *
	 * @param \WP_REST_Request $request
	 */
	public function update_item( $request ) {
		$styles = $request->get_param( 'styles' );

		update_option( OMNIPRESS_POST_EDIT_TIME, time() );

		$res_status = $this->model->update_styles( $styles );

		// update whole global components.
		return array(
			'message' => array(
				'styles' => $res_status,
			),
		);
	}

	/**
	 * @param \WP_REST_Request $request
	 */
	public function get_items( $request ) {
		$style_components = $this->model->get_global_styles();

		return $style_components;
	}

	/**
	 * @param \WP_REST_Request $request
	 */
	public function get_attributes_items( $request ) {
		return $this->model->get_blocks_valid_style_attributes();
	}
}
