<?php

namespace Omnipress\Core;

use Omnipress\Blocks\BlockGeneralSettings;
use Omnipress\Helpers\GeneralHelpers;
use Omnipress\Helpers\StyleGeneratorHelper;

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

	private $css     = '';
	private $desktop = '';
	private $tablet  = '';
	private $mobile  = '';
	private $hover   = '';
	private $active  = '';
	private $style_attributes;
	private $style_selector;

	/**
	 * __construct constructor.
	 *
	 * Initializes the StyleGenerator object with the provided style attributes and selector.
	 *
	 * @param array  $style_attributes An array containing style attributes.
	 * @param string $style_selector The CSS selector to apply the styles to.
	 */
	public function __construct( $style_attributes, $style_selector ) {
		$this->breakpoints = BlockGeneralSettings::get_breakpoints();

		$this->style_attributes = $style_attributes;
		$this->style_selector   = $style_selector;
	}

	/**
	 * Generate CSS styles based on the provided style attributes and selector.
	 *
	 * This function will loop through the style attributes and generate the CSS styles accordingly.
	 * It will also handle responsive styles by checking if the style attribute key contains 'sm' or 'md'.
	 * If it does, it will append the responsive CSS accordingly.
	 *
	 * @return string The generated CSS styles.
	 */
	public function generate_styles() {
		if ( empty( $this->style_attributes ) ) {
			return '';
		}

		foreach ( $this->style_attributes as $key => $value ) {
			if ( ! $key || empty( $value ) ) {
				continue;
			}

			$device_type       = 'lg';
			$css_property_name = $key;

			if ( strpos( $key, 'sm' ) !== false ) {
				$device_type       = 'sm';
				$css_property_name = StyleGeneratorHelper::changeAttributesKeyIntoValidCssProperty( str_replace( 'sm', '', $key ) );
			} elseif ( strpos( $key, 'md' ) !== false ) {
				$device_type       = 'md';
				$css_property_name = StyleGeneratorHelper::changeAttributesKeyIntoValidCssProperty( str_replace( 'md', '', $key ) );
			}

			$this->convert_css( $value, $css_property_name, $device_type );
		}

		$this->append_responsive_css();

		return StyleGeneratorHelper::uglifyCSS( $this->css );
	}

	/**
	 * Convert a style attribute value to a valid CSS style string.
	 *
	 * This function will loop through the style attributes and generate the CSS styles accordingly.
	 * It will also handle responsive styles by checking if the style attribute key contains 'sm' or 'md'.
	 * If it does, it will append the responsive CSS accordingly.
	 *
	 * @param array|string $value The value of the style attribute.
	 * @param string       $css_prop The property name of the style attribute.
	 * @param string       $device The device type to generate the CSS for.
	 */
	private function convert_css( $value, $css_prop, $device ) {
		if ( empty( $value ) || ( is_string( $value ) && static::has_unit_only_without_numeric( trim( $value ) ) ) ) {
			return;
		}

		$valid_property_name = StyleGeneratorHelper::changeAttributesKeyIntoValidCssProperty( preg_replace( '/md|sm|hover|active/', '', $css_prop ) );

		if ( strpos( $css_prop, 'hover' ) !== false ) {
			$this->hover .= $this->getValidCss( $valid_property_name, $value, $device );
		} elseif ( strpos( $css_prop, 'active' ) !== false ) {
			$this->active .= $this->getValidCss( $valid_property_name, $value, $device );
		} else {
			$this->add_responsive_styles( $device, $this->getValidCss( $valid_property_name, $value, $device ) );
		}
	}

	/**
	 * Add the generated CSS styles to the responsive CSS strings.
	 *
	 * This function will add the generated CSS styles to the responsive CSS strings based on the provided device type.
	 *
	 * @param string $device The device type to add the CSS styles to.
	 * @param string $generated_styles The generated CSS styles.
	 */
	private function add_responsive_styles( $device, $generated_styles ) {
		switch ( $device ) {
			case 'md':
				$this->tablet .= $generated_styles;
				break;
			case 'sm':
				$this->mobile .= $generated_styles;
				break;
			default:
				$this->desktop .= $generated_styles;
		}
	}

	/**
	 * Generate a valid CSS string from a style attribute.
	 *
	 * This function will generate a valid CSS string from a style attribute based on the provided property name and value.
	 * It will also handle responsive styles by checking if the property name contains 'md' or 'sm'.
	 * If it does, it will append the responsive CSS accordingly.
	 *
	 * @param string $property_name The property name of the style attribute.
	 * @param mixed  $value The value of the style attribute.
	 * @param string $device The device type to generate the CSS for.
	 *
	 * @return string The generated CSS string.
	 */
	private function getValidCss( $property_name, $value, $device ) {
		if ( empty( $value ) ) {
			return '';
		}

		$css = '';

		switch ( $property_name ) {
			case 'filter':
				if ( StyleGeneratorHelper::generateFilterCSS( $value ) ) {
					$css .= 'filter:' . StyleGeneratorHelper::generateFilterCSS( $value ) . ';';
				}
				break;
			case 'transform':
				if ( StyleGeneratorHelper::generateTransformStyles( $value ) ) {
					$css .= 'transform:' . StyleGeneratorHelper::generateTransformStyles( $value ) . ';';
				}
				break;

			case 'text-shadow':
			case 'textShadow':
				if ( StyleGeneratorHelper::generateTextShadowCSS( $value ) ) {
					$css .= 'text-shadow:' . StyleGeneratorHelper::generateTextShadowCSS( $value ) . ';';
				}
				break;

			case 'margin':
			case 'padding':
				if ( static::generate_spacing_css( $property_name, $value ) ) {
					$css .= static::generate_spacing_css( $property_name, $value );
				}
				break;

			case 'flex':
			case 'grid':
				if ( GeneralHelpers::is_valid_array( $value ) ) {
					foreach ( $value as $key => $val ) {
						if ( empty( $key ) || empty( $val ) ) {
							continue;
						}

						$this->convert_css( $val, $key, $device );
					}
				}
				break;

			default:
				if ( is_array( $value ) && ! empty( $value ) ) {
					foreach ( $value as $property => $val ) {
						if ( empty( $property ) || empty( $val ) ) {
							continue;
						}
						$this->convert_css( $val, $property_name . '-' . $property, $device );
					}
				}

				if ( ! is_array( $value ) && ! is_object( $value ) && ! empty( $value ) ) {
					$css .= $property_name . ':' . $value . ';';
				}

				break;
		}

		return $css;
	}

	/**
	 * Appends responsive CSS styles to the final CSS string.
	 *
	 * This function appends the responsive CSS styles to the final CSS string based on the device type.
	 * It will also handle hover and active styles by checking if the style attribute key contains 'hover' or 'active'.
	 * If it does, it will append the responsive CSS accordingly.
	 */
	private function append_responsive_css() {
		if ( ! empty( trim( $this->desktop ) ) ) {
			$this->css .= "{$this->style_selector} { {$this->desktop} }";
		}

		if ( ! empty( trim( $this->hover ) ) ) {
			$this->css .= "{$this->style_selector}:hover { {$this->hover} }";
		}

		if ( ! empty( trim( $this->active ) ) ) {
			$this->css .= "{$this->style_selector}:active { {$this->active} }";
		}

		if ( ! empty( trim( $this->tablet ) ) ) {
			$this->css .= "@media screen and (max-width: {$this->breakpoints['tablet']}px) { {$this->style_selector} { {$this->tablet} } }";
		}

		if ( ! empty( trim( $this->mobile ) ) ) {
			$this->css .= "@media screen and (max-width: {$this->breakpoints['mobile']}px) { {$this->style_selector} { {$this->mobile} } }";
		}
	}

	public static function has_unit_only_without_numeric( $value ) {
		return (bool) preg_match( '/^(px|em|rem)$/', $value );
	}
	/**
	 * Generate spacing css where top, right, bottom and left property exists like margin, padding.
	 *
	 * @param string $property_name The property name of the style attribute.
	 * @param mixed  $values array of values.
	 * @return string
	 */
	public static function generate_spacing_css( string $property_name, $values ) {

		if ( is_string( $values ) && ! static::has_unit_only_without_numeric( trim( $values ) ) ) {
			return "{$property_name}:$values;";
		}

		if ( empty( $values ) || array_filter( $values, fn( $value ) => null !== $value ) === array() ) {
			return '';
		}

		$top    = $values['top'] ?? 0;
		$right  = $values['right'] ?? 0;
		$bottom = $values['bottom'] ?? 0;
		$left   = $values['left'] ?? 0;

		if ( 4 === count( $values ) && array_filter( $values, fn( $value ) => $value !== $top ) === array() ) {
			return "{$property_name}:{$top};";
		}

		if ( $top && $bottom && $top === $bottom && ! $left && ! $right ) {
			return "{$property_name}-block:{$top};";
		}

		if ( $left && $right && $left === $right && ! $top && ! $bottom ) {
			return "{$property_name}-inline:{$left};";
		}

		return "{$property_name}:{$top} {$right} {$bottom} {$left};";
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
