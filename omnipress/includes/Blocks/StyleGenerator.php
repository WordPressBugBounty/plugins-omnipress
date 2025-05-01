<?php

namespace Omnipress\Blocks;

use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Utils\StyleGeneratorHelper;

defined( 'ABSPATH' ) || exit;

/**
 * Class StyleGenerator
 *
 * This class is responsible for generating CSS styles based on the provided style attributes and selector.
 */
class StyleGenerator {

	private $breakpoints = array(
		'sm' => 768,
		'md' => 991,
		'lg' => 1200,
	);


	/**
	 * Converts attributes into a CSS string.
	 *
	 * @param array  $attributes The attributes.
	 * @param string $selector   The CSS selector.
	 *
	 * @return string The generated CSS.
	 */
	public static function create_css_string( array $attributes, string $selector ): string {
		$css = '';

		foreach ( $attributes as $key => $value ) {

			if ( empty( $value ) ) {
				continue;
			}

			switch ( $key ) {
				case 'hover':
				case 'active':
				case 'focus':
					$selector = trim( $selector );

					$css .= self::generate_css( $value, "$selector:$key" );
					break;

				default:
					$css .= self::generate_css( $value, $selector );
					break;
			}
		}

		return $css;
	}

		/**
		 * Generates CSS for given attributes.
		 *
		 * @param array|string $attributes The attributes.
		 * @param string       $selector   The selector.
		 *
		 * @return string The generated CSS.
		 */
	private static function generate_css( $attributes, string $selector = '' ): string {
		$css = '';

		if ( GeneralHelpers::is_valid_array( $attributes ) ) {
			foreach ( $attributes as $key => $value ) {
				if ( empty( $value ) ) {
					continue;
				}

				$kebab_case_key = StyleGeneratorHelper::changeAttributesKeyIntoValidCssProperty( $key );

				switch ( trim( $kebab_case_key ) ) {
					case 'filter':
						$filter_value = StyleGeneratorHelper::generateFilterCSS( $value );
						if ( ! empty( $filter_value ) ) {
							$css .= 'filter:' . $filter_value . ';';
						}
						break;

					case 'transform':
						$transform_value = StyleGeneratorHelper::generateTransformStyles( $value );
						if ( ! empty( $transform_value ) ) {
							$css .= 'transform:' . $transform_value . ';';
						}
						break;

					case 'box-shadow':
					case 'boxShadow':
						$box_shadow_value = StyleGeneratorHelper::generate_shadow_styles( $value );
						if ( ! empty( $box_shadow_value ) ) {
							$css .= 'box-shadow:' . $box_shadow_value . ';';
						}
						break;

					case 'text-shadow':
					case 'textShadow':
						$text_shadow_value = StyleGeneratorHelper::generateTextShadowCSS( $value );
						if ( ! empty( $text_shadow_value ) ) {
							$css .= 'text-shadow:' . $text_shadow_value . ';';
						}
						break;

					case 'margin':
					case 'padding':
						if ( ! empty( self::generate_spacing_css( $kebab_case_key, $value ) ) ) {
							$css .= self::generate_spacing_css( $kebab_case_key, $value );
						}
						break;

					case 'background-type':
					case 'video-background':
					case 'grow-percentage':
						break;

					case 'backdrop-filter':
						$css .= "backdrop-filter:blur({$value}px);";
						$css .= "-webkit-backdrop-filter:blur({$value}px);";
						break;

					case 'grid-template-columns':
						$css .= "grid-template-columns:repeat($value, minmax(0px, 1fr));";
						break;

					case 'grid-template-rows':
						$css .= "grid-template-rows:repeat($value, 1fr);";
						break;

					case 'background-image':
						if ( is_string( $value ) && false !== strpos( $value, 'http' ) ) {
							if ( false !== strpos( $value, 'url' ) ) {
								$css .= "background-image:$value;";
							} else {
								if ( isset( $attributes['backgroundType'] ) && 'image' !== $attributes['backgroundType'] ) {
									break;
								}
								$css .= "background-image:url($value);";
							}
						} else {
							$css .= "background-image:$value;";
						}
						break;

					case 'background-position':
						if ( is_string( $value ) ) {
							$css .= "background-position:$value;";
							break;
						}

						if ( GeneralHelpers::is_valid_array( $value ) ) {
							$css .= 'background-position:' . floatval( $value['x'] ?? 0 ) * 100 . '% ' . floatval( $value['y'] ?? 0 ) * 100 . '%;';
						}
						break;
					default:
						if ( ! is_array( $value ) && ! empty( $value ) ) {
							$css .= "$kebab_case_key:$value;";
						}
						break;
				}
			}
		}

		return strlen( $css ) > 5 ? "$selector { $css }" : '';
	}

