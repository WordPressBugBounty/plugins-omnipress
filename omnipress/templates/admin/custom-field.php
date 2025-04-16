<?php

use Omnipress\Utils\SettingsFormHelper;
$error_message = isset( get_settings_errors( 'omnipress_fields' )['0']['message'] ) ? json_decode( get_settings_errors( 'omnipress_fields' )['0']['message'] ?? '{}' ) : false;
$form_handler  = new SettingsFormHelper( 'omnipress_fields', 'omnipress_fields', isset( $error_message->errors ) ? $error_message->errors : array() );
?>
<div class="op-max-w-4xl op-mx-auto op-p-4">
	<h2 class="op-text-lg op-font-semibold op-mb-4">Items</h2>
	<div class="op-bg-white op-shadow-sm op-rounded-lg op-overflow-hidden">
		<div class="op-grid op-grid-cols-6 op-gap-4 op-bg-gray-50 op-p-4 op-font-semibold op-text-gray-700 op-border-b op-border-gray-200">
			<div>#</div>
			<div>Name</div>
			<div>Slug</div>
			<div>Post Types</div>
			<div>Type</div>
			<div>Actions</div>
		</div>
		<div class="op-divide-y op-divide-gray-200 op-max-h-[500px] op-overflow-y-auto" id="items-list">
			<?php
				$option_name = 'omnipress_fields';
				$array       = get_option( $option_name, array() );
				$serial_no   = 0;
			?>
			<?php if ( ! empty( $array ) ) : ?>
				<?php
				foreach ( $array as $index => $item ) :
					++$serial_no;
					?>

					<div class="op-grid op-grid-cols-6 op-gap-4 op-p-4 op-items-center" data-index="<?php echo esc_attr( $index ); ?>">
							<div><?php echo esc_html_e( $serial_no, OMNIPRESS_I18N ); ?></div>
							<div class="op-text-gray-800"><?php echo esc_html( $item['name'] ? $item['name'] : '[empty]' ); ?></div>
							<div class="op-text-gray-600"><?php echo esc_html( $item['slug'] ? $item['slug'] : '[empty]' ); ?></div>

							<div class="op-flex op-gap-2 op-flex-wrap op-text-center">
								<?php if ( ! empty( $item['post_types'] ) ) : ?>
									<?php foreach ( $item['post_types'] as $post_type ) : ?>
										<span class="op-bg-blue-100 op-text-blue-800 op-text-xs op-font-medium op-px-4 op-py-2 op-pb-2.5 op-rounded-full"><?php echo esc_html( $post_type ); ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span class="op-text-xs op-text-gray-500 op-italic">None</span>
								<?php endif; ?>
							</div>
							<div class="op-flex">
								<span class="op-bg-blue-100 op-text-blue-800 op-text-xs op-font-medium op-px-2.5 op-py-0.5 op-pb-1 op-rounded-full"><?php echo esc_html( $item['type'] ?? 'text' ); ?></span>
							</div>

							<div class="op-flex op-items-center op-gap-2">
								<button onclick="openModal('edit', <?php echo esc_attr( $index ); ?>)" class="op-bg-blue-100 op-inline-flex op-items-center op-justify-center op-cursor-pointer op-text-blue-600 op-h-8 op-w-8 op-rounded-sm op-hover:bg-blue-200 op-transition op-duration-200" title="Edit">
									<svg class="op-w-4 op-h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z"></path>
									</svg>
								</button>

								<!-- Deleted Item  -->
								<?php
								$form_handler
								->form_open(
									array(
										'id'    => 'delete_item',
										'class' => '',
									)
								)
								->render_input(
									'omnipress_fields[delete_item]',
									'',
									$index,
									array( 'type' => 'hidden' )
								)
								->render_submit(
									'',
									array( 'class' => 'op-bg-red-100 op-text-red-600 op-h-8 op-w-8 op-rounded-sm op-inline-flex op-items-center op-cursor-pointer op-justify-center op-rounded-full op-hover:!bg-red-200 op-transition op-duration-200 op-mb-2' ),
									'<svg class="op-w-4 op-h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
										</svg>'
								)
								->close_form();
								?>
							</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
	<!-- Add New Button -->
	<div class="op-mt-4 op-flex op-justify-end">
		<button onclick="openModal('add')" class="op-bg-blue-600 op-text-white op-font-medium op-text-sm op-px-4 op-py-2 op-rounded-lg op-hover:bg-blue-700 op-flex op-items-center op-gap-2 op-cursor-pointer">
			<svg class="op-w-4 op-h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
			</svg>
			Add New
		</button>
	</div>
</div>

