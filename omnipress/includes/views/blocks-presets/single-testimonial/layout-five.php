<?php
/**
 * Layout Five
 */
?>
<div class="op-testimonial--card op-container op-max-w-md op-p-6 op-rounded-xl op-shadow-md op-relative">

	<div class="op-flex op-justify-center op-mb-4">
		<img
			src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>"
			alt="<?php echo esc_attr( get_the_title() ); ?>"
			class="op-testimonial--thumbnail op-w-20 op-h-20 op-rounded-full op-border-4 op-border-blue-500"
		>
	</div>

	<blockquote class="op-testimonial--content op-text-gray-600 op-text-base op-text-center op-mb-4">
		<svg class="op-w-8 op-h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
			<path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
		</svg>
		<p><?php echo wp_kses_post( $content ?? get_the_content() ); ?>.</p>
	</blockquote>

	<p class="op-testimonial--author-name op-text-lg op-font-semibold op-text-gray-800 op-text-center"><?php echo esc_attr( $author ); ?></p>
	<p class="op-testimonial--author-roleop-text-sm op-text-gray-500 op-text-center"><?php echo esc_html( $author_role ); ?>, <?php echo esc_html( $author_company ); ?></p>
</div>
