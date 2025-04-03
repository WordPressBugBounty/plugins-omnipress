<?php

/**
 * Testimonial Layout Three
 */

?>
<div class="op-testimonial--card op-flex op-space-x-4">
	<div class="op-w-1 op-bg-blue-500 op-rounded-full"></div>
	<div>
		<p class="op-testimonial--content op-text-gray-600 op-mb-2">"<?php echo wp_kses_post( $content ?? get_the_content() ); ?>"</p>
		<div class="op-flex op-items-center">
			<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title() ); ?>" class="op-testimonial--thumbnail op-w-8 op-h-8 op-rounded-full op-mr-3">
			<div>
				<p class="op-testimonial--author-name op-font-semibold op-text-gray-800"><?php echo esc_html( $author ); ?></p>
				<p class="op-testimonial--author-role op-text-xs op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
			</div>
		</div>
	</div>
</div>