<!-- Modal -->
<div id="item-modal" class="op-hidden op-fixed op-inset-0 op-bg-black op-bg-opacity-50 op-flex op-items-center op-justify-center">
	<div class="op-bg-white op-rounded-lg op-w-full op-max-w-2xl op-p-6 op-space-y-6 op-max-h-[80vh] op-overflow-y-auto">
		<h3 id="modal-title" class="op-text-lg op-font-semibold">Add New Item</h3>
		<?php
		$form_handler
		->form_open(
			array(
				'id'    => 'item-form',
				'class' => 'op-space-y-5',
			)
		)
		->render_select(
			'omnipress_fields[type]',
			'Field Type',
			$error_message->data->type ?? '',
			array(
				'text'   => 'Text',
				'number' => 'Number',
				'date'   => 'Date',
				'email'  => 'Email',
				'tel'    => 'Phone',
			),
			array(
				'class' => 'op-border op-border-gray-300 op-rounded-md op-px-3 op-py-2 op-text-sm op-mt-2',
			),
			array(
				'class' => 'op-grid op-text-sm op-font-medium op-text-gray-700',
			)
		)
		->render_input(
			'omnipress_fields[name]',
			'Field Name',
			$error_message->data->name ?? '',
			array(
				'class' => 'op-border op-border-gray-300 op-rounded-md op-px-3 op-py-2 op-text-sm op-mt-2',
				'id'    => 'item-name',
			),
			array(
				'class' => 'op-grid op-text-sm op-font-medium op-text-gray-700',
			)
		)
		->render_input(
			'omnipress_fields[slug]',
			'Field Slug',
			$error_message->data->slug ?? '',
			array(
				'class' => 'op-border op-border-gray-300 op-rounded-md op-px-3 op-py-2 op-text-sm op-mt-2',
				'id'    => 'item-slug',
			),
			array(
				'class' => 'op-grid op-text-sm op-font-medium op-text-gray-700',
			)
		);
		$ignored_post_types = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'product', 'customize_changeset', 'oembed_cache', 'user_request', 'wp_block' );

		$post_types = array_filter(
			get_post_types(
				array(
					'public' => true,
				),
				'objects'
			),
			function ( $post_type ) use ( $ignored_post_types ) {
				return ! in_array( $post_type->name, $ignored_post_types, true );
			}
		);
		?>
			<input type="hidden" name="omnipress_fields[edit_index]" id="edit-index" />
			<div>
				<label class="op-block op-text-sm op-font-medium op-text-gray-700">Post Types</label>
				<div class="op-mt-1 op-space-y-2">
					<?php foreach ( $post_types as $post_type ) : ?>
						<label class="op-flex op-items-center">
							<input
								type="checkbox"
								name="omnipress_fields[post_types][]"
								value="<?php echo esc_attr( $post_type->name ); ?>"
								class="op-h-4 op-w-4 op-text-blue-600 op-border-gray-300 op-rounded"
								<?php echo checked( in_array( $post_type->name, $error_message->data->post_types ?? array(), true ) ); ?>
							>
							<span class="op-ml-2 op-text-sm op-text-gray-700"><?php echo $post_type->label; ?></span>
						</label>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Form Actions -->
			<div class="op-flex op-gap-2">
				<button type="button" onclick="closeModal()" class="op-bg-gray-200 op-text-gray-700 op-font-medium op-text-sm op-px-4 op-py-2 op-rounded-lg op-hover:bg-gray-300 op-cursor-pointer">Close Field</button>
				<button type="submit" id="field-submit" class="op-bg-blue-600 op-text-white op-font-medium op-text-sm op-px-4 op-py-2 op-rounded-lg op-hover:bg-blue-700 op-cursor-pointer">Save</button>
			</div>

		<?php $form_handler->close_form(); ?>
	</div>
</div>

<script>
	// Modal handling
	function openModal(action, index = null) {
		const modal = document.getElementById('item-modal');
		const form = document.getElementById('item-form');
		const title = document.getElementById('modal-title');
		const editIndex = document.getElementById('edit-index');
		const itemName = document.getElementById('item-name');
		const itemSlug = document.getElementById('item-slug');
		const postTypes = form.querySelectorAll('input[name="item_post_types[]"]');
		const submitButton = document.getElementById('field-submit');

		itemName.addEventListener('focusout', (e) => {
			const slug  = e.target.value.trim().toLowerCase().replace(/\s+/g, '_');
			itemSlug.value =slug;
		} )

		form.addEventListener('submit', (e) => {
			submitButton.innerHTML = 'Saving...';
			submitButton.disabled = true;
		})

		// Reset form
		form.reset();
		editIndex.value = '';
		postTypes.forEach(checkbox => checkbox.checked = false);

		if (action === 'edit' && index !== null) {
			title.textContent = 'Edit Item';
			editIndex.value = index;

			// Fetch item data
			const row = document.querySelector(`#items-list > div[data-index="${index}"]`);
			itemName.value = row.children[1].textContent === '[empty]' ? '' : row.children[1].textContent;
			itemSlug.value = row.children[2].textContent === '[empty]' ? '' : row.children[2].textContent;
			const postTypeElements = row.children[3].querySelectorAll('span:not(.op-italic)');
			postTypeElements.forEach(pt => {
				const checkbox = form.querySelector(`input[value="${pt.textContent}"]`);
				if (checkbox) checkbox.checked = true;
			});
		} else {
			title.textContent = 'Add New Item';
		}

		modal.classList.remove('op-hidden');
	}

	function closeModal() {
		const modal = document.getElementById('item-modal');
		modal.classList.add('op-hidden');
	}
</script>
