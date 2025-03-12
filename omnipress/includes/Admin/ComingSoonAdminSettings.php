<?php
declare(strict_types=1);

namespace Omnipress\Admin;


use Omnipress\Traits\Singleton;

( defined( 'ABSPATH' ) ) || exit;



class ComingSoonAdminSettings {

	const OPTION_NAME = OMNIPRESS_PREFIX . '_coming_soon';
	const POST_TYPE   = 'op_coming_soon_post';

	use Singleton;

	public static function get_settings() {
		return get_option(
			self::OPTION_NAME,
			array(
				'enable'     => 'off',
				'post_id'    => '',
				'visibility' => 'public',
			)
		);
	}

	private function __construct() {
		add_filter( 'omnipress_sub_menus', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_bar_menu', array( $this, 'add_coming_soon_menu' ), 70 );

		add_action(
			'wp_enqueue_scripts',
			static function () {
				wp_enqueue_style( 'omnipress-admin-style', OMNIPRESS_URL . 'assets/build/css/admin.css', array( 'wp-components' ), OMNIPRESS_VERSION );
			}
		);

		add_action( 'init', array( $this, 'register_coming_soon_post_type' ) ); // Register post type.
		add_action( 'plugins_loaded', array( $this, 'create_default_coming_soon_post' ) );
	}

	public function add_settings_page( array $sub_menus = array() ) {
		return array_merge(
			$sub_menus,
			array(
				array(
					'parent_slug' => 'omnipress',
					'page_title'  => __( 'Coming Soon Settings', 'omnipress' ),
					'menu_title'  => __( 'Coming Soon Settings', 'omnipress' ),
					'capability'  => 'manage_options',
					'menu_slug'   => 'op-coming-soon',
					'callback'    => array( $this, 'render_settings_page' ),
				),
			)
		);
	}

	public function render_settings_page() {

		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="post" action="options.php">
				<?php settings_fields( self::OPTION_NAME . '_settings' ); ?>
				<?php do_settings_sections( self::OPTION_NAME . '_settings' ); ?>
				<?php submit_button( 'Save', 'small' ); ?>
			</form>
		</div>
		<?php
	}

	public function register_settings() {
		register_setting(
			self::OPTION_NAME . '_settings',
			self::OPTION_NAME,
			array(
				'sanitize_callback' => array( $this, 'sanitize_settings' ),
			)
		);

		add_settings_section( self::OPTION_NAME . '_section', 'Coming Soon Settings', null, self::OPTION_NAME . '_settings' );
		add_settings_field( 'enable', 'Enable Coming Soon', array( $this, 'enable_field' ), self::OPTION_NAME . '_settings', self::OPTION_NAME . '_section' );
		add_settings_field( 'post_id', 'Coming Soon Post', array( $this, 'post_id_field' ), self::OPTION_NAME . '_settings', self::OPTION_NAME . '_section' );
		add_settings_field( 'visibility', 'Visibility', array( $this, 'visibility_field' ), self::OPTION_NAME . '_settings', self::OPTION_NAME . '_section' );
	}

	public function register_coming_soon_post_type() {
		$args = array(
			'public'       => true,
			'show_in_menu' => false,
			'show_in_rest' => true,
			'supports'     => array(
				'editor',
				'title',
			),
			'labels'       => array(
				'name'          => 'Coming Soon Posts',
				'singular_name' => 'Coming Soon Post',
			),
		);

		register_post_type( static::POST_TYPE, $args );
	}

	public function create_default_coming_soon_post() {
		$settings = get_option( self::OPTION_NAME );

		if ( empty( $settings['post_id'] ) ) {
			$default_post = array(
				'post_title'   => 'Default Coming Soon Page',
				'post_content' => 'Our website is coming soon! Stay tuned for the launch.',
				'post_status'  => 'publish',
				'post_type'    => static::POST_TYPE,
				'post_author'  => get_current_user_id(),
			);
			$post_id      = wp_insert_post( $default_post );

			if ( $post_id ) {
				$settings['post_id'] = $post_id;
				update_option( self::OPTION_NAME, $settings );
			}
		}
	}

	public function sanitize_settings( $input ) {
		$output               = array();
		$output['enable']     = (int) isset( $input['enable'] );
		$output['post_id']    = sanitize_text_field( $input['post_id'] );
		$output['visibility'] = sanitize_text_field( $input['visibility'] );

		return $output;
	}

	// Field callbacks...
	public function enable_field() {
		$settings = get_option(
			self::OPTION_NAME,
			array(
				'enable'  => 0,
				'post_id' => '',
			)
		);
		echo '<input type="checkbox" name="' . esc_attr( self::OPTION_NAME ) . '[enable]" value="1" ' . checked( $settings['enable'], 1, false ) . '>';
	}



	public function post_id_field() {
		$settings = get_option( self::OPTION_NAME );
		$posts    = get_posts(
			array(
				'post_type'   => static::POST_TYPE,
				'numberposts' => -1,
			)
		);

		echo '<select name="' . esc_attr( self::OPTION_NAME ) . '[post_id]">';

		echo '<option value="">-- Create New Post or Select --</option>';
		foreach ( $posts as $post ) {
			echo '<option value="' . esc_attr( $post->ID ) . '" ' . selected( $settings['post_id'], $post->ID, false ) . '>' . esc_html( $post->post_title ) . '</option>';
		}
		echo '</select>';

		echo '<a href="' . esc_url( admin_url( 'post-new.php?post_type=' . static::POST_TYPE . '&coming_soon=true' ) ) . '" class="button  !op-ml-4" target="_blank">' . __( 'Create New Coming soon Post', OMNIPRESS_I18N ) . '</a>';

		echo '<a href="' . esc_url( get_edit_post_link( $settings['post_id'] ) ) . '" class="button op-bg-blue-500 op-text-white op-rounded op-hover:op-bg-blue-600 op-transition-colors op-duration-300 !op-ml-2">' . esc_html( empty( $settings['post_id'] ) ? 'disabled' : __( 'Edit Post', OMNIPRESS_I18N ) ) . '</a>';
	}

	public function visibility_field() {
		$settings = get_option( self::OPTION_NAME );
		echo '<select name="' . self::OPTION_NAME . '[visibility]">';
		echo '<option value="logged_in" ' . selected( $settings['visibility'], 'logged_in', false ) . '>Logged-in Users Only</option>';
		echo '<option value="logged_out" ' . selected( $settings['visibility'], 'logged_out', false ) . '>Logged-out Users Only</option>';
		echo '<option value="both" ' . selected( $settings['visibility'], 'both', false ) . '>Both (Logged-in & Logged-out)</option>';
		echo '</select>';
	}

	public function add_coming_soon_menu( $wp_admin_bar ) {
		$settings            = get_option( self::OPTION_NAME );
		$coming_soon_enabled = isset( $settings['enable'] ) && $settings['enable'];

		if ( $coming_soon_enabled && current_user_can( 'manage_options' ) ) {
			$wp_admin_bar->add_menu(
				array(
					'id'    => self::OPTION_NAME,
					'title' => '<span class="ab-item op-bg-white op-text-black !op-px-4 !op-block !op-leading-[1em] !op-py-1 !op-my-1 !op-rounded-sm  !op-text-[12px]">' . __( 'SITE COMING SOON', OMNIPRESS_I18N ) . '</span>',
					'href'  => esc_attr( admin_url( 'admin.php?page=op-coming-soon' ) ),
					'meta'  => array(
						'title' => __( 'Coming Soon Mode is Active', OMNIPRESS_I18N ),
					),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => self::OPTION_NAME,
					'id'     => self::OPTION_NAME . '-disable',
					'title'  => '<span class="op-text-white op-font-medium op-mb-2">Disable</span>',
					'href'   => admin_url( 'admin.php?page=op-coming-soon' ),
					'meta'   => array(
						'class' => 'omnipress-soon-disable',
					),
				)
			);
		}
	}
}

