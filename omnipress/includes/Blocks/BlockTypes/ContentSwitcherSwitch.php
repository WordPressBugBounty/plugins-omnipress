<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Class ContentSwitcher.
 *
 * @author Omnipressteam
 * @package Omnipress/Block
 *
 * @since V1.1.5
 */
class ContentSwitcherSwitch extends AbstractBlock {

	/**
	 * All existing layouts
	 *
	 * @return array
	 */
	public function layouts( $left_text, $right_text ): array {
		return array(
			'layout_1' => sprintf(
				'<label data-wp-init="callbacks.initSwitcherSwitch" data-wp-watch="callbacks.watchStyles" class="switch-tab  switch-track" for="switch">
				<div data-wp-init="callbacks.initSwitcher" class="toggle slide-indicator switch-indicator"></div>
				<div class="switch-label-wrapper">
					<p class="op-switcher__text switch-label" data-wp-on--click="callbacks.activateLeftContent">' . $left_text . '</p>
					<p class="op-switcher__text switch-label" data-wp-on--click="callbacks.activateRightContent">' . $right_text . '</p>
				</div>
    		</label>',
				! empty( $left_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : '',
				! empty( $right_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : ''
			),

			'layout_2' => sprintf(
				'<div data-wp-init="callbacks.initSwitcherSwitch" data-wp-watch="callbacks.watchStyles" class="op-block__switcher--layout-two switch-wrapper">
				<p class="op-switcher__text switch-label">' . $left_text . '</p>
				<input data-wp-on--change="callbacks.onToggleSwitch" class="switch content-switcher__switch switch-track switch-indicator switch-input" type="checkbox"/>
				%s
			</div>',
				! empty( $left_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : '',
				! empty( $right_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : ''
			),

			'layout_3' => sprintf(
				'<div data-wp-init="callbacks.initSwitcherSwitch" data-wp-watch="callbacks.watchStyles" class="op-switch-wrapper">
				<p class="op-switcher__text switch-label">' . $left_text . '</p>
				<label class="switch-track">
					<span data-wp-on--click="callbacks.onToggleSwitch" class="content-switcher__switch switch-indicator"></span>
				</label>
				<p class="op-switcher__text switch-label">' . $right_text . '</p>
    		</div>',
				! empty( $left_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : '',
				! empty( $right_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : ''
			),

			'layout_4' => sprintf(
				'<div data-wp-init="callbacks.initSwitcherSwitch" data-wp-watch="callbacks.watchStyles" class="switch-wrapper"><p class="op-switcher__text switch-label">' . $left_text . '</p>
					<label class="switch-track">
						<span  data-wp-on--click="callbacks.onToggleSwitch" class="slider content-switcher__switch switch-indicator"></span>
					</label>
				<p class="op-switcher__text switch-label">,' . $right_text . '</p></div>',
				! empty( $left_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : '',
				! empty( $right_text ) ? '<p class="op-switcher__text switch-label">' . $right_text . '</p>' : ''
			),
		);
	}

	/**
	 * Get current styles.
	 *
	 * @return array
	 */
	public function get_styles(): array {
		return array(
			'layout_1' => '.switcher-layout_1 .toggle,.switcher-layout_1 label{border-radius:100px;display:block}.toggle.active-switcher,.switcher-layout_1 label.active-switcher{transform:translate(100%)} .switcher-layout_1 label{width:100%;background-color:rgba(0,0,0,.1);border-radius:100px;position:relative;cursor:pointer;display:flex;align-items:center;padding:20px 0}.toggle{position:absolute;width:50%;height:100%;transform:translate(0);box-shadow:0 2px 15px rgba(0,0,0,.15);transition:transform .3s cubic-bezier(.25,.46,.45,.94)}.switch-label-wrapper{font-size:90%;font-weight:bolder;width:100%;margin-top:.5%;position:absolute;display:flex;justify-content:space-between;-webkit-user-select:none;-moz-user-select:none;user-select:none}.switch-label-wrapper>*{flex-grow:1;text-align:center}.dark{opacity:.5}',

			'layout_2' => '.op-block__switcher--layout-two{display:flex;align-items:center;gap:20px}.op-block__switcher-contents{width:100%}.switch-track{position:relative;height:1.5rem;width:3rem;cursor:pointer;-moz-appearance:none;appearance:none;-webkit-appearance:none;border-radius:9999px;transition:all .3s ease}.switch-track:active{border:unset;outline:unset}.switch-indicator::before{position:absolute;content:"";left:-.1rem;top:-.1rem;display:block;height:1.6rem;width:1.6rem;cursor:pointer;border:1px solid rgba(100,116,139,.527);border-radius:9999px;box-shadow:0 3px 10px rgba(100,116,139,.327);transition:all .3s ease;z-index:999;}.switch-indicator.active::before{transform:translateX(100%);border-color:currentcolor}.switch-indicator:hover::before{box-shadow:0 0 0 8px rgba(0,0,0,.15)}.switch-indicator.active:hover::before{box-shadow:0 0 0 8px rgba(236,72,153,.15)}',

			'layout_3' => '.switcher-layout_3 .op-switch-wrapper{display:flex;align-items:center;gap:12px}.switcher-layout_3 .switch-track{font-size:17px;position:relative;display:inline-block;width:3.5em;height:2em}.switcher-layout_3 .switch-track input{opacity:0;width:0;height:0}.switcher-layout_3 .switch-indicator{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;transition:.4s;border-radius:10px}.switcher-layout_3 .switch-indicator::before{position:absolute;content:"";height:1.4em;width:1.4em;border-radius:8px;left:.3em;bottom:.3em;transform:rotate(270deg);transition:.4s}.switcher-layout_3 .switch-track:active .switch-indicator{box-shadow:0 0 1px #2196f3}.switcher-layout_3 .switch-track .active.switch-indicator::before{transform:translateX(1.5em)}',

			'layout_4' => '.switch-tab{position:relative;display:inline-block;width:5em;height:1em}.switch-indicator{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;transition:.4s;border-radius:30px}.switch-indicator::before{position:absolute;content:"";height:3.4em;width:1.4em;border-radius:20px;left:.3em;bottom:-1.3em;background-color:#fff;box-shadow:0 0 5px rgba(0,0,0,.6);transition:1s cubic-bezier(.49,-1.3,.45,2.44)}.switch-indicator.active{background-color:#2196f3}.switch-indicator.active::before{transform:translateX(2.5em) rotateZ(-180deg)!important}',
		);
	}

	/**
	 * @inheritDoc
	 */
	public function render( $attributes, $content, $block ) {

		$block->parsed_block['attrs'] = $attributes;
		$layouts                      = $this->layouts( esc_html( $attributes['tabs'][0] ), esc_html( $attributes['tabs'] [1] ) );
		$current_style                = $this->get_styles();

		$switch_classes = array(
			'layout_1' => 'switch',
			'layout_2' => 'switch',
			'layout_3' => 'switch-slider',
			'layout_4' => 'switch-slider',
		);

		$wrapper_attributes = get_block_wrapper_attributes(
			array(
				'class'     => "op-block__switcher-switch op-{$attributes['blockId']} switcher-{$attributes['variation']}",
				'data-type' => 'omnipress/content-switcher-switch',
			)
		);

		wp_register_style( 'omnipress-content-switcher-switch', null, array(), OMNIPRESS_VERSION, 'all' );

		wp_add_inline_style( 'omnipress-content-switcher-switch', $current_style[ $attributes['variation'] ] );

		wp_enqueue_style( 'omnipress-content-switcher-switch' );

		return sprintf(
			'<div %s> %s</div>',
			$wrapper_attributes,
			$layouts[ $attributes['variation'] ],
		);
	}
}
