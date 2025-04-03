<?php
/**
 * Testimonials Layout Four
 *
 * @package Omnipress
 */

?>
<div class="op-testimonial--card op-container op-max-w-md op-p-6 op-bg-gray-50 op-rounded-xl op-shadow-md">
	<div class="op-flex op-items-center op-mb-4">
		<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title() ); ?>"  class="op-testimonial--thumbnail op-w-12 op-h-12 op-rounded-full op-mr-4">
		<div>
			<p class="op-testimonial--author-name op-text-lg op-font-semibold op-text-gray-800"><?php echo esc_attr( $author ); ?></p>
			<p class="op-testimonial--author-role op-text-sm op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
		</div>
		<span class="op-text-5xl op-font-bold op-text-gray-800 op-ml-auto">“</span>
	</div>

	<div class="op-border-t op-border-solid op-border-gray-200 op-mb-4"></div>

	<blockquote>
		<p class="op-testimonial--content op-text-gray-600 op-text-base">
			<?php echo wp_kses_post( $post->post_content ?? get_the_content() ); ?>
		</p>
	</blockquote>
</div>
