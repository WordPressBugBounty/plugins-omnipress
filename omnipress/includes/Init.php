<?php
/**
 * Main file for omnipress plugin.
 *
 * @package Omnipress
 */

namespace Omnipress;

require_once OMNIPRESS_PATH . 'includes/Utils/BlockAssetsHelper.php';
require_once OMNIPRESS_PATH . 'includes/Core/FileSystemUtil.php';
require_once OMNIPRESS_PATH . 'includes/Block.php';
require_once OMNIPRESS_PATH . 'includes/Blocks/BlockGeneralSettings.php';
require_once OMNIPRESS_PATH . 'includes/class-op-ajax.php';
require_once OMNIPRESS_PATH . 'includes/Controllers/ComingSoonController.php';
require_once OMNIPRESS_PATH . 'includes/Controllers/PatternsController.php';
require_once OMNIPRESS_PATH . 'includes/Admin/Extensions/coming-soon.php';
// require_once OMNIPRESS_PATH . 'includes/Models/TestimonialModel.php';

use Omnipress\Admin\Init as AdminInit;
use Omnipress\Abstracts\BlockTemplateBase;
use Omnipress\RestApi\RestApi;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main file for omnipress plugin.
 *
 * @since 1.1.0
 */
class Init {

	/**
	 * This object instance.
	 *
	 * @var ?static
	 */
	protected static ?Init $instance = null;

	/**
	 * Returns this object instance.
	 *
	 * @return static
	 */
	public static function instance(): ?Init {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		$prev_version = get_option( 'omnipress_prev_version', false );

		if ( false === $prev_version || version_compare( $prev_version, OMNIPRESS_VERSION, '<' ) ) {
			static::on_update_plugin( $prev_version, OMNIPRESS_VERSION );

			delete_transient( 'omnipress_blocks_details' );

			update_option( 'omnipress_prev_version', OMNIPRESS_VERSION );

			update_option( OMNIPRESS_POST_EDIT_TIME, time() );

			do_action( 'omnipress_update', $prev_version, OMNIPRESS_VERSION );
		}

		return self::$instance;
	}

	public static function on_update_plugin( $prev_version, $new_version ) {
		if ( is_dir( OMNIPRESS_BLOCK_STYLES_PATH ) ) {

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
		}
	}

	/**
	 * @return mixed
	 */
	public function update_search_template_hierarchy( $templates ) {
		if ( ( is_search() && is_post_type_archive( 'product' ) ) && wc_current_theme_is_fse_theme() ) {
			array_unshift( $templates, self::SLUG );
		}
		return $templates;
	}

	/**
	 * Summary of __construct
	 */
	public function __construct() {
		require_once OMNIPRESS_PATH . 'includes/Blocks/BlockTypes/WpFormsExtender.php';
		require OMNIPRESS_PATH . 'includes/Models/BlocksModel.php';
		require_once OMNIPRESS_PATH . 'classes/class-popup-builder.php';
		add_action( 'admin_footer', array( $this, 'add_editor_markup' ) );

		AdminInit::init();
		RestApi::init();

		BlockTemplateBase::init();
	}

	public function add_editor_markup() {
		?>
		<div class="omnipress-editor-area omnipress-editor-slots"></div>
		<?php
	}
}
