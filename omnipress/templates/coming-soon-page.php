<?php
/**
 * Template Name: Full Width for Coming Soon Page
 */

defined( 'ABSPATH' ) || exit;

// We use for only enqueue all the assets of the blocks which used in the current page.
$settings      = \Omnipress\Admin\Extensions\Extensions::get_settings()['coming-soon'];
$template_html = get_the_block_template_html();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php do_action( 'opafg_head' ); ?>
	<?php wp_head(); ?>
	<title><?php bloginfo( 'name' ); ?> - Coming Soon</title>
</head>
<body  <?php body_class(); ?>>
<?php
	wp_body_open();
while ( have_posts() ) {
	the_post();
	the_content();
}

if ( isset( $settings['bot']['status'] ) && 1 === $settings['bot']['status'] ) {
	?>
		<div class="bot-container">
			<div class="bot-avatar"><div class="avatar-notice"></div></div>
			<div class="bot-chat-wrapper" style="display: none">
				<div class="chat-container cf"></div>
				<div class="input"></div>
				<div class="choices cf"></div>
			</div>
		</div>
		<div class="bot-error"><p></p></div>
		<div class="wrap under-bot">
	<?php
}
?>

	<?php
	wp_footer();
	do_action( 'opafg_footer' );
	?>
</body>
</html>
<?php
exit();
