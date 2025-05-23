<?php
/**
 * Demos rest api controller.
 *
 * @package Omnipress\RestApi\Controllers\V1
 */

namespace Omnipress\RestApi\Controllers\V1;

use Omnipress\Abstracts\RestControllersBase;
use Omnipress\Helpers;
use Omnipress\Models\DemosModel;


/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DemosController extends RestControllersBase {

	/**
	 * {@inheritDoc}
	 */
	public function register_routes() {
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
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'prepare_demo_contents' ),
					'permission_callback' => array( $this, 'update_item_permissions_check' ),
				),
			),
			'prepare/(?P<key>[\w-]+)',
		);

		$this->register_rest_route(
			array(
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'install_and_activate_theme' ),
					'permission_callback' => array( $this, 'update_item_permissions_check' ),
				),
			),
			'switch-theme'
		);

		$this->register_rest_route(
			array(
				array(
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'import_entire_demo' ),
					'permission_callback' => array( $this, 'update_item_permissions_check' ),
				),
			),
			'import/(?P<key>[\w-]+)'
		);

		$this->register_rest_route(
			array(
				'args' => array(
					'key' => array(
						'description' => __( 'Unique identifier for the demo.' ),
						'type'        => 'string',
					),
				),
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_item' ),
					'permission_callback' => array( $this, 'get_item_permissions_check' ),
				),
			),
			'(?P<key>[\w-]+)'
		);

		$this->register_rest_route(
			array(
				array(
					'methods'             => \WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'update_favorites' ),
					'permission_callback' => array( $this, 'update_item_permissions_check' ),
				),
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_favorites' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
				),
				array(
					'methods'             => \WP_REST_Server::DELETABLE,
					'callback'            => array( $this, 'remove_favorites' ),
					'permission_callback' => array( $this, 'delete_item_permissions_check' ),
				),
			),
			'favorites'
		);
	}

	/**
	 * Enqueue wooCommerce styles.
	 *
	 * @return void
	 */

	/**
	 * {@inheritDoc}
	 */
	public function get_items( $request ) {
		$demos_model = new DemosModel();

		// If current request is for premium theme demo.
		if ( 'theme' === $request->get_param( 'source' ) ) {
			return $this->get_premium_theme_demo( $request );
		}

		if ( $request->get_param( 'sync' ) ) {
			$demos_model->sync();
		}

		if ( $request->get_param( 'filter' ) ) {
			$demos_model->filter( $request->get_param( 'filter' ), array( 'etwoo' ) );
		} else {
			$demos_model->filter( '', array( 'etwoo' ) );
		}

		$demos = $demos_model->get();

		return $demos;
	}

	/**
	 * Get theme info.
	 *
	 * @return array
	 */
	public function get_theme_info() {
		$theme  = wp_get_theme();
		$parent = $theme->parent();

		return array(
			'name'        => $theme->get( 'Name' ),
			'author'      => $theme->get( 'Author' ),
			'description' => $theme->get( 'Description' ),
			'tags'        => $theme->get( 'Tags' ),
			'version'     => $theme->get( 'Version' ),
			'template'    => $theme->get( 'Template' ),
			'author_uri'  => $theme->get( 'AuthorURI' ),
			'is_child'    => $parent ? true : false,
			'parent'      => $parent ? $parent->get( 'Name' ) : null,
		);
	}

	public function get_premium_theme_demo( $request ) {
		$theme_name = wp_get_theme()->get( 'TextDomain' );

		$demos_model = new DemosModel();

		$demos_model->filter( 'etwoo' );

		$demos = $demos_model->get()->demos;

		if ( empty( $demos ) ) {
			return false;
		}

		foreach ( $demos as $demo ) {
			if ( $demo->theme === $theme_name && 'free' === $demo->type ) {
				$demo->theme_details        = $this->get_theme_info();
				$demo->recommended->plugins = $this->recommended_plugins_check( $demo->recommended->plugins );
				return $demo;
			}
		}

		return false;
	}

	public function recommended_plugins_check( $plugins ) {
		if ( is_object( $plugins ) && ! empty( $plugins ) ) {
			foreach ( $plugins as $slug => $item ) {
				$plugins->{$slug}->status = Helpers::get_plugin_status( $slug );
				$plugins->{$slug}->slug   = $slug;
			}
		}

		return $plugins;
	}

	/**
	 * {@inheritDoc}
	 */
	public function get_item( $request ) {

		$key = $request->get_param( 'key' );

		if ( ! $key ) {
			return false;
		}

		$demos_model = new DemosModel();

		$demo = $demos_model->get_by_keys( $key );

		if ( isset( $demo->recommended ) ) {

			$recommended = $demo->recommended;

			if ( is_object( $demo->recommended ) && ! empty( $demo->recommended ) ) {
				foreach ( $demo->recommended as $item_key => $items ) {

					if ( ! is_object( $items ) || ! $items ) {
						$items = (object) array();
					}

					switch ( $item_key ) {
						case 'plugins':
							if ( ! isset( $items->{'everest-backup/everest-backup.php'} ) ) {
								$items->{'everest-backup/everest-backup.php'} = (object) array(
									'type' => 'free',
									'name' => 'Everest Backup',
									'slug' => 'everest-backup/everest-backup.php',
									'link' => '',
								);
							}

							if ( ! is_object( $recommended->{$item_key} ) ) {
								$recommended->{$item_key} = $items;
							}
							$recommended->{$item_key} = $this->recommended_plugins_check( $items );
							break;

						case 'themes':
							$demo         = $demos_model->get_by_keys( $key );
							$active_theme = get_stylesheet();

							if ( is_object( $items ) && ! empty( $items ) ) {
								$status = property_exists( $items, $active_theme ) ? $items->{$active_theme}->status = 'active' : 'not activated';

								foreach ( $items as $slug => $item ) {
									$recommended->{$item_key}->{$slug}->status = $status;
								}
							}
							break;

						default:
							break;
					}
				}
			}

			$demo = (object) array_merge( (array) $demo, (array) $recommended );
		}

		return $demo;
	}

	public function install_and_activate_theme( $request ) {
		try {
			$key         = $request->get_param( 'key' );
			$demos_model = new DemosModel();
			$demo        = $demos_model->get_by_keys( $key );

			$active_theme    = get_stylesheet();
			$suggested_theme = $demo->theme;

			$installed_themes = wp_get_themes();

			if ( $suggested_theme !== $active_theme ) {
				$response = wp_remote_get( "https://api.wordpress.org/themes/info/1.1/?action=theme_information&request[slug]={$suggested_theme}" );

				if ( is_wp_error( $response ) ) {
					return new \WP_Error( 'theme_fetch_error', 'Failed to fetch theme information from WordPress.org' );
				}

				$theme_info = json_decode( \wp_remote_retrieve_body( $response ) );

				if ( empty( $theme_info->download_link ) ) {

					return wp_send_json_error(
						array(
							'error'  => 'theme_download_link_missing',
							'status' => 'activate',
						),
					);
				}

				// Step 2: Download and install the theme.
				require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
				require_once ABSPATH . 'wp-admin/includes/file.php';
				require_once ABSPATH . 'wp-admin/includes/misc.php';
				require_once ABSPATH . 'wp-admin/includes/theme.php';

				ob_start();
				$upgrader = new \Theme_Upgrader();
				$result   = $upgrader->install( $theme_info->download_link );
				ob_get_clean();

				if ( is_wp_error( $result ) ) {
					return $result;
				}

				ob_start();
				switch_theme( $suggested_theme );
				ob_end_clean();
			}
		} catch ( \Exception $exception ) {

			return array(
				'error'  => $exception->getMessage(),
				'status' => 'activate',
			);

		}

		return true;
	}


	/**
	 * Prepare demo contents
	 *
	 * @param \WP_REST_Request $request
	 */
	public function prepare_demo_contents( $request ) {
		// download attachments and replace demo's home url into current home_url.
		require_once OMNIPRESS_PATH . 'includes/class-omnipress-importer.php';

		$key = $request->get_param( 'key' );

		if ( ! $key ) {
			return false;
		}

		$demos_model = new DemosModel();

		$demos_model->set_demo_data( $key );
		$demos_model->set_templates( $key );
		$demos_model->set_template_parts( $key );
		$demo = $demos_model->get_by_keys( $key );

		return true;
	}

	/**
	 * Imports entire demo.
	 *
	 * @param \WP_REST_Request $request
	 */
	public function import_entire_demo( $request ) {
		$key = $request->get_param( 'key' );

		if ( ! $key ) {
			return false;
		}

		$demos_model = new DemosModel();

		$demo    = $demos_model->get_by_keys( $key );
		$current = absint( $request->get_param( 'next' ) );
		$page    = $demo->pages[ $current ];

		$post_title = sanitize_text_field( wp_unslash( $page->title ) );

		$posts = get_posts(
			array(
				'post_type' => 'page',
				'title'     => $post_title,
			)
		);

		if ( is_array( $posts ) && ! empty( $posts ) ) {
			foreach ( $posts as $post ) {

				$post_id = $post->ID;

				$args = array(
					'ID'            => $post_id,
					'page_template' => $page->template,
				);

				switch ( trim( strtolower( $post_title ) ) ) {
					case 'home':
						update_option( 'show_on_front', 'page' );
						update_option( 'page_on_front', $post_id );
						break;
					default:
						break;
				}

				if ( $args ) {
					wp_update_post( $args );
				}
			}
		}

		$next = $current + 1;

		$has_page = isset( $demo->pages[ $next ] );

		// Removed all previously generated Blocks Css.
		$this->deleted_all_previous_block_styles();

		/**
		 * This?
		 * I mean what else can I do?
		 * I gotta make it a little slowwww on purpose
		 * cuz my frontend worked real hard for the animation.
		 */
		sleep( 2 );

		set_transient( 'op_demo_imported', true );

		$active_theme    = get_stylesheet();
		$suggested_theme = $demo->theme;

		return array(
			'completed' => ! $has_page,
			'theme'     => ! $has_page && $active_theme == $suggested_theme,
			'previous'  => $current,
			'next'      => $has_page ? $next : null,
		);
	}

	public function deleted_all_previous_block_styles() {
		if ( ! is_dir( OMNIPRESS_BLOCK_STYLES_PATH ) ) {
			return false;
		}

		$files = scandir( OMNIPRESS_BLOCK_STYLES_PATH );

		foreach ( $files as $file ) {
			if ( '.' === $file || '..' === $file ) {
				continue;
			}

			$file_path = OMNIPRESS_BLOCK_STYLES_PATH . DIRECTORY_SEPARATOR . $file;

			if ( is_file( $file_path ) ) {
				wp_delete_file( $file_path );
			}
		}

		return true;
	}

	function delete_all_posts_and_pages() {
		// Set up arguments to fetch all posts and pages
		$args = array(
			'post_type'      => array( 'post', 'page' ),  // Target posts and pages
			'posts_per_page' => -1,  // Get all posts and pages
			'post_status'    => 'any',  // Include published, drafts, etc.
		);

		// Query for all posts and pages.
		$all_posts = new \WP_Query( $args );

		// Loop through the posts and delete each one
		if ( $all_posts->have_posts() ) {
			while ( $all_posts->have_posts() ) {
				$all_posts->the_post();

				// Delete the post
				wp_delete_post( get_the_ID(), true );  // Set second param to true for force delete (skip trash)
			}
		}

		// Reset post data
		wp_reset_postdata();
	}

	/**
	 * Returns favorites.
	 *
	 * @param \WP_REST_Request $request
	 */
	public function get_favorites( $request ) {
		$demos_model = new DemosModel();
		return $demos_model->get_favorites();
	}

	/**
	 * Update favorites stack.
	 *
	 * @param \WP_REST_Request $request
	 */
	public function update_favorites( $request ) {

		$key = $request->get_param( 'key' );

		if ( ! $key ) {
			return;
		}

		$demos_model = new DemosModel();

		$demos_model->set_favorite( $key );

		return $demos_model->get_favorites();
	}

	/**
	 * Update favorites stack.
	 *
	 * @param \WP_REST_Request $request
	 */
	public function remove_favorites( $request ) {

		$key = $request->get_param( 'key' );

		if ( ! $key ) {
			return;
		}

		$demos_model = new DemosModel();

		$demos_model->remove_favorite( $key );

		return $demos_model->get_favorites();
	}
}