		/**
		 * Generates responsive CSS with media queries.
		 *
		 * @param array  $attribute The attributes.
		 * @param string $selector  The selector.
		 *
		 * @return string The responsive CSS.
		 */
	public static function generate_css_new( array $attribute, string $selector ): string {

		if ( empty( $attribute ) ) {
			return '';
		}

		$tablet_attrs = self::apply_media_query(
			self::create_css_string(
				array(
					'normal' => $attribute['md'] ?? array(),
					'active' => $attribute['active']['md'] ?? array(),
					'focus'  => $attribute['focus']['md'] ?? array(),
					'hover'  => $attribute['hover']['md'] ?? array(),
				),
				$selector
			),
			'md'
		);

		$mobile_attrs = self::apply_media_query(
			self::create_css_string(
				array(
					'normal' => $attribute['sm'] ?? array(),
					'active' => $attribute['active']['sm'] ?? array(),
					'focus'  => $attribute['focus']['sm'] ?? array(),
					'hover'  => $attribute['hover']['sm'] ?? array(),
				),
				$selector
			),
			'sm'
		);

		$excluded_keys = array( 'active', 'focus', 'hover', 'sm', 'md' );

		$filtered_attributes = array_filter(
			$attribute,
			function ( $key ) use ( $excluded_keys ) {
				return ! in_array( $key, $excluded_keys, true );
			},
			ARRAY_FILTER_USE_KEY
		);

		$default_css = self::create_css_string(
			array(
				'normal' => $filtered_attributes,
				'active' => $attribute['active'] ?? array(),
				'focus'  => $attribute['focus'] ?? array(),
				'hover'  => $attribute['hover'] ?? array(),
			),
			$selector
		);

		return $default_css . $tablet_attrs . $mobile_attrs;
	}

		/**
		 * Applies a media query to CSS.
		 *
		 * @param string $css    The CSS.
		 * @param string $device The device size.
		 *
		 * @return string The CSS wrapped in media query.
		 */
	private static function apply_media_query( string $css, string $device ): string {
		if ( strlen( $css ) < 5 ) {
			return '';
		}

		switch ( $device ) {
			case 'md':
				return "@media screen and (max-width:991px) { $css }";
			case 'sm':
				return "@media screen and (max-width:768px) { $css }";
			default:
				return $css;
		}
	}

	public static function generate_spacing_css( string $property_name, $values ) {

		if ( is_string( $values ) && ! static::has_unit_only_without_numeric( trim( $values ) ) ) {
			return "{$property_name}:$values;";
		}

		if ( empty( $values ) || array_filter( $values, fn( $value ) => null !== $value ) === array() ) {
			return '';
		}

		$top    = ! empty( $values['top'] ) ? $values['top'] : 0;
		$right  = ! empty( $values['right'] ) ? $values['right'] : 0;
		$bottom = ! empty( $values['bottom'] ) ? $values['bottom'] : 0;
		$left   = ! empty( $values['left'] ) ? $values['left'] : 0;

		if ( 4 === count( $values ) && array_filter( $values, fn( $value ) => $value !== $top ) === array() ) {
			return "{$property_name}:{$top};";
		}

		return "{$property_name}:{$top} {$right} {$bottom} {$left};";
	}

	public static function has_unit_only_without_numeric( $value ) {
		return (bool) preg_match( '/^(px|em|rem)$/', $value );
	}
}


	/*
	Example use case:

	$style_attributes = array(
	// Example style attributes array
	);
	$style_selector = '.my-selector';

	$style_generator = new StyleGenerator( $style_attributes, $style_selector );
	$css_output      = $style_generator->generate_styles();
	echo $css_output;
	*/
