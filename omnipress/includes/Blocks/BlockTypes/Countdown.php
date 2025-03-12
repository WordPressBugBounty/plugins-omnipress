<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;


/**
 * Class Accordion
 *
 * @author Ishwor Khadka <asishwor@gmail.com>
 * @package app\core
 */

class Countdown extends AbstractBlock {
	private array $default_attrs = array(
		'wrapper' => array(
			'padding' => array(
				'top'    => '12px',
				'right'  => '12px',
				'bottom' => '12px',
				'left'   => '12px',
			),
		),
		'card'    => array(
			'padding' => array(
				'top'    => '12px',
				'right'  => '12px',
				'bottom' => '12px',
				'left'   => '12px',
			),
		),
	);

	/**
	 * @inheritDoc
	 */
	public function render( array $attributes, string $content, \WP_Block $block ): string {
		$this->block_attributes = $attributes;
		$this->block_name       = $block->name;

		$target_time      = $attributes['expiredDate'] ?? false;
		$timezone         = $attributes['timezone'] ?? 'UTC';
		$tz               = new \DateTimeZone( $timezone );
		$target_date_time = new \DateTime( $target_time, new \DateTimeZone( $timezone ) );

		$target_date_time->setTimezone( $tz );

		$current_date_time = new \DateTime( 'now', $tz );

		$days    = 0;
		$hours   = 0;
		$minutes = 0;
		$seconds = 0;

		$wrapper_attrs = array(
			'data-start'    => $attributes['startDate'] ?? false,
			'data-duration' => $attributes['recurringInterval'] ?? false,
			'data-timezone' => $attributes['timezone'] ?? 'UTC',
		);

		if ( ! $attributes['isRecurring'] ) {
			if ( $target_date_time < $current_date_time ) {
				return $content;
			}

			$interval = $current_date_time->diff( $target_date_time );

			$days    = $interval->days;
			$hours   = $interval->h;
			$minutes = $interval->i;
			$seconds = $interval->s;

			$wrapper_attrs = array(
				'data-expired'  => $attributes['expiredDate'] ?? false,
				'data-timezone' => $attributes['timezone'] ?? 'UTC',
			);
		}

		$wrapper_attrs = $this->get_block_wrapper_attributes(
			'op-block__countdown-block is-layout-' . ( $attributes['layoutType'] ?? 'two' ),
			$wrapper_attrs
		);

		return sprintf(
			'<div %s><div class="countdown-container">%s</div></div>',
			$wrapper_attrs,
			$this->get_layouts( $attributes['layoutType'] ?? 'two', $days, $hours, $minutes, $seconds )
		);
	}
	public function get_layouts( string $layout_type = 'two', int $days, int $hours, int $minutes, int $seconds ) {
		$layouts = array(
			'one' => array(
				'html' => sprintf(
					'</div><div class="countdown-card"><span class="number">%d</span></div><span class="label-top">ONLY</span><span class="label-bottom">%s LEFT</span></div>',
					$days > 0 ? $days : $hours,
					$days > 0 ? __( 'Days', 'omnipress' ) : __( 'Hours', 'omnipress' )
				),
			),
			'two' => array(
				'html' => sprintf(
					' <div class="countdown-card">
						  <span id="days" class="number">%d</span>
						  <div class="countdown-card-title label" aria-label="DAYS">%s</div>
					   </div>
					   <span class="separator">|</span>
					   <div class="countdown-card">
						  <span id="hours" class="number">%d</span>
						  <div class="countdown-card-title label" aria-label="HOURS">%s</div>
					   </div>
					   <span class="separator">|</span>
					   <div class="countdown-card">
						  <span id="minutes" class="number">%d</span>
						  <div class="countdown-card-title label" aria-label="MINUTES">%s</div>
					   </div>
					   <span class="separator">|</span>
					   <div class="countdown-card">
						  <span id="seconds" class="number">%d</span>
						  <div class="countdown-card-title label" aria-label="SECONDS">%s</div>
					   </div>',
					$days,
					__( 'Days', 'omnipress' ),
					$hours,
					__( 'Hours', 'omnipress' ),
					$minutes,
					__( 'Minutes', 'omnipress' ),
					$seconds,
					__( 'Seconds', 'omnipress' )
				),
			),
		);

		return $layouts[ $layout_type ]['html'] ?? '';
	}
}
