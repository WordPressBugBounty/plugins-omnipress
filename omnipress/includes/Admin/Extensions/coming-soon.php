<?php
declare(strict_types=1);

namespace Omnipress\Admin\Extensions;

use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Models\PatternsModel;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( ComingSoon::class ) ) {

	/**
	 * The ComingSoon class extends the Extensions class to manage the "Coming Soon" feature.
	 * It provides methods to handle input fields, render settings, and manage the "Coming Soon" page.
	 * The class also integrates with the WordPress admin bar to add a "SITE COMING SOON" menu item.
	 *
	 * @package Omnipress\Admin\Extensions
	 * @since 1.6.0
	 * @version 1.6.0
	 */
	class ComingSoon extends Extensions {
		const SETTING_NAME  = 'coming-soon';
		const SETTING_LABEL = 'Coming Soon';
		const POST_TYPE     = 'page';
		const BYPASS_PREFIX = 'op_coming_soon_bypass_';
		/**
		 * {@inheritDoc}
		 */
		public function get_input_fields( array $prev_values ): array {
			return array_merge(
				$prev_values,
				array(
					self::SETTING_NAME => array(
						array(
							'type' => 'checkbox',
							'name' => 'enabled',
						),
						array(
							'type' => 'text',
							'name' => 'post_id',
						),
						array(
							'type' => 'text',
							'name' => 'visibility',
						),
						array(
							'type' => 'array',
							'name' => 'bypass_user_role',
						),
						array(
							'type' => 'text',
							'name' => 'bypass_url',
						),
						array(
							'type' => 'number',
							'name' => 'bypass_url_timeout',
						),
					),
				)
			);
		}

		/**
		 * Constructor.
		 */
		public function __construct() {
			parent::__construct();
			add_action( 'admin_bar_menu', array( $this, 'add_coming_soon_menu' ), 70 );
			add_action( 'update_option_' . static::OPTION_NAME, array( $this, 'handle_coming_soon_page' ), 10, 2 );
		}

		/**
		 * Renders the form fields for the "Coming Soon" feature in the admin panel.
		 *
		 * This method retrieves all pages and the current settings for the "Coming Soon" feature,
		 * then displays a form with options to enable or disable the feature, select a post,
		 * and set visibility preferences. It also displays available "Coming Soon" templates
		 * if the feature is enabled.
		 *
		 * Utilizes helper functions and models to render UI components and fetch data.
		 */
		public function render_coming_soon_form_fields() {
			$posts = get_posts(
				array(
					'post_type'   => static::POST_TYPE,
					'numberposts' => -1,
				)
			);

			$settings   = get_option( self::OPTION_NAME )[ self::SETTING_NAME ] ?? array();
			$is_enabled = isset( $settings['enabled'] ) && 1 === (int) $settings['enabled'];

			$switcher = GeneralHelpers::render_switcher_button(
				static::OPTION_NAME . '[' . self::SETTING_NAME . '][enabled]',
				'coming-soon-toggle',
				'1',
				$is_enabled,
			);

			$patterns_model = new PatternsModel();
			$patterns_model->filter( 'comingsoon' );

			$patterns = $patterns_model->get();

			global $wp_roles;
			$op_existing_roles = $wp_roles;
			if ( ! isset( $wp_roles ) ) {
				$op_existing_roles = new \WP_Roles();
			}
			$roles = $op_existing_roles->get_names();
			?>
		<div class=" op-bg-white op-p-6 op-rounded-[4px] op-space-y-6">
			<div class="op-flex op-items-center op-justify-between op-max-w-md">
				<span class="op-text-sm op-font-medium op-text-gray-700">
					<?php esc_html_e( 'Enable Coming Soon', 'omnipress' ); ?>
				</span>
				<?php echo $switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>

			<?php if ( $is_enabled ) : ?>
				<div class="op-flex op-items-start op-justify-between op-flex-col op-gap-2 op-max-w-[900px]">
					<span class="op-text-sm op-font-medium op-text-gray-700 op-w-full sm:op-w-auto">
						<?php esc_html_e( 'Select Coming Soon Page', 'omnipress' ); ?>
					</span>
					<div class="op-flex op-items-center op-gap-3 op-w-full sm:op-w-auto op-flex-wrap op-justify-end">
						<select
							name="<?php echo esc_attr( static::OPTION_NAME . '[' . static::SETTING_NAME . '][post_id]' ); ?>"
							class="op-w-full sm:op-w-[200px] op-p-2 op-border op-border-gray-300 op-rounded-md op-focus:op-ring-2 op-focus:op-ring-blue-600 op-transition op-duration-300"
						>
							<option value=""><?php esc_html_e( '-- Create New Post or Select --', 'omnipress' ); ?></option>
							<?php foreach ( $posts as $post ) : ?>
								<option
									value="<?php echo esc_attr( $post->ID ); ?>"
									<?php selected( $settings['post_id'], $post->ID ); ?>
								>
									<?php echo esc_html( $post->post_title ); ?>
								</option>
							<?php endforeach; ?>
						</select>

						<a
							target="_blank"
							href="<?php echo esc_url( admin_url( 'post-new.php?post_type=' . static::POST_TYPE . '&coming_soon=true' ) ); ?>"
							class="op-button op-bg-primary op-text-white op-rounded hover:op-bg-blue-500 hover:op-text-white op-no-underline op-transition op-duration-300 op-px-4 op-py-2"
						>
							<?php esc_html_e( 'Create New Page', 'omnipress' ); ?>
						</a>

						<?php if ( ! empty( $settings['post_id'] ) ) : ?>
							<a
								href="<?php echo esc_url( get_edit_post_link( $settings['post_id'] ) ); ?>"
								class="op-button op-bg-transparent op-border op-border-solid op-border-primary op-text-primary op-rounded op-no-underline hover:op-text-white hover:op-bg-primary op-transition op-duration-300 op-px-4 op-py-2"
							>
								<?php esc_html_e( 'Edit Page', 'omnipress' ); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<!-- UserVisibility -->
				<div class="op-flex op-items-stretch op-justify-between op-gap-6 op-mt-6 md:op-flex-nowrap op-flex-wrap">

					<!-- User Roles -->
					<div class="op-bg-gray-50 op-rounded-sm op-relative op-grow">

						<h4 class="op-bg-gray-100 op-text-base op-rounded-t-sm op-m-0 op-p-3 op-px-5">
							<?php esc_html_e( 'Users Visibility Settings', 'omnipress' ); ?>
						</h4>

						<div class="op-flex op-flex-col op-gap-4 op-p-6 ">
							<div class="op-flex op-items-start op-justify-between op-flex-col op-gap-2">
								<label class="op-text-sm op-font-medium op-text-gray-700 op-w-full sm:op-w-auto">
									<?php esc_html_e( 'Coming Soon Visibility', 'omnipress' ); ?>
								</label>
								<select name="<?php echo esc_attr( static::OPTION_NAME . '[' . static::SETTING_NAME . '][visibility]' ); ?>" class="op-w-full sm:op-w-[200px] op-p-2 op-border op-border-gray-300 op-rounded-md op-focus:op-ring-2 op-focus:op-ring-blue-600 op-transition op-duration-300">
									<option value="logged_in" <?php selected( $settings['visibility'], 'logged_in' ); ?>>
										<?php esc_html_e( 'Logged-in Users Only', 'omnipress' ); ?>
									</option>
									<option value="logged_out" <?php selected( $settings['visibility'], 'logged_out' ); ?>>
										<?php esc_html_e( 'Logged-out Users Only', 'omnipress' ); ?>
									</option>
									<option value="both" <?php selected( $settings['visibility'], 'both' ); ?>>
										<?php esc_html_e( 'Both (Logged-in & Logged-out) Users', 'omnipress' ); ?>
									</option>
								</select>
							</div>

							<div class="op-multi-select-container">
								<div class="op-flex op-items-start op-flex-col op-justify-between op-gap-2">
									<label for="user-roles" class="op-text-sm op-font-medium op-text-gray-700 op-w-full sm:op-w-auto">
										<?php esc_html_e( 'Allow Access for Specific Roles.', 'omnipress' ); ?>
										<?php echo $this->render_info_icon_with_help_text( 'Choose which roles can bypass the Coming Soon screen.' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</label>

									<div class="op-relative op-cursor-pointer">
										<input
											type="text"
											id="user-roles"
											placeholder="Click to select roles..."
											class="op-cursor-pointer op-w-full op-px-3 op-py-2 op-border op-border-gray-300 op-rounded-md op-text-gray-800 op-focus:op-outline-none op-focus:op-ring-2 op-focus:op-ring-indigo-500 op-multi-select"
											readonly
										>

										<div id="roles-dropdown" class="op-hidden op-absolute op-w-full op-mt-1 op-bg-white op-border op-border-gray-300 op-rounded-md op-shadow-lg op-z-10 op-multi-select-options">
											<?php foreach ( $roles as $role_key => $role_name ) : ?>
												<label class="op-flex op-items-center op-px-2 op-py-1 op-cursor-pointer op-hover:op-bg-indigo-50">
													<input
														type="checkbox"
														class="op-mr-2 role-checkbox"
														value="<?php echo esc_attr( $role_key ); ?>"
														name="<?php echo esc_attr( static::OPTION_NAME . '[' . static::SETTING_NAME . '][bypass_user_role][]' ); ?>"
														<?php echo in_array( $role_key, $settings['bypass_user_role'], true ) ? 'checked' : ''; ?>
													>
													<span><?php echo esc_html( $role_name ); ?></span>
												</label>
											<?php endforeach; ?>
										</div>
									</div>

									<!-- Selected Roles -->
									<div id="selected-roles" class="op-flex op-flex-wrap op-gap-1 op-mt-3">
										<?php
										if ( GeneralHelpers::is_valid_array( $settings['bypass_user_role'] ) ) {
											foreach ( $settings['bypass_user_role'] as $name ) {
												?>
												<div class="op-inline-flex op-items-center op-px-4 op-py-2 op-rounded-full op-text-xs op-font-medium op-bg-gray-200 op-text-black op-leading-0">
													<?php echo esc_html( $name ); ?>
												</div>
												<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- By pass url -->
					<div class="op-bg-gray-50 op-rounded-sm op-relative op-grow">

						<h4 class="op-bg-gray-100 op-text-base op-rounded-t-sm op-m-0 op-p-3 op-px-5">
							<?php esc_html_e( 'Bypass URL', 'omnipress' ); ?>
						</h4>

						<div class="op-flex op-justify-between op-flex-col op-gap-4 op-p-3">
							<div class="op-flex op-items-start op-justify-between op-flex-col op-gap-2">
								<label for="user-roles" class="op-text-sm op-font-medium op-text-gray-700 op-w-full sm:op-w-auto">
									<?php esc_html_e( 'Bypass URL', 'omnipress' ); ?>
									<?php if ( ! empty( $settings['bypass_url'] ) ) : ?>
										<span data-text="<?php echo esc_url( home_url() . '?op_coming_soon_bypass=' . $settings['bypass_url'] ); ?>" id="copy-button" class="op-text-[11px] op-cursor-pointer op-px-2 op-rounded-sm op-bg-gray-300"><?php echo esc_html__( 'Copy URL', OMNIPRESS_I18N ); ?></span>
									<?php endif; ?>
									<?php echo $this->render_info_icon_with_help_text( 'Generate a unique link users can use to skip the Coming Soon screen.' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</label>
								<input
									type="text"
									placeholder="abcde12345"
									value="<?php echo esc_attr( $settings['bypass_url'] ?? '' ); ?>"
									name="<?php echo esc_attr( static::OPTION_NAME . '[' . static::SETTING_NAME . '][bypass_url]' ); ?>"
									class="op-w-full sm:op-w-[200px] op-p-2 op-border op-border-gray-300 op-rounded-md op-focus:op-ring-2 op-focus:op-ring-blue-600 op-transition op-duration-300"
								/>
							</div>

							<div class="op-flex op-items-start op-flex-col op-justify-between op-gap-2">
								<label class="op-text-sm op-font-medium op-text-gray-700 op-w-full sm:op-w-auto">
									<?php esc_html_e( 'Bypass Link Expiration (in hours)', 'omnipress' ); ?>
									<?php echo $this->render_info_icon_with_help_text( 'Set how long the bypass link should stay active. If value is zero it will valid for always.' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</label>

								<input
									type="number"
									value="<?php echo esc_attr( $settings['bypass_url_timeout'] ?? '' ); ?>"
									name="<?php echo esc_attr( static::OPTION_NAME . '[' . static::SETTING_NAME . '][bypass_url_timeout]' ); ?>"
									class="op-w-full sm:op-w-[200px] op-p-2 op-border op-border-gray-300 op-rounded-md op-focus:op-ring-2 op-focus:op-ring-blue-600 op-transition op-duration-300"
								/>
							</div>
						</div>
					</div>

				</div>
			<?php endif; ?>

			<button type="submit" class="op-bg-primary op-text-white op-px-4 op-py-2 op-rounded op-hover:bg-blue-700 op-transition-colors op-duration-200 op-cursor-pointer op-block hover:op-bg-blue-500">
					<?php esc_html_e( 'Save Setting', OMNIPRESS_I18N ); ?>
			</button>
		</div>

	<!-- Our Built in  Coming soon template Patterns -->
			<?php if ( $is_enabled ) : ?>

		<!--  Modal for preview -->
		<div id="modal" class="op-hidden op-fixed op-w-[calc(100vw-160px)] op-inset-0 !op-left-[160px] op-bg-black op-bg-opacity-50 op-flex op-items-center op-justify-center op-z-50">
			<div class="op-bg-white op-rounded-xl op-shadow-2xl op-w-full op-max-w-[1000px] op-p-6 op-relative op-transform op-transition-all op-duration-300 op-scale-95">
				<!-- Close Button -->
				<button id="closeModal" class="op-absolute op-top-4 op-right-4 op-text-gray-500 op-hover:op-text-gray-700 op-focus:op-outline-none op-cursor-pointer">
					<svg class="op-w-6 op-h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>

				<!-- Modal Header -->
				<h2 class="op-text-2xl op-font-bold op-text-gray-800 op-mb-4">
					<?php echo esc_html_e( 'Pattern Preview', OMNIPRESS_I18N ); ?>
				</h2>

				<!-- Image Preview -->
				<div class="op-bg-gray-50 op-p-4 op-rounded-lg op-border op-border-gray-200 op-mb-6">
					<img id="previewImage" src="" alt="Pattern Preview" class="op-w-full op-h-auto op-rounded-md op-object-cover">
					<p class="op-text-gray-600 op-text-sm op-mt-2">
						<?php echo esc_html_e( 'Selected Pattern Preview', OMNIPRESS_I18N ); ?>
					</p>
				</div>
			</div>
		</div>

		<!-- Templates  -->
		<div class="op-bg-white op-rounded-[4px] op-mt-10">
			<div class="op-p-10 op-bg-primary op-flex op-flex-col op-gap-2 op-rounded-t-sm">
				<h2 class="op-text-3xl op-font-bold op-m-0 op-p-0 op-text-white">
					<?php echo esc_html_e( 'Launch with Confidence - Stunning Coming Soon Pages', OMNIPRESS_I18N ); ?>
				</h2>
				<p class="op-m-0 op-p-0 op-text-white">Use our pre-built Coming Soon templates to keep visitors informed while your site is under construction. Easily customize and launch in minutes.</p>
			</div>

			<div class="op-p-8">
				<div class="op-columns-1 md:op-columns-2 lg:op-columns-3 op-gap-6">
					<?php foreach ( $patterns->patterns as $pattern ) : ?>
						<!-- Template -->
							<div id="demo-list" class=" op-bg-white op-relative op-rounded-lg op-overflow-hidden op-mb-6 op-min-h-[60px] op-group op-shadow-[0_5px_20px_0px_rgba(0,0,0,0.15)] hover:op-shadow-[0_10px_30px_0px_rgba(0,0,0,0.2)] op-flex op-flex-col op-justify-between">

								<!-- Ribbon -->
								<?php if ( 'pro' === $pattern->type ) : ?>
									<div type="button" class="op-absolute op-flex !op-flex-row op-items-center op-gap-2 op-bg-[#ff4900] op-top-xsmall op-right-0 op-text-white op-rounded-l op-px-3 op-py-1 op-group/pro">
										<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" op-text-white" height="16" width="16">
											<g>
												<path fill="none" d="M0 0h24v24H0z"></path>
												<path d="M2 19h20v2H2v-2zM2 5l5 3 5-6 5 6 5-3v12H2V5z"></path>
											</g>
										</svg>
										<span class="op-text-14 op-uppercase op-leading-5">Premium</span>
									</div>
								<?php endif; ?>


								<!-- image -->
								<div class="op-flex op-overflow-hidden op-rounded-t-md">
									<img decoding="async" src="<?php echo $pattern->thumbnails->low; ?>" class="op-w-full op-h-full op-object-contain op-object-top">
								</div>

								<div class="info op-p-xsmall op-pt-6">
									<div class="op-flex op-justify-start op-items-center op-gap-2">
										<?php if ( ! empty( $pattern->content ) ) : ?>
											<button
												data-post-id="<?php echo $settings['post_id']; ?>"
												data-pattern-content="<?php echo esc_attr( $pattern->content ); ?>"
												id="<?php echo 'coming-soon-patterns-inserter'; ?>"
												class="op-text-white op-font-semibold op-py-1 op-px-4 op-rounded-[2px] op-cursor-pointer op-bg-secondary hover:op-bg-secondary/90 !op-no-underline"
											>
												<?php echo esc_html_e( 'Insert', OMNIPRESS_I18N ); ?>
											</button>
										<?php else : ?>
											<a
												href="<?php echo esc_url( 'https://omnipressteam.com/pricing?utm_campaign=omnipress-extensions' ); ?>"
												target="_blank"
												id="restricted"
												class="op-text-white op-font-semibold op-py-1 op-no-underline op-px-4 op-rounded-[2px] op-cursor-pointer op-bg-secondary hover:!op-text-white hover:op-bg-secondary/90"
											>
												<?php echo esc_html_e( 'Buy Premium', OMNIPRESS_I18N ); ?>
											</a>
										<?php endif; ?>

										<button data-preview-image="<?php echo esc_url( $pattern->thumbnails->original ); ?>" id="coming-soon-preview-toggler" class="op-bg-primary op-text-white op-flex op-items-center op-justify-center op-gap-1 op-font-semibold op-py-1 op-px-4 op-rounded-[2px] op-hover:bg-blue-600 op-cursor-pointer hover:op-bg-primary/90 !op-no-underline">
											<?php echo esc_html_e( 'Preview', OMNIPRESS_I18N ); ?>
											<svg width="16" height="16" viewBox="0 0 20 20" fill="none" class=" op-fill-white group-hover/btn:op-fill-primary">
												<path d="M15.8333 17.5H4.16667C3.25 17.5 2.5 16.75 2.5 15.8333V4.16667C2.5 3.25 3.25 2.5 4.16667 2.5H10V4.16667H4.16667V15.8333H15.8333V10H17.5V15.8333C17.5 16.75 16.75 17.5 15.8333 17.5Z"></path>
												<path d="M17.5 8.33333H15.8333V4.16667H11.6666V2.5H17.5V8.33333Z"></path>
												<path d="M6.89795 11.9237L16.0902 2.73116L17.2687 3.90965L8.07648 13.1022L6.89795 11.9237Z"></path>
											</svg>
										</button>
									</div>

								</div>
							</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
			<?php
		}

		/**
		 * {@inheritDoc}
		 */
		public function render_setting(): void {
		}

		/**
		 * Handles the "Coming Soon" page functionality based on the provided settings.
		 *
		 * This method checks if the "Coming Soon" page is enabled and if a valid page ID is set.
		 * If enabled and no valid page exists, it attempts to find or create a "Coming Soon" page.
		 * If the page is not enabled, it resets the front page display option to show posts.
		 *
		 * @param array $old_value The previous settings value.
		 * @param array $new_value The new settings value.
		 */
		public function handle_coming_soon_page( $old_value, $new_value ) {
			$page_id             = $new_value[ static::SETTING_NAME ]['post_id'] ?? false;
			$coming_soon_enabled = isset( $new_value[ static::SETTING_NAME ]['enabled'] ) && 1 === (int) $new_value[ static::SETTING_NAME ]['enabled'];

			if ( ( empty( $page_id ) || ! get_post( $page_id ) ) && $coming_soon_enabled ) {
				$args = array(
					'post_type'      => 'page',
					'title'          => 'Coming Soon',
					'posts_per_page' => 1,
					'post_status'    => 'publish',
				);

				$query = new \WP_Query( $args );
				$page  = null;

				if ( $query->have_posts() ) {
					$page = $query->posts[0];
					wp_reset_postdata();
					return;
				}

				if ( is_null( $page ) ) {
					$new_page = array(
						'post_title'   => 'Coming Soon',
						'post_content' => '<!-- wp:omnipress/container {"blockId":"8b48e58d","columnWidth":"is-layout-flex is-layout-flow","preview":false,"styles":{"wrapper":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"minHeight":"100vh"},"flex":{"alignItems":"stretch","flexDirection":"column"}}} -->
							<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper is-layout-flex is-layout-flow"><!-- wp:cover {"url":"https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-4.0.3\u0026auto=format\u0026fit=crop\u0026w=1350\u0026q=80","alt":"Coming Soon Background","dimRatio":50,"focalPoint":{"x":0.49,"y":0.42},"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","className":"is-dark"} -->
							<div class="wp-block-cover alignfull is-dark" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="Coming Soon Background" src="https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" style="object-position:49% 42%" data-object-fit="cover" data-object-position="49% 42%"/><div class="wp-block-cover__inner-container"><!-- wp:omnipress/heading {"blockId":"bc79001a","headingType":"h1","styles":{"wrapper":{"margin":{"bottom":"60px"}},"headingStyles":{"textAlign":"center"}}} -->
							<div class="wp-block-omnipress-heading op-block__heading-wrapper--bc79001a op-bc79001a op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h1 class="op-block__heading-content">Coming Soon</h1></div>
							<!-- /wp:omnipress/heading -->

							<!-- wp:omnipress/container {"blockId":"883fb47e","preview":false,"styles":{"wrapper":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"flex":{"justifyContent":"space-evenly"}}} -->
							<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/container {"blockId":"a1faef50","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
							<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"3915eb35","headingType":"h4","styles":{"wrapper":{}}} -->
							<div class="wp-block-omnipress-heading op-block__heading-wrapper--3915eb35 op-3915eb35 op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Follow Us</h4></div>
							<!-- /wp:omnipress/heading -->

							<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
							<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->

							<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->

							<!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->

							<!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /--></ul>
							<!-- /wp:social-links --></div></div>
							<!-- /wp:omnipress/container -->

							<!-- wp:omnipress/container {"blockId":"ad018368","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
							<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"9dae67bd","headingType":"h4","styles":{"wrapper":{}}} -->
							<div class="wp-block-omnipress-heading op-block__heading-wrapper--9dae67bd op-9dae67bd op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Contact Us</h4></div>
							<!-- /wp:omnipress/heading -->

							<!-- wp:omnipress/paragraph {"blockId":"083c637b","content":"Sign up for updates!","styles":{"wrapper":{}}} -->
							<p class="wp-block-omnipress-paragraph op-083c637b" data-type="omnipress/paragraph" data-op-animation="">Sign up for updates!</p>
							<!-- /wp:omnipress/paragraph --></div></div>
							<!-- /wp:omnipress/container -->

							<!-- wp:omnipress/container {"blockId":"6af98af0","preview":false,"styles":{"wrapper":{},"flex":{"flexDirection":"column","justifyContent":"space-evenly"}}} -->
							<div class="wp-block-omnipress-container op-content-container op-block-container__wrapper wp-block-op-container" data-type="omnipress/container" data-op-animation=""><div class="op-container-innerblocks-wrapper alignwide"><!-- wp:omnipress/heading {"blockId":"1ca4c5d6","headingType":"h4","styles":{"wrapper":{}}} -->
							<div class="wp-block-omnipress-heading op-block__heading-wrapper--1ca4c5d6 op-1ca4c5d6 op-block__heading-wrapper" data-type="omnipress/heading" data-op-animation=""><h4 class="op-block__heading-content">Stay Updated</h4></div>
							<!-- /wp:omnipress/heading -->

							<!-- wp:omnipress/paragraph {"blockId":"0c3511f9","content":"Email: hello@example.com","styles":{"wrapper":{}}} -->
							<p class="wp-block-omnipress-paragraph op-0c3511f9" data-type="omnipress/paragraph" data-op-animation="">Email: hello@example.com</p>
							<!-- /wp:omnipress/paragraph --></div></div>
							<!-- /wp:omnipress/container --></div></div>
							<!-- /wp:omnipress/container -->

							<!-- wp:spacer {"height":"40px"} -->
							<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
							<!-- /wp:spacer -->

							<!-- wp:omnipress/paragraph {"blockId":"912e79ce","content":"© 2025 Your Site Name","styles":{"wrapper":{"textAlign":"center"}}} -->
							<p class="wp-block-omnipress-paragraph op-912e79ce" data-type="omnipress/paragraph" data-op-animation="">© 2025 Your Site Name</p>
							<!-- /wp:omnipress/paragraph --></div></div>
							<!-- /wp:cover --></div></div>
							<!-- /wp:omnipress/container -->',
						'post_status'  => 'publish',
						'post_type'    => static::POST_TYPE,
					);

					$page_id = wp_insert_post( $new_page );

					if ( ! is_wp_error( $page_id ) ) {
						$new_value[ static::SETTING_NAME ]['post_id'] = $page_id;
					}

					return;
				}
			} else {
				update_option( 'show_on_front', 'posts' );
				$new_value[ static::SETTING_NAME ]['post_id'] = '';
				update_option( static::SETTING_NAME, $new_value );
			}
		}

		public function add_coming_soon_menu( $wp_admin_bar ) {
			$settings            = static::get_settings();
			$coming_soon_enabled = isset( $settings[ static::SETTING_NAME ]['enabled'] ) && 1 === (int) $settings[ static::SETTING_NAME ]['enabled'];

			if ( $coming_soon_enabled && current_user_can( 'manage_options' ) ) {
				$wp_admin_bar->add_menu(
					array(
						'id'    => static::SETTING_NAME,
						'title' => '<span style="background:white;color:#000;padding-inline:8px;font-weight:500;border-radius:4px;font-size:12px;padding-block:4px;" class="ab-item">' . __( 'SITE COMING SOON', OMNIPRESS_I18N ) . '</span>',
						'href'  => esc_attr( admin_url( 'admin.php?page=omnipress-extensions&tab=' . static::SETTING_NAME ) ),
					)
				);
			}
		}

		protected function is_enabled(): bool {
			return true;
		}

		public function get_menu_slug(): string {
			return static::SETTING_NAME;
		}

		public function get_menu_label(): string {
			return static::SETTING_LABEL;
		}

		public function render_form_fields(): void {
			$this->render_coming_soon_form_fields();
		}
	}
}
new ComingSoon();
