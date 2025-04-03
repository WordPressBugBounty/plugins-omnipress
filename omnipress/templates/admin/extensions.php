<?php

use Omnipress\Admin\Extensions\Extensions;

$extensions_menus = apply_filters(
	'omnipress_extensions_menus',
	array()
);

// todo: We Will added other settings when needed.
// $extensions_menus[] = array(
// 'label' => 'Other Settings',
// 'slug'  => 'others',
// );

$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : $extensions_menus[0]['slug']; // phpcs:ignore

// Showing notice on settings changes.
settings_errors();
?>
<div id="omnipress-extensions-wrapper" class="op-fixed op-h-[calc(100vh-80px)] op-overflow-y-auto op-top-11 md:op-top-8 op-left-0 md:op-left-[36px] lg:op-left-[160px]  op-right-0 op-bg-gray-50 op-font-poppins">
	<!-- Notice / Advertisement -->
	<!-- <section class="op-bg-secondary op-px-5 op-bg-gradient-to-l op-from-[#d7e471] op-to-[#00b4d8]">
		<div class="op-max-w-[1128px] op-mx-auto op-flex op-justify-center op-items-center op-py-3">
			<p class="op-text-white op-p-0 op-m-0">🔔 More powerful extensions coming soon—stay tuned for future updates!</p>
		</div>
	</section> -->

	<!-- Header -->
	<header class="op-bg-primary op-px-5">
		<div class="op-max-w-[1128px] op-mx-auto op-flex op-flex-col op-items-center op-gap-4 op-pt-14 op-pb-12">
			<h1 class="op-text-3xl op-text-white op-font-bold op-m-0 op-p-0 op-text-center">
				<?php esc_html_e( 'Omnipress Extensionss', OMNIPRESS_I18N ); ?>
			</h1>
			<strong class="op-text-base op-text-[#d9f500]">Enhance Your Website with Custom Features</strong>
			<p class="op-max-w-[700px] op-content-center op-text-center op-my-0 op-mx-auto op-p-0 op-text-white/80 op-text-[13px]"><?php echo esc_html__( "Take full control of your website's extra features. Manage the Coming Soon mode, insert custom scripts(JS/CSS), and create and customize website pre-loader to enhance user experience and functionality.", OMNIPRESS_I18N ); ?></p>
		</div>
	</header>

	<!-- Navigation Menu -->
	<section class="op-bg-primary op-px-5">
		<div class="op-max-w-[1128px] op-mx-auto">
			<nav class="op-flex op-flex-wrap op-items-center op-justify-center">
				<?php foreach ( $extensions_menus as $extensions_menu ) : ?>
				<a
					href="?page=omnipress-extensions&tab=<?php echo esc_attr( $extensions_menu['slug'] ); ?>"
					class="op-py-3 op-px-6 op-hover:text-gray-900 op-cursor-pointer op-no-underline op-font-medium op-text-[14px] op-text-white focus:op-bottom-0 focus:op-outline-none hover:op-text-white/80 <?php echo $extensions_menu['slug'] === $active_tab ? 'op-bg-gray-50 !op-text-primary op-rounded-t-[2px]' : ''; ?>"
				>
					<?php echo esc_html( $extensions_menu['label'] ); ?>
				</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</section>

	<!-- Tab Content -->
	<section class="op-box-border op-relative op-px-5">
		<div class="op-max-w-[1128px] op-mx-auto op-py-20">
			<?php do_action( 'omnipress_extensions_' . $active_tab ); ?>

			<div class="">
				<form method="post" action="options.php">
					<input type="hidden" name="<?php echo esc_attr( Extensions::OPTION_NAME . '[tab]' ); ?>" value="<?php echo esc_attr( $active_tab ); ?>" />

					<?php settings_fields( Extensions::OPTION_NAME . '_settings' ); ?>

					<?php do_action( 'omnipress_render_extensions_form_field_' . $active_tab ); ?>
				</form>
			</div>
		</div>
	</section>
</div>
