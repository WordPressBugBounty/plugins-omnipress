<?php
declare(strict_types=1);
namespace Omnipress\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( SettingsFormHelper::class ) ) {
	/**
	 *
	 * Class SettingsFormHelper We validate form sanitize and validate data
	 * Add input Field with error message
	 *
	 * @author WPOmnipress
	 * @package Omnipress
	 * @version 1.0.0
	 * @since 1.6.1
	 *
	 * @access public
	 */
	class SettingsFormHelper {
		/**
		 * @var string
		 */
		private $option_name;
		/**
		 * @var string
		 */
		private $setting_name;
		private $errors;

		public function __construct( $option_name, string $setting, $errors = null ) {
			$this->option_name  = $option_name;
			$this->setting_name = $setting;
			$this->errors       = $errors;
		}

		/**
		 * Opens a settings form for a given option and setting.
		 *
		 * This method initializes the form with the specified option name and setting,
		 * and outputs the necessary HTML form elements. It includes nonce, action,
		 * and option_page fields, as well as settings sections and a submit button.
		 *
		 * @param string $option_name The name of the option group.
		 * @param string $setting     The specific setting name.
		 * @param mixed  $errors      Optional. Errors to display in the form, if any.
		 *
		 * @return self Returns the instance of the class for method chaining.
		 */
		public function form_open( $args = null ) {
			$form_id = isset( $args['id'] ) ? $args['id'] : $this->option_name . '-form';
			?>
			<form class="<?php echo esc_attr( $args['class'] ?? '' ); ?>" id="<?php echo esc_attr( $form_id ); ?>" method="post" action="options.php">
				<?php
					settings_fields( $this->option_name . '_settings' );
					do_settings_sections( $this->option_name . '_settings' );
				?>
			<?php
			return $this;
		}

		/**
		 * Closes the settings form.
		 */
		public function close_form(): void {
			echo '</form>';
		}



