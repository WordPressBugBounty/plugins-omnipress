<?php

/**
 * Testimonial Layout Two
 */

?>
<div class="op-testimonial--card op-text-center">
	<?php if ( false !== $content ) : ?>
		<div class="op-testimonial--content op-text-2xl md:op-text-3xl op-font-semibold op-text-gray-800 op-italic op-mb-6 op-relative">
			<span class="open-quote op-absolute -op-top-2 -op-left-2">&ldquo;</span>
				<?php echo wp_kses_post( $content ?? get_the_content() ); ?>
			<span class="close-quote op-absolute -op-bottom-2 -op-right-2">&rdquo;</span>
		</div>
	<?php endif; ?>

	<div class="op-flex op-justify-center op-items-center">
		<?php if ( false !== $image ) : ?>
		<img src="<?php echo esc_url( $image ?? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ); ?>" alt="<?php echo esc_attr( $title ?? get_the_title() ); ?>" class="op-testimonial--thumbnail op-w-12 op-h-12 op-rounded-full op-mr-4">
		<?php endif; ?>
		<div>
			<?php if ( false !== $author ) : ?>
			<p class="op-testimonial--author-name op-font-medium op-text-gray-700"><?php echo esc_html( $author ); ?></p>
			<?php endif; ?>
			<?php if ( false !== $author_role ) : ?>
			<p class="op-testimonial--author-role op-text-sm op-text-gray-500"><?php echo esc_html( $author_role ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
