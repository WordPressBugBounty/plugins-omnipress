<?php

/**
 * Coming Soon Template
 *
 * This template is used to display a Coming Soon page for the plugin.
 * It includes the necessary HTML, CSS, and PHP code to render the page.
 *
 * @since 1.5.6
 *
 * @package Omnipress
 */

defined( 'ABSPATH' ) || exit;

$settings            = get_option( 'myplugin_coming_soon' );
$coming_soon_enabled = isset( $settings['enable'] ) && $settings['enable'];

$coming_soon_posts = get_posts(
	array(
		'post_type'   => 'coming_soon_template',
		'numberposts' => -1,
		'post_status' => 'publish',
	)
);

$is_logged_in = is_user_logged_in();

?>

<div class="op-bg-pink-100 op-min-h-screen op-flex op-items-center op-justify-center">

<?php if ( $coming_soon_enabled ) : ?>

	<div class="op-container op-text-center">

		<?php if ( $is_logged_in ) : ?>
			<!-- For logged-in users -->
			<h1 class="op-text-4xl op-font-bold op-text-purple-800 op-mb-4">Site Coming Soon</h1>
			<p class="op-text-lg op-text-gray-700 op-mb-6">You are logged in. Here are the Coming Soon posts:</p>

			<?php if ( $coming_soon_posts ) : ?>
				<div class="op-grid op-grid-cols-1 op-md:grid-cols-2 op-gap-6 op-mb-8">
					<?php
					foreach ( $coming_soon_posts as $post ) :
						setup_postdata( $post );
						?>
						<div class="op-bg-white op-p-6 op-rounded-lg op-shadow-md op-border op-border-purple-300 op-hover:shadow-lg op-transition-shadow op-duration-300">
							<h2 class="op-text-2xl op-font-semibold op-text-purple-700"><?php echo esc_html( $post->post_title ); ?></h2>
							<div class="op-text-gray-600 op-mt-2"><?php echo apply_filters( 'the_content', $post->post_content ); ?></div>
							<a href="<?php echo admin_url( 'post.php?post=' . $post->ID . '&action=edit' ); ?>" class="op-mt-4 op-inline-block op-bg-blue-500 op-text-white op-px-4 op-py-2 op-rounded op-hover:bg-blue-600 op-transition-colors op-duration-300">Edit Post</a>
						</div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="op-text-gray-600">No Coming Soon posts found.</p>
			<?php endif; ?>

			<p class="op-text-sm op-text-gray-500 op-mt-6">Coming Soon mode is active for logged-in users only.</p>

		<?php else : ?>
			<!-- For logged-out users -->
			<div class="op-bg-white op-p-8 op-rounded-lg op-shadow-lg op-border op-border-purple-300 op-max-w-md op-mx-auto">
				<h1 class="op-text-4xl op-font-bold op-text-purple-800 op-mb-4">Launching Soon</h1>
				<p class="op-text-lg op-text-gray-700 op-mb-6">Our website is coming soon! Stay tuned for the launch.</p>

				<?php if ( $coming_soon_posts ) : ?>
					<?php
					foreach ( $coming_soon_posts as $post ) :
						setup_postdata( $post );
						?>
						<div class="op-text-gray-600 op-mb-4"><?php echo apply_filters( 'the_content', $post->post_content ); ?></div>
						<?php
					endforeach;
					wp_reset_postdata();
					?>
				<?php else : ?>
					<p class="op-text-gray-600">No content available yet.</p>
				<?php endif; ?>

				<p class="op-text-sm op-text-gray-500 op-mt-6">Please check back later or contact us for updates.</p>
			</div>
		<?php endif; ?>

	</div>
	<?php else : ?>
		<div class="op-container op-text-center op-bg-white op-p-6 op-rounded-lg op-shadow-md">
			<h1 class="op-text-2xl op-font-bold op-text-gray-800">Site is Live</h1>
			<p class="op-text-gray-600 op-mt-2">Coming Soon mode is disabled. Your site is now accessible to all users.</p>
		</div>
	<?php endif; ?>

</div>
