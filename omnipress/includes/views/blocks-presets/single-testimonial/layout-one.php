<?php
/**
 * Testimonial Layout One
 */

?>
<div class="op-testimonial--card op-bg-white op-shadow-md op-rounded-lg op-p-6 op-border">
	<?php if ( false !== $content ) : ?>
	<div class="op-testimonial--content op-text-gray-600 op-text-sm op-mb-4 op-relative"><span class="open-quote op-absolute -op-top-2 -op-left-2">&ldquo;</span><?php echo wp_kses_post( $content ?? get_the_content() ); ?><span class="close-quote op-absolute -op-bottom-2 -op-right-2">&rdquo;</span></div>
	<?php endif; ?>
	<div class="op-flex op-items-center">
		<?php if ( false !== $image ) : ?>
		<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( $post_id ?? get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title( $post_id ) ); ?>" class="op-testimonial--thumbnail op-w-10 op-h-10 op-rounded-full op-mr-3">
		<?php endif; ?>
		<div>
			<?php if ( false !== $author ) : ?>
			<p class="op-testimonial--author-name op-font-semibold op-space-x-0 op-text-gray-800"><?php echo esc_html( $author ); ?></p>
			<?php endif; ?>
			<?php if ( false !== $author_role ) : ?>
			<p class="op-testimonial--author-role op-text-xs op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