		public function render_input(
			string $name,
			string $label,
			string $value = '',
			array $args = array(),
			array $label_args = array(),
			$error_message = null,
			$help = null
		): self {
			$error_message = ! empty( $error_message ) ? $error_message : $this->errors->{$name} ?? '';
			$defaults      = array(
				'type'        => 'text',
				'placeholder' => '',
				'class'       => 'op-w-full op-rounded op-border op-border-gray-300 op-py-2 op-px-3 op-text-gray-700',
				'required'    => false,
			);

			$args          = wp_parse_args( $args, $defaults );
			$error_message = ( ! empty( $error_message ) && is_string( $error_message ) ) ?  $error_message : ''; // phpcs:ignore
			?>
			<label class="op-flex op-items-center op-cursor-pointer <?php echo esc_attr( $label_args['class'] ?? '' ); ?>" for="<?php echo esc_attr( $args['id'] ?? $name ); ?>">
				<div class="op-flex op-items-center op-gap-2 op-mb-2">
					<span><?php echo esc_html_e( $label, OMNIPRESS_I18N ); ?></span>
					<?php if ( ! empty( $help ) ) : ?>
						<div class="op-relative op-inline-block op-group">
							<svg class="op-w-5 op-h-5 op-text-gray-500 op-cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
							</svg>
							<!-- Help Text (Tooltip) -->
							<div class="op-absolute op-hidden group-hover:op-block op-bg-gray-800 op-text-white op-text-[11px] op-rounded-md op-px-2 op-py-1 op-z-10 op--mt-2 op-left-0 op--translate-x-1/2 op-whitespace-nowrap">
								<?php echo esc_html__( $help, 'omnipress' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<input
					type="<?php echo esc_attr( $args['type'] ); ?>"
					name="<?php echo esc_attr( $name ); ?>"
					id="<?php echo esc_attr( $args['id'] ?? $name ); ?>"
					placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
					value="<?php echo esc_attr( $value ); ?>"
					class="!op-my-0 <?php echo esc_attr( $args['class'] ); ?>"
					<?php echo $args['required'] ? 'required' : ''; ?>
				/>
				<?php if ( $error_message ) : ?>
					<p class="error-message op-text-red-500 op-mt-1" data-field="slug"><?php echo esc_html_e( $error_message, OMNIPRESS_I18N ); ?></p>
				<?php endif; ?>
			</label>
			<?php
			return $this;
		}

		/**
		 * Renders a group of radio buttons.
		 *
		 * @param string      $name          The name attribute of the radio buttons.
		 * @param string      $label         The label text for the radio button group.
		 * @param string      $selected      The currently selected value.
		 * @param array       $options       An associative array of options (value => label).
		 * @param array       $args          Additional arguments for the radio buttons (e.g., class).
		 * @param array       $label_args    Additional arguments for the label (e.g., class).
		 * @param string|null $error_message Optional error message to display below the radio buttons.
		 *
		 * @return self
		 */
		public function render_radio(
			string $name,
			string $label,
			string $selected = '',
			array $options = array(),
			array $args = array(),
			array $label_args = array(),
			?string $error_message = null
		): self {
			$error_message = ! empty( $error_message ) ? $error_message : $this->errors->{$name} ?? '';
			$defaults      = array(
				'class'    => 'op-mr-2 op-cursor-pointer',
				'required' => false,
			);

			$args = wp_parse_args( $args, $defaults );
			?>
			<div class="op-block <?php echo esc_attr( $label_args['class'] ?? '' ); ?>">
				<span><?php echo esc_html_e( $label, OMNIPRESS_I18N ); ?></span>
				<div class="op-flex op-items-center op-gap-4">
					<?php foreach ( $options as $option_value => $option_label ) : ?>
						<label class="op-flex op-items-center op-gap-2 op-cursor-pointer">
							<input
								type="radio"
								name="<?php echo esc_attr( $name ); ?>"
								value="<?php echo esc_attr( $option_value ); ?>"
								class="<?php echo esc_attr( $args['class'] ); ?>"
								<?php checked( $selected, $option_value ); ?>
								<?php echo $args['required'] ? 'required' : ''; ?>
							/>
							<span><?php echo esc_html( $option_label ); ?></span>
						</label>
					<?php endforeach; ?>
				</div>
					<?php if ( $error_message ) : ?>
					<p class="error-message op-text-red-500 op-mt-1" data-field="<?php echo esc_attr( $name ); ?>"><?php echo esc_html_e( $error_message, OMNIPRESS_I18N ); ?></p>
				<?php endif; ?>
			</div>
			<?php
			return $this;
		}

		/**
		 * Renders a textarea field.
		 *
		 * @param string      $name          The name attribute of the textarea.
		 * @param string      $label         The label text for the textarea.
		 * @param string      $value         The current value of the textarea.
		 * @param array       $args          Additional arguments for the textarea (e.g., placeholder, rows, cols).
		 * @param array       $label_args    Additional arguments for the label (e.g., class).
		 * @param string|null $error_message Optional error message to display below the textarea.
		 *
		 * @return self
		 */
		public function render_textarea(
			string $name,
			string $label,
			string $value = '',
			array $args = array(),
			array $label_args = array(),
			?string $error_message = null
		): self {
			$error_message = ! empty( $error_message ) ? $error_message : $this->errors->{$name} ?? '';
			$defaults      = array(
				'placeholder' => '',
				'rows'        => 5,
				'cols'        => 30,
				'class'       => 'op-w-full op-rounded op-border op-border-gray-300 op-py-2 op-px-3 op-text-gray-700',
				'required'    => false,
			);

			$args = wp_parse_args( $args, $defaults );
			?>
			<label class="op-block <?php echo esc_attr( $label_args['class'] ?? '' ); ?>" for="<?php echo esc_attr( $args['id'] ?? $name ); ?>">
				<span><?php echo esc_html_e( $label, OMNIPRESS_I18N ); ?></span>
				<textarea
					name="<?php echo esc_attr( $name ); ?>"
					id="<?php echo esc_attr( $args['id'] ?? $name ); ?>"
					placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
					rows="<?php echo esc_attr( $args['rows'] ); ?>"
					cols="<?php echo esc_attr( $args['cols'] ); ?>"
					class="<?php echo esc_attr( $args['class'] ); ?>"
					<?php echo $args['required'] ? 'required' : ''; ?>
				><?php echo esc_textarea( $value ); ?></textarea>
					<?php if ( $error_message ) : ?>
					<p class="error-message op-text-red-500 op-mt-1" data-field="<?php echo esc_attr( $name ); ?>"><?php echo esc_html_e( $error_message, OMNIPRESS_I18N ); ?></p>
				<?php endif; ?>
			</label>
			<?php
			return $this;
		}

		/**
		 * Renders a select dropdown field.
		 *
		 * @param string      $name          The name attribute of the select field.
		 * @param string      $label         The label text for the select field.
		 * @param string      $selected      The currently selected value.
		 * @param array       $options       An array of options ( value => label ).
		 * @param array       $args          Additional arguments for the select field (e.g., class).
		 * @param array       $label_args    Additional arguments for the label (e.g., class).
		 * @param string|null $error_message Optional error message to display below the select field.
		 *
		 * @return self
		 */
		public function render_select(
			string $name,
			string $label,
			string $selected = '',
			array $options = array(),
			array $args = array(),
			array $label_args = array(),
			?string $error_message = null
		): self {
			$error_message = ! empty( $error_message ) ? $error_message : $this->errors->{$name} ?? '';
			$defaults      = array(
				'class'    => 'op-w-full op-rounded op-border op-border-gray-300 op-py-2 op-px-3 op-text-gray-700',
				'required' => false,
			);

			$args = wp_parse_args( $args, $defaults );
			?>
				<label class="op-block <?php echo esc_attr( $label_args['class'] ?? '' ); ?>" for="<?php echo esc_attr( $args['id'] ?? $name ); ?>">
					<span><?php echo esc_html_e( $label, OMNIPRESS_I18N ); ?></span>
					<select
						name="<?php echo esc_attr( $name ); ?>"
						id="<?php echo esc_attr( $args['id'] ?? $name ); ?>"
						class="<?php echo esc_attr( $args['class'] ); ?>"
						<?php echo $args['required'] ? 'required' : ''; ?>
					>
						<?php foreach ( $options as $option_value => $option_label ) : ?>
							<option value="<?php echo esc_attr( $option_value ); ?>" <?php selected( $selected, $option_value ); ?>>
								<?php echo esc_html( $option_label ); ?>
							</option>
						<?php endforeach; ?>
					</select>
						<?php if ( $error_message ) : ?>
						<p class="error-message op-text-red-500 op-mt-1" data-field="<?php echo esc_attr( $name ); ?>"><?php echo esc_html_e( $error_message, OMNIPRESS_I18N ); ?></p>
					<?php endif; ?>
				</label>
			<?php
			return $this;
		}
		/**
		 * Renders a submit button for the form.
		 *
		 * @param string $text         The text displayed on the button.
		 * @param array  $args         Additional arguments for the button (e.g., id, class).
		 * @param string $icon         The icon to display next to the button text.
		 *
		 * @return self
		 */
		public function render_submit( string $text, array $args = array(), string $icon = '' ): self {
			$defaults = array(
				'id'    => 'submit-button',
				'class' => 'op-bg-primary op-text-white op-px-4 op-py-2 op-rounded op-mt-4 op-hover:bg-blue-600',
				'type'  => 'submit',
			);

			$args = wp_parse_args( $args, $defaults );
			?>
			<button
				type="<?php echo esc_attr( $args['type'] ); ?>"
				id="<?php echo esc_attr( $args['id'] ); ?>"
				class="<?php echo esc_attr( $args['class'] ); ?>"
			>
				<?php echo esc_html_e( $text, OMNIPRESS_I18N ); ?>
				<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</button>
			<?php
			return $this;
		}
	}
}
