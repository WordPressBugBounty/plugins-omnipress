<?php

use Omnipress\Core\BasePostFields;



$post_fields = new BasePostFields( get_the_ID(), $hidden_fields, $linked_attributes ?? array( 'title', 'author', 'date' ) );

// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<div class="op-block__post-grid-card">
	<div class="op-block__post-grid-card-image">
		<?php
			echo $post_fields->render_thumbnail( 'op-block__post-grid-card-image' );
			echo $post_fields->render_categories( 'op-block__post-grid-card-categories', ' ' );
		?>
	</div>
	<div class="op-block__post-grid-card-content">
	<div class="op-block__post-grid-card-meta">
		<div class="op-block__post-grid-card-date">
		<?php echo $post_fields->render_date( 'op-block__post-grid-card-date' ); ?>
		</div>
		<div class="op-block__post-grid-card-author">
		<?php echo $post_fields->render_author( 'op-block__post-grid-card-author' ); ?>
		</div>
	</div>
	<?php echo $post_fields->render_title( 'op-block__post-grid-card-title', true, 'h4' ); ?>
	<?php echo $post_fields->render_excerpt( 'op-block__post-grid-card-description' ); ?>
	</div>
</div>
