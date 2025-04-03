<?php
namespace Omnipress\Utils;

/**
 * Utility class for handling image uploader.
 */
class ImageUploaderHelper {
	/**
	 * Render a reusable image uploader with Tailwind CSS styling.
	 *
	 * @param string $name The name attribute for the input field.
	 * @param string $instance_id A unique identifier for the uploader instance.
	 * @param string $default_image Optional default image URL.
	 * @param string $classes Optional additional CSS classes for the uploader.
	 * @param string $label Optional label for the uploader.
	 * @param string $context Optional context (e.g., 'taxonomy', 'user', 'post').
	 */
	public static function render( string $name, string $instance_id, string $default_image = '', string $classes = '', string $label = 'Upload Image', string $context = '' ) {
		?>
		<script><?php include OMNIPRESS_PATH . '/assets/library/image-uploader.js'; ?></script>
		<div class="op-image-uploader op-flex op-flex-col op-gap-4 op-p-4 op-border op-border-gray-300 op-rounded-lg" data-instance-id="<?php echo esc_attr( $instance_id ); ?>">
			<input type="hidden" id="image_input_<?php echo esc_attr( $instance_id ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_url( $default_image ); ?>">
			<div id="image_preview_<?php echo esc_attr( $instance_id ); ?>" class="op-relative op-w-full op-h-48 op-bg-gray-100 op-rounded-md op-overflow-hidden <?php echo esc_attr( $classes ); ?>">
				<?php if ( ! empty( $default_image ) ) : ?>
					<img src="<?php echo esc_url( $default_image ); ?>" alt="Uploaded Image" class="op-object-cover op-w-full op-h-full">
				<?php endif; ?>
			</div>

			<div class="op-flex op-gap-3 op-items-center">
				<button id="upload_button_<?php echo esc_attr( $instance_id ); ?>" class="op-inline-block op-px-4 op-py-2 op-bg-blue-500 op-text-white op-font-semibold op-rounded-md hover:op-bg-blue-600">
					<?php esc_html_e( $label, OMNIPRESS_I18N ); ?>
				</button>

				<button id="remove_button_<?php echo esc_attr( $instance_id ); ?>" class="op-inline-block op-px-4 op-py-2 op-bg-red-500 op-text-white op-font-semibold op-rounded-md hover:op-bg-red-600" style="display: <?php echo empty( $default_image ) ? 'none' : 'inline-block'; ?>;">
					<?php esc_html_e( 'Remove Image', OMNIPRESS_I18N ); ?>
				</button>
			</div>

		</div>
		<?php
	}
}
