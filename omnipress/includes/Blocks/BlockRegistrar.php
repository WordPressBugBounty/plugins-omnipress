<?php

namespace Omnipress\Blocks;

use Exception;
use Omnipress\Core\AbstractAssetsHandler;
use OMNIPRESS\Core\FileSystemUtil;
use Omnipress\Helpers;
use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Models\UsersModel;
use Omnipress\Utils\BlocksAssetsHelper;

/**
 * Main class to block registration.
 *
 * @since 1.4.2
 *
 * @author omnipressteam
 *
 * @copyright (c) 2024
 */
final class BlockRegistrar {

	/**
	 * @since 1.5.5
	 *
	 * @var AbstractAssetsHandler|null $assets_handler
	 */
	private ?AbstractAssetsHandler $assets_handler;

	/**
	 * @var BlockRegistrar $instance Instance of the class.
	 */
	private static BlockRegistrar $instance;

	public static function init( ?AbstractAssetsHandler $assets_handler = null ) {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self( $assets_handler );
		}

		return self::$instance;
	}

	/**
	 *
	 * Constructor
	 *
	 * @param AbstractAssetsHandler|null $assets_handler Assets handler instance.
	 *
	 * @since 1.5.5
	 *
	 * @return void
	 */
	private function __construct( ?AbstractAssetsHandler $assets_handler = null ) {
		$this->assets_handler = $assets_handler;

		add_action( 'init', array( $this, 'register_blocks' ) );
		add_action( 'omnipress_after_blocks_register', array( $this, 'assign_block_edit_caps' ) );
		add_filter( 'block_categories_all', array( $this, 'register_block_categories' ), PHP_INT_MAX, 3 );
		do_action( 'omnipress_after_blocks_register', $this->get_blocks_folders() );
		add_action(
			'wp_enqueue_scripts',
			function () {
				wp_enqueue_style( 'omnipress_blocks', OMNIPRESS_URL . 'build/css/block.css', array(), filemtime( OMNIPRESS_PATH . 'build/css/block.css' ) );
			}
		);
	}



	/**
	 * Register omnipress block categories.
	 *
	 * @param array $previous_categories already registered categories.
	 * @return string[][]
	 */
	public function register_block_categories( $previous_categories ) {
		$initial_categories = array(
			array(
				'slug'  => 'omnipress',
				'title' => __( 'Omnipress', 'omnipress' ),
			),
			array(
				'slug'  => 'omnipress-woo',
				'title' => __( 'Omnipress-Woo', 'omnipress' ),
			),
		);

		$additional_categories = apply_filters(
			'omnipress_block_categories',
			$previous_categories
		);

		return array_merge( $initial_categories, $additional_categories );
	}
	/**
	 * Lists of all available blocks.
	 *
	 * @return string[][]
	 */
	public function get_blocks_folders() {
		$core_blocks = array(
			'core'        => array(
				'container',
				'column',
				'button',
				'heading',
				'google-maps',
				'image',
				'video',
				'paragraph',
			),
			'creative'    => array(
				'accordion',
				'countdown',
				'mega-menu',
				'slide',
				'slider',
				'tab-labels',
				'tabs',
				'tabs-content',
				'icon-box',
				'post-grid',
				'counter',
				'popup',
				'post-category',
				'tax-query',
			),
			'simple'      => array(
				'custom-css',
				'dual-button',
				'icons',
				'team',
				'contact-form',
				'icon',
			),
			'advanced'    => array(
				'back-to-top',
				'breadcrumb',
				'list',
				'list-item',
				'single-testimonial',
				'tooltip',

			),
			'woocommerce' => array(
				'product-carousel',
				'product-category',
				'product-category-list',
				'product-grid',
				'product-list',
				'single-product',
			),
			'premium'     => array(
				'advanced-query-loop',
				'query-template',
				'query-pagination',
				'query-pagination-previous',
				'query-pagination-next',
				'query-pagination-numbers',
				'query-no-results',
				'dynamic-field-query',
				'content-switcher',
				'content-switcher-contents',
				'content-switcher-switch',
				'product-filter',
				'product-search',
				'product-tab-grid',
				'tax-query',
				'image-comparison',
				'flip-box',
				'flip-box-front',
				'flip-box-back',
				'progress-bar',
				'lottie-animation',
				'gallery',
			),
		);

		$additional_blocks_folders = apply_filters( 'omnipress/additional/blocks/folders', array() );

		return array_merge( $core_blocks, $additional_blocks_folders );
	}
	/**
	 * Validate provided blocks folder exists or not.
	 *
	 * @throws \Exception Throw error if block folder does not exist.
	 */
	public function validate_blocks() {
		$blocks_folder_names = $this->get_blocks_folders();

		foreach ( $blocks_folder_names as $category => $blocks ) {

			if ( 'premium' === $category ) {

				if ( defined( 'OMNIPRESS_PRO_BLOCKS_PATH' ) && is_dir( OMNIPRESS_PRO_BLOCKS_PATH ) && is_readable( OMNIPRESS_PRO_BLOCKS_PATH ) ) {
					$blocks_folders = scandir( OMNIPRESS_PRO_BLOCKS_PATH );
				}
			} else {

				$blocks_folders = scandir( OMNIPRESS_BLOCKS_PATH . "/{$category}" );
			}

			if ( GeneralHelpers::is_valid_array( $blocks_folders ) ) {
				foreach ( $blocks_folders as $blocks_folder ) {

					if ( '.' === $blocks_folder || '..' === $blocks_folder ) {
						continue;
					}

					$folder_path = OMNIPRESS_BLOCKS_PATH . "/{$category}/{$blocks_folder}";

					if ( 'premium' === $category ) {
						if ( defined( 'OMNIPRESS_PRO_BLOCKS_PATH' ) ) {
							$blocks_folders = scandir( OMNIPRESS_PRO_BLOCKS_PATH . "/{$blocks_folder}" );
						}
					}

					if ( ! is_dir( $folder_path ) ) {
						continue;
					}

					if ( ! file_exists( $folder_path . '/block.json' ) ) {
						/**
						 * Bail if current folder is not a block folder.
						 */
						continue;
					}

					if ( ! in_array( $blocks_folder, $blocks_folder_names[ $category ], true ) ) {
						/* translators: %s is the folder name of the generated block. */
						throw new Exception( sprintf( __( '"%s" block is missing in blocks args. Please check the block args and generated blocks.', 'omnipress' ), $blocks_folder ) );
					}
				}
			}
		}
	}

	/**
	 * Register all omnipress blocks.
	 *
	 * @return void
	 */
	public function register_blocks() {

		/**
		 * Fires before registering blocks.
		 *
		 * @since 1.2.0
		 */
		do_action( 'omnipress_before_blocks_register' );

		$blocks = $this->get_blocks_folders();

		if ( ! empty( $blocks ) ) {
			foreach ( $blocks as $category_name => $block ) {

				if ( 'premium' === $category_name ) {
					do_action( 'op_premium_blocks_assets', $block, $category_name );
					continue;
				}

				/**
				 * Check if block is disabled or not.
				 */
				if ( GeneralHelpers::is_valid_array( $block ) ) {
					if ( 'woocommerce' === $category_name && ! GeneralHelpers::is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
						continue;
					}

					foreach ( $block as $folder_name ) {
						$args = array();

						if ( $this->is_block_disabled( $folder_name ) ) {
							continue;
						}

						$this->register_omnipress_block( OMNIPRESS_BLOCKS_PATH . $category_name . "/$folder_name", $args );
					}
				}
			}
		}

		/**
		 * Fires before registering blocks.
		 *
		 * @since 1.2.0
		 */
		do_action( 'omnipress_after_blocks_register' );
	}

	public function assign_block_edit_caps() {

		$all_restricted_user_roles = get_option( UsersModel::BLOCK_EDIT_RESTRICTED_USER_ROLES, false );

		if ( GeneralHelpers::is_valid_array( $all_restricted_user_roles ) ) {
			return;
		}

		global $wp_roles;

		if ( $wp_roles && GeneralHelpers::is_valid_array( $wp_roles->roles ) ) {
			foreach ( $wp_roles->roles as $key => $role ) {

				$role_object = get_role( $key );

				if ( ! empty( $role_object ) ) {
					$role_object->add_cap( OMNIPRESS_BLOCK_EDIT_CAPABILITY );
				}
			}
		}
	}



	public function is_block_disabled( $block_name ) {
		$disabled_blocks = get_option( 'op_disabled_blocks', array() );

		return in_array( Helpers::kebab_case_to_camel_case( $block_name ), $disabled_blocks, true );
	}

	/**
	 * Register blocks with custom attributes.
	 *
	 * @param $block_path
	 * @param $args
	 * @return void
	 */
	public function register_omnipress_block( $block_path, $args = array() ) {

		if ( file_exists( $block_path . '/block.json' ) ) {

			$metadata = json_decode( FileSystemUtil::read_file( $block_path . '/block.json' ), true );

			if ( isset( $metadata['opSettings'] ) ) {
				$args['opSettings'] = $metadata['opSettings'];
			}

			$view_script = $this->get_frontend_script( $metadata['name'] );

			if ( $view_script ) {
				wp_register_script_module( $view_script['handle'], $view_script['src'], $view_script['deps'], $view_script['version'], true );
				if ( ! is_admin() ) {
					$args['viewScriptModule'] = $view_script['handle'];
				}
			}

			$args['render_callback'] = array( $this, 'render_block' );

			$args['supports']['anchor']        = true;
			$args['supports']['interactivity'] = true;

			if ( GeneralHelpers::is_valid_array( $args ) ) {
				if ( ! \WP_Block_Type_Registry::get_instance()->is_registered( $metadata['name'] ?? '' ) ) {
					register_block_type_from_metadata( $block_path, $args );
				}
			}
		}
	}

	/**
	 *
	 * @param string $block_name Name of current block.
	 * @return bool|array
	 */
	private function get_frontend_script( string $block_name ) {
		$file_name      = explode( '/', $block_name )[1] . '-view';
		$view_file_path = OMNIPRESS_PATH . 'build/js/client/view-scripts/' . $file_name . '.js';

		if ( file_exists( $view_file_path ) ) {
			return array(
				'handle'  => $file_name,
				'src'     => OMNIPRESS_URL . 'build/js/client/view-scripts/' . $file_name . '.js',
				'deps'    => array(),
				'version' => filemtime( $view_file_path ),
			);
		}

		return false;
	}


	public function add_animation_scripts() {
		return '(function () {
			window.addEventListener("DOMContentLoaded", function () {
				const observer = new IntersectionObserver(
				(entries) => {
					entries.forEach((entry) => {
						let animationClasses = (entry.target.dataset?.opAnimation || "").split(" ");

						if (entry.isIntersecting) {
							animationClasses.forEach( (animationClass) => {
								entry.target.classList.add(animationClass);
							});

							// observer.unobserve(entry.target);
						}else {
							let timeout;

							if (timeout) {
								clearTimeout(timeout);
							}

							timeout = setTimeout(() => {
								entry.target.classList.remove(...animationClasses);
							}, 1000);
						}
					});
				},
				{
					rootMargin: "0px 0px 0px 20px",
					threshold: 0.5,
				}
				);

				document.querySelectorAll(".op_has_animation").forEach(function (element) {
					if( !element){
						return
					}

					observer.observe(element);
				});
			});
		})();';
	}

	/**
	 * Render callback for registered block.
	 *
	 * @param array     $attributes current block attributes.
	 * @param string    $content saved content.
	 * @param \WP_Block $block Block Instance.
	 * @return mixed
	 */
	public function render_block( array $attributes, string $content, \WP_Block $block ) {

		if ( isset( $attributes['opAnimation'] ) && $attributes['opAnimation'] && ! wp_script_is( 'omnipress-animations' ) ) {
			$scripts = $this->add_animation_scripts();

			wp_register_script( 'omnipress-animations', null, array(), time(), true );

			wp_add_inline_script( 'omnipress-animations', $scripts, 'after' );

			wp_enqueue_script( 'omnipress-animations' );
		}

		$current_block_class_instance = BlocksAssetsHelper::get_block_class_instance_by_name( $block->name );

		// If the block class has a render callback, use that.
		// this filter was useful when we need to modify any omnipress block's content before render in the frontend.
		$content = apply_filters( 'omnipress_render_dynamic_content', $content, $attributes, $block );
		$content = apply_filters( 'op_render_block', $content, $block->parsed_block );

		if ( ! $current_block_class_instance ) {
			// add data-tooltip attribute to the content.
			$p = new \WP_HTML_Tag_Processor( $content );
			$p->next_tag();

			if ( ! empty( $attributes['hideOnDesktop'] ) ) {
				$p->set_attribute( 'data-hide-desktop', 'true' );
			}

			if ( ! empty( $attributes['hideOnTablet'] ) ) {
				$p->set_attribute( 'data-hide-tablet', 'true' );
			}

			if ( ! empty( $attributes['hideOnMobile'] ) ) {
				$p->set_attribute( 'data-hide-mobile', 'true' );
			}

			if ( ! empty( $attributes['tooltipText'] ) ) {
				$p->set_attribute( 'data-tooltip', $attributes['tooltipText'] );

				$p->set_attribute( 'data-tooltip-direction', ( $attributes['tooltipPosition'] ?? 'top' ) );
			}
			$content = $p->get_updated_html();
			return $content;
		}

		if ( method_exists( $current_block_class_instance, 'render' ) ) {
			$content = $current_block_class_instance->render( $attributes, $content, $block );
		}

		if ( isset( $attributes['isSynced'] ) && $attributes['isSynced'] ) {
			$pattern = (string) 'op-' . $attributes['blockId'];

			$content = preg_replace( "/$pattern/", 'op-synced-' . $attributes['componentId'], $content );
		}

		return $content;
	}
}
