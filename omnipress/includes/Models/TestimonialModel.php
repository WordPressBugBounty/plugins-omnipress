<?php
// omnipress/includes/Models/TestimonialModel.php
namespace Omnipress;

use Omnipress\Helpers\GeneralHelpers;

class TestimonialModel {
	const TAXONOMY_NAME   = 'testimonial_category';
	const POST_TYPE_LABEL = 'Testimonials';
	const TAXONOMY_LABEL  = 'Testimonial Categories';
	const POST_TYPE_SLUG  = 'op-testimonials';


	public function __construct() {
		add_action( 'init', array( $this, 'register_testimonial_cpt' ) );
		add_action( 'init', array( $this, 'register_testimonial_taxonomies' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_testimonial_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_testimonial_details' ) );
		add_action( 'admin_menu', array( $this, 'add_testimonial_import_submenu' ) );
		add_action( 'wp_ajax_process_csv', array( $this, 'handle_csv_upload' ) );
	}

	function handle_csv_upload() {
		if ( ! check_ajax_referer( 'process_csv_nonce', 'nonce', false ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'You do not have permission to perform this action.' ) );
		}

		$allowed_mime_types = array( 'text/csv', 'text/plain' );

		if ( ! isset( $_FILES['csv_file'] ) || ! in_array( $_FILES['csv_file']['type'], $allowed_mime_types, true ) ) {
			wp_send_json_error( array( 'message' => 'File type is not allowed.' ) );
		}

		$uploaded_file = $_FILES['csv_file'];
		$upload_dir    = wp_upload_dir();
		$file_path     = $upload_dir['path'] . '/' . basename( $uploaded_file['name'] );

		if ( move_uploaded_file( $uploaded_file['tmp_name'], $file_path ) ) {
			$parsed_data = GeneralHelpers::get_csv_data( $file_path );

			if ( is_wp_error( $parsed_data ) ) {
				wp_send_json_error( array( 'message' => $parsed_data->get_error_message() ) );
			}

			$messages = array();
			foreach ( $parsed_data as $testimonial_data ) {
				$name         = sanitize_text_field( $testimonial_data['Name'] );
				$role         = sanitize_text_field( $testimonial_data['Position'] );
				$organization = sanitize_text_field( $testimonial_data['Company'] ?? '' );
				$date         = sanitize_text_field( $testimonial_data['Date'] ?? '' );
				$testimonial  = wp_kses_post( $testimonial_data['Testimonial'] ?? '' );
				$image_url    = esc_url_raw( $testimonial_data['Image'] ?? '' ); // Sanitize the image URL.
				$rating       = intval( $testimonial_data['Rating'] ?? '' );

				$query_args = array(
					'post_type'      => static::POST_TYPE_SLUG,
					'meta_value'     => $name,
					'meta_key'       => 'author_name',
					'posts_per_page' => 1,
					'fields'         => 'ids',
					'status'         => 'publish',
				);

				$existing_posts = new \WP_Query( $query_args );

				if ( $existing_posts->have_posts() ) {
					$messages[] = "Testimonial for '$name' already exists. Skipping.";
					continue;
				}

				$post_id = wp_insert_post(
					array(
						'post_title'   => $testimonial_data['Title'],
						'post_content' => $testimonial,
						'post_status'  => 'publish',
						'post_type'    => static::POST_TYPE_SLUG,
					)
				);

				if ( $post_id ) {
					update_post_meta( $post_id, '_author_role', $role );
					update_post_meta( $post_id, '_author_company', $organization );
					update_post_meta( $post_id, '_author_name', $name );
					// Handle featured image.
					if ( ! empty( $image_url ) ) {
						$this->set_featured_image_from_url( $post_id, $image_url );
					}
					$messages[] = "Testimonial for '$name' successfully added with ID $post_id.";
				} else {
					$messages[] = "Failed to add testimonial for '$name'.";
				}
			}
			if ( file_exists( $file_path ) ) {
				wp_delete_file( $file_path );
			}

			wp_send_json_success( array( 'messages' => $messages ) );
		} else {
			wp_send_json_error( array( 'message' => 'Failed to move uploaded file.' ) );
		}
	}

	/**
	 * Sets a featured image for a post from a given URL.
	 *
	 * @param int    $post_id The ID of the post.
	 * @param string $image_url The URL of the image.
	 */
	function set_featured_image_from_url( $post_id, $image_url ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';

		// Download the image and attach it to the post.
		$attachment_id = media_sideload_image( $image_url, $post_id, null, 'id' );

		if ( ! is_wp_error( $attachment_id ) ) {
			// Set the image as the featured image.
			set_post_thumbnail( $post_id, $attachment_id );
		} else {
			error_log( 'Error downloading image: ' . $attachment_id->get_error_message() );
		}
	}

	function add_testimonial_import_submenu() {
		add_submenu_page(
			'edit.php?post_type=op-testimonials',
			'Import Testimonials',
			'Import',
			'manage_options',
			'testimonial-import',
			array( $this, 'render_testimonial_import_page' )
		);
	}
	public function render_testimonial_import_page() {
		?>
		<div class="wrap op-container mx-auto max-w-md p-8 bg-white shadow-lg rounded-xl op-max-w-lg">
			<h1 class="op-text-3xl op-font-bold text-gray-800">Import Testimonials</h1>
			<p class="op-text-gray-500 mt-2">Upload a CSV file to import testimonials.</p>

			<!-- Step 1: File Upload -->
			<div id="upload-step" class="op-space-y-6">
				<form id="csv-upload-form" enctype="multipart/form-data" class="op-space-y-6">
					<label for="csv-file" class="op-block op-text-sm op-font-medium op-text-gray-700">Upload CSV File:</label>
					<div class="op-border-2 op-border-dashed op-border-gray-300 op-rounded-lg op-p-4 op-text-center">
						<input type="hidden" name="action" value="process_csv">
						<input type="file" id="csv-file" name="csv_file" placeholder="Upload CSV file" accept=".csv" class="op-block op-w-full op-py-2 op-px-4 op-text-sm op-text-gray-500" required aria-label="Upload CSV file" />
					</div>
					<button type="submit" class="op-inline-block op-w-full op-py-3 op-bg-gradient-to-r op-from-blue-600 op-to-blue-400 op-text-white op-font-semibold op-rounded-lg op-shadow-md hover:op-scale-105 hover:op-bg-blue-700 focus:op-outline-none focus:op-ring-2 focus:op-ring-blue-500 transition-all">Upload File</button>
				</form>
			</div>

			<!-- Step 2: Processing State -->
			<div id="processing-step" class="op-hidden op-space-y-6">
				<h2 class="op-text-2xl op-font-bold text-gray-800">Processing File...</h2>
				<p id="processing-message" class="op-text-gray-500">Validating CSV...</p>
				<div class="op-relative op-h-4 op-w-full op-bg-gray-200 op-rounded-full overflow-hidden">
					<div id="progress-bar" class="op-h-full op-bg-blue-600 op-transition-all duration-300 ease-in-out" style="width: 0%;"></div>
				</div>
				<p id="progress-percentage" class="op-text-center op-text-sm op-text-gray-500">0%</p>
				<div class="op-flex op-items-center op-justify-center">
					<div class="op-animate-spin op-h-8 op-w-8 op-border-t-2 op-border-b-2 op-border-blue-500 op-rounded-full"></div>
				</div>
				<button id="cancel-btn" class="op-inline-block op-w-full op-py-2 op-bg-gray-200 op-text-gray-700 op-font-medium op-rounded-lg hover:op-bg-gray-300">Cancel</button>
			</div>

			<!-- Step 3: Success/Error Messages -->
			<div id="result-step" class="op-hidden op-space-y-6">
				<h2 id="result-title" class="op-text-2xl op-font-bold text-gray-800"></h2>
				<ul id="result-messages" class="op-list-disc op-pl-5 op-space-y-2 op-text-gray-600"></ul>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const uploadStep = document.getElementById('upload-step');
				const processingStep = document.getElementById('processing-step');
				const resultStep = document.getElementById('result-step');
				const progressBar = document.getElementById('progress-bar');
				const progressPercentage = document.getElementById('progress-percentage');
				const processingMessage = document.getElementById('processing-message');
				const form = document.getElementById('csv-upload-form');

				form.addEventListener('submit', async (e) => {
					e.preventDefault();

					// Show processing state
					uploadStep.classList.add('op-hidden');
					processingStep.classList.remove('op-hidden');

					let progress = 0; // Initialize progress
					const interval = setInterval(() => {
						if (progress < 90) {
							progress += Math.random() * 5; // Increment progress randomly
							progress = Math.min(progress, 90); // Cap at 90% while waiting for the server response
							progressBar.style.width = `${progress}%`;
							progressPercentage.textContent = `${Math.round(progress)}%`;
						}
					}, 300); // Update every 300ms

					const fileInput = document.getElementById('csv-file');
					const file = fileInput.files[0];

					if (!file) {
						showError('No file selected.');
						return;
					}

					const formData = new FormData();
					formData.append('csv_file', file);
					formData.append('action', 'process_csv'); // WordPress AJAX action
					formData.append('nonce', '<?php echo wp_create_nonce( 'process_csv_nonce' ); ?>');


					try {
						const response = await fetch(ajaxurl, {
							method: 'POST',
							body: formData,
						});

						clearInterval(interval); // Stop the progress bar interval

						const result = await response.json();

						if (result.success) {
							// Complete the progress bar
							progress = 100;
							progressBar.style.width = `${progress}%`;
							progressPercentage.textContent = `${Math.round(progress)}%`;

							// Show success messages
							setTimeout(() => {
								showSuccess(result.data.messages);
							}, 500); // Wait 500ms before showing results
						} else {
							showError(result.data.message);
						}
					} catch (error) {
						clearInterval(interval); // Stop the progress bar interval
						showError('An unexpected error occurred. Please try again.');
					}

					// Hide processing state
					processingStep.classList.add('op-hidden');
					resultStep.classList.remove('op-hidden');
				});

				function showSuccess(messages) {
					document.getElementById('result-title').textContent = 'Success!';
					document.getElementById('result-title').classList.add('op-text-green-600');
					const resultMessages = document.getElementById('result-messages');
					resultMessages.innerHTML = '';
					messages.forEach((message) => {
						const li = document.createElement('li');
						li.textContent = message;
						li.classList.add('op-text-green-700');
						resultMessages.appendChild(li);
					});
				}

				function showError(message) {
					document.getElementById('result-title').textContent = 'Error!';
					document.getElementById('result-title').classList.add('op-text-red-600');
					const resultMessages = document.getElementById('result-messages');
					resultMessages.innerHTML = '';
					const li = document.createElement('li');
					li.textContent = message;
					li.classList.add('op-text-red-700');
					resultMessages.appendChild(li);
				}
			});
		</script>
		<?php
	}

	public function register_testimonial_cpt() {
		register_post_type(
			static::POST_TYPE_SLUG,
			array(
				'labels'       => array(
					'name'                  => __( 'Testimonials', 'omnipress' ),
					'singular_name'         => __( static::POST_TYPE_SLUG, 'omnipress' ),
					'add_new_item'          => __( 'Add New Testimonial', 'omnipress' ),
					'edit_item'             => __( 'Edit Testimonial', 'omnipress' ),
					'new_item'              => __( 'New Testimonial', 'omnipress' ),
					'view_item'             => __( 'View Testimonial', 'omnipress' ),
					'search_items'          => __( 'Search Testimonials', 'omnipress' ),
					'not_found'             => __( 'No testimonials found', 'omnipress' ),
					'not_found_in_trash'    => __( 'No testimonials found in Trash', 'omnipress' ),
					'all_items'             => __( 'All Testimonials', 'omnipress' ),
					'archives'              => __( 'Testimonial Archives', 'omnipress' ),
					'insert_into_item'      => __( 'Insert into testimonial', 'omnipress' ),
					'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'omnipress' ),
					'filter_items_list'     => __( 'Filter testimonials list', 'omnipress' ),
				),
				'public'       => true,
				'rest_base'    => 'testimonials',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'thumbnail', 'editor' ),
				'menu_icon'    => 'dashicons-testimonial',
			)
		);
	}

	public function register_testimonial_taxonomies() {
		register_taxonomy(
			'testimonial_category',
			static::POST_TYPE_SLUG,
			array(
				'labels'       => array(
					'name'          => __( 'Testimonial Categories', 'omnipress' ),
					'singular_name' => __( 'Testimonial Category', 'omnipress' ),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
			)
		);
	}

	public function add_testimonial_meta_boxes() {
		add_meta_box(
			'testimonial_details',
			__( 'Testimonial Details', 'omnipress' ),
			array( $this, 'render_testimonial_meta_box' ),
			static::POST_TYPE_SLUG,
			'normal',
			'high'
		);
	}

	public function render_testimonial_meta_box( $post ) {
		wp_nonce_field( 'save_testimonial_details', 'testimonial_nonce' );
		$author_name    = get_post_meta( $post->ID, '_author_name', true );
		$author_role    = get_post_meta( $post->ID, '_author_role', true );
		$author_company = get_post_meta( $post->ID, '_author_company', true );

		?>
			<p class="op-flex op-gap-5 op-items-center">
				<label for="author_name"><?php esc_html_e( 'Author Name', 'omnipress' ); ?></label>
				<input type="text" id="author_name" name="author_name" value="<?php echo esc_attr( $author_name ); ?>" />
			</p>
			<p class="op-flex op-gap-5 op-items-center">
				<label for="author_role"><?php esc_html_e( 'Author Role', 'omnipress' ); ?></label>
				<input type="text" id="author_role" name="author_role" value="<?php echo esc_attr( $author_role ); ?>" />
			</p>
			<p class="op-flex op-gap-5 op-items-center">
				<label for="author_company"><?php esc_html_e( 'Author Company', 'omnipress' ); ?></label>
				<input type="text" id="author_company" name="author_company" value="<?php echo esc_attr( $author_company ); ?>" />
			</p>
		<?php
	}

	public function save_testimonial_details( $post_id ) {
		if ( ! isset( $_POST['testimonial_nonce'] ) || ! wp_verify_nonce( $_POST['testimonial_nonce'], 'save_testimonial_details' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['author_name'] ) ) {
			update_post_meta( $post_id, '_author_name', sanitize_text_field( $_POST['author_name'] ) );
		}

		if ( isset( $_POST['author_role'] ) ) {
			update_post_meta( $post_id, '_author_role', sanitize_text_field( $_POST['author_role'] ) );
		}
		if ( isset( $_POST['author_company'] ) ) {
			update_post_meta( $post_id, '_author_company', sanitize_text_field( $_POST['author_company'] ) );
		}

		$custom_fields = get_option( 'omnipress_fields', array() );

		foreach ( $custom_fields as $field ) {
			$field_key = '_custom_' . sanitize_key( $field['name'] );
			if ( isset( $_POST[ $field_key ] ) ) {
				if ( 'email' === $field['type'] ) {
					update_post_meta( $post_id, $field_key, sanitizeesc_html_email( $_POST[ $field_key ] ) );
				} elseif ( 'number' === $field['type'] ) {
					update_post_meta( $post_id, $field_key, intval( $_POST[ $field_key ] ) );
				} else {
					update_post_meta( $post_id, $field_key, sanitize_text_field( $_POST[ $field_key ] ) );
				}
			}
		}
	}
}

new TestimonialModel();
