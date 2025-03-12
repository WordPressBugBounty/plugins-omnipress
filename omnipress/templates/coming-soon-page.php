<?php
/**
 * Template Name: Full Width for Maintenance Page
 */

defined( 'ABSPATH' ) || exit;
?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php do_action( 'opafg_head' ); ?>
		<?php wp_head(); ?>
	</head>
	<body  <?php body_class(); ?>>
	<h1> Hello workd</h1>
	<?php
	wp_body_open();

	while ( have_posts() ) {
		the_post();
		the_content();
	}

	// if ( isset( $settings['bot']['status'] ) && $settings['bot']['status'] === 1 ) {
			//
			?>
		<!--	<div class="bot-container">-->
		<!--		<div class="bot-avatar"><div class="avatar-notice"></div></div>-->
		<!--		<div class="bot-chat-wrapper" style="display: none">-->
		<!--			<div class="chat-container cf"></div>-->
		<!--			<div class="input"></div>-->
		<!--			<div class="choices cf"></div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="bot-error"><p></p></div>-->
		<!--	<div class="wrap under-bot">-->
		<!--		-->
		<?php
		// }
		//
		?>

		<?php
		wp_footer();
		do_action( 'opafg_footer' );
		?>
	</body>
	</html>
	<?php
	exit();
