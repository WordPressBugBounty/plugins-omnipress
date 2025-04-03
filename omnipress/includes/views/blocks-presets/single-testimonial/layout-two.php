<?php

/**
 * Testimonial Layout Two
 */

?>
<div class="op-testimonial--card op-text-center">
	<p class="op-testimonial--content op-text-2xl md:op-text-3xl op-font-semibold op-text-gray-800 op-italic op-mb-6">"<?php echo wp_kses_post( $content ?? get_the_content() ); ?>"</p>
	<div class="op-flex op-justify-center op-items-center">
		<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title() ); ?>" class="op-testimonial--thumbnail op-w-12 op-h-12 op-rounded-full op-mr-4">
		<div>
			<p class="op-testimonial--author-name op-font-medium op-text-gray-700"><?php echo esc_html( $author ); ?></p>
			<p class="op-testimonial--author-role op-text-sm op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
		</div>
	</div>
</div>
