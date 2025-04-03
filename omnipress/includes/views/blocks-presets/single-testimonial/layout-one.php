<?php
/**
 * Testimonial Layout One
 */

?>
<div class="op-testimonial--card op-bg-white op-shadow-md op-rounded-lg op-p-6 op-border">
	<p class="op-testimonial--content op-text-gray-600 op-text-sm op-mb-4">"<?php echo wp_kses_post( $content ?? get_the_content() ); ?>"</p>
	<div class="op-flex op-items-center">
		<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( $post_id ?? get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title( $post_id ) ); ?>" class="op-testimonial--thumbnail op-w-10 op-h-10 op-rounded-full op-mr-3">
		<div>
			<p class="op-testimonial--author-name op-font-semibold op-space-x-0 op-text-gray-800"><?php echo esc_html( $author ); ?></p>
			<p class="op-testimonial--author-role op-text-xs op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
		</div>
	</div>
</div>
