<?php
namespace Omnipress\Publics;

/**
 * Main Class CSSUtils.
 *
 * @author Omnipressteam
 * @copyright (c) 2024
 */
class CSSUtils {

	// Minify the provided CSS code.
	public function uglify_css( $css_code ) {
		if ( empty( $css_code ) ) {
			return '';
		}
		$css_code = preg_replace( '/\s+/', ' ', $css_code ); // Replace multiple spaces with a single space.
		$css_code = preg_replace( '/\/\*[\s\S]*?\*\//', '', $css_code ); // Remove comments.
		$css_code = preg_replace( '/ ?([:;,{}]) ?/', '$1', $css_code ); // Trim spaces around certain characters.
		return $css_code;
	}

	// Generate text-shadow CSS from an array of shadow values.
	public function generate_text_shadow_css( $text_shadow ) {
		$shadows_css = array_map(
			function ( $shadow ) {
				$valid_offset_x      = is_numeric( $shadow['offsetX'] ) ? $shadow['offsetX'] . 'px' : '0px';
				$valid_offset_y      = is_numeric( $shadow['offsetY'] ) ? $shadow['offsetY'] . 'px' : '0px';
				$valid_blur_radius   = is_numeric( $shadow['blurRadius'] ) ? $shadow['blurRadius'] . 'px' : '0px';
				$valid_spread_radius = is_numeric( $shadow['spreadRadius'] ) ? $shadow['spreadRadius'] . 'px' : '0px';
				$valid_color         = ! empty( $shadow['color'] ) ? $shadow['color'] : 'rgba(0, 0, 0, 0)';

				return "{$valid_offset_x} {$valid_offset_y} {$valid_blur_radius} {$valid_spread_radius} {$valid_color}";
			},
			$text_shadow['shadows']
		);

		// Filter out invalid shadows and join valid ones.
		$filtered_shadows = array_filter(
			$shadows_css,
			function ( $shadow ) {
				return $shadow !== '0px 0px 0px 0px rgba(0, 0, 0, 0)';
			}
		);

		return implode( ', ', $filtered_shadows ) ?: '';
	}

	// Check if a value is a valid object (associative array).
	public function is_valid_object( $value ) {
		return is_array( $value ) && ! empty( $value ) && array_values( $value ) !== $value; // Check if associative array.
	}

	// Generate a CSS transform string from a transformation object.
	public function generate_transform_styles( $transform ) {
		$transforms = array();

		// Handle translate.
		if ( isset( $transform['translate'] ) ) {
			$x            = $transform['translate']['x'] ?? 0;
			$y            = $transform['translate']['y'] ?? 0;
			$z            = $transform['translate']['z'] ?? null;
			$transforms[] = "translate({$x}px, {$y}px)";
			if ( null !== $z ) {
				$transforms[] = "translateZ({$z}px)";
			}
		}

		// Handle rotate.
		if ( isset( $transform['rotate'] ) ) {
			$transforms[] = "rotate({$transform['rotate']}deg)";
		}

		// Handle 3D rotations.
		if ( isset( $transform['rotateX'] ) ) {
			$transforms[] = "rotateX({$transform['rotateX']}deg)";
		}

		if ( isset( $transform['rotateY'] ) ) {
			$transforms[] = "rotateY({$transform['rotateY']}deg)";
		}

		// Handle scale.
		if ( isset( $transform['scale'] ) ) {
			$scale_x      = $transform['scale']['x'] ?? 1;
			$scale_y      = $transform['scale']['y'] ?? 1;
			$transforms[] = "scale({$scale_x}, {$scale_y})";
		}

		// Handle 3D scaling.
		if ( isset( $transform['scaleZ'] ) ) {
			$transforms[] = "scaleZ({$transform['scaleZ']})";
		}

		// Handle skew.
		if ( isset( $transform['skew'] ) ) {
			$skew_x       = $transform['skew']['x'] ?? 0;
			$skew_y       = $transform['skew']['y'] ?? 0;
			$transforms[] = "skew({$skew_x}deg, {$skew_y}deg)";
		}

		// Handle perspective.
		if ( isset( $transform['perspective'] ) ) {
			$transforms[] = "perspective({$transform['perspective']}px)";
		}

		// Handle matrix.
		if ( isset( $transform['matrix'] ) ) {
			$matrix       = $transform['matrix'];
			$transforms[] = "matrix({$matrix['a']}, {$matrix['b']}, {$matrix['c']}, {$matrix['d']}, {$matrix['e']}, {$matrix['f']})";
		}

		return implode( ' ', $transforms );
	}

	// Generate a CSS filter string from a filter object.
	public function generate_filter_css( $filter ) {
		$filter_string = '';

		if ( isset( $filter['blur'] ) ) {
			$filter_string .= "blur({$filter['blur']}px) ";
		}
		if ( isset( $filter['brightness'] ) ) {
			$filter_string .= "brightness({$filter['brightness']}%) ";
		}
		if ( isset( $filter['contrast'] ) ) {
			$filter_string .= "contrast({$filter['contrast']}%) ";
		}
		if ( isset( $filter['grayscale'] ) ) {
			$filter_string .= "grayscale({$filter['grayscale']}%) ";
		}
		if ( isset( $filter['hueRotate'] ) ) {
			$filter_string .= "hue-rotate({$filter['hueRotate']}deg) ";
		}
		if ( isset( $filter['invert'] ) ) {
			$filter_string .= "invert({$filter['invert']}%) ";
		}
		if ( isset( $filter['opacity'] ) ) {
			$filter_string .= "opacity({$filter['opacity']}%) ";
		}
		if ( isset( $filter['saturate'] ) ) {
			$filter_string .= "saturate({$filter['saturate']}%) ";
		}
		if ( isset( $filter['sepia'] ) ) {
			$filter_string .= "sepia({$filter['sepia']}%) ";
		}

		return trim( $filter_string );
	}

	// Convert a camelCase string to a kebab-case string for CSS property names.
	public function change_attributes_key_into_valid_css_property( $str ) {
		$str = strtolower( substr( $str, 0, 1 ) ) . substr( $str, 1 ); // Convert first character to lowercase.
		return strtolower( preg_replace( '/([A-Z])/', '-$1', $str ) ); // Convert camelCase to kebab-case.
	}
}
