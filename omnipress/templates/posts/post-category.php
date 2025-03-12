<?php
/**
 * Display category layout with pagination.
 *
 * @package MyPlugin\Views
 */

$paged      = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // Get current page number
$categories = get_categories(
	array(
		'taxonomy'   => 'category',
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => false,
		'parent'     => 0,
		'number'     => 2,
		'paged'      => $paged,
	)
);
?>

<div class="category-grid">
	<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
		<?php foreach ( $categories as $category ) : ?>
			<?php
				$image_url     = get_term_meta( $category->term_id, 'thumbnail', true );
				$category_link = get_term_link( $category );
			?>
			<div class="category-card">
				<?php if ( $image_url ) : ?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" class="category-image">
				<?php else : ?>
					<div class="category-placeholder">
						<span><?php esc_html_e( 'No Image', 'omnipress' ); ?></span>
					</div>
				<?php endif; ?>
				<div class="category-content">
					<h3 class="category-title">
						<a href="<?php echo esc_url( $category_link ); ?>" class="is-title-link">
							<?php echo esc_html( $category->name ); ?>
						</a>
					</h3>
					<p class="category-description">
						<?php echo wp_kses_post( $category->description ); ?>
					</p>
					<p class="category-count">
						<?php
						/* translators: %d: number of posts in category */
						printf( esc_html__( '%d Posts', 'omnipress' ), esc_html( $category->count ) );
						?>
					</p>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p class="category-no-categories"><?php esc_html_e( 'No categories found.', 'omnipress' ); ?></p>
	<?php endif; ?>
</div>

<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
	<div class="category-pagination">
		<?php
		echo paginate_links(
			array(
				'total'     => ceil( wp_count_terms( 'category', array( 'hide_empty' => false ) ) / 2 ),
				'current'   => $paged,
				'prev_text' => __( '&laquo; Previous', 'omnipress' ),
				'next_text' => __( 'Next &raquo;', 'omnipress' ),
			)
		);
		?>
	</div>
<?php endif; ?>
