<?php
namespace Omnipress\Utils;

defined( 'ABSPATH' ) || exit;


/**
 * Class StyleGeneratorHelper
 *
 * @author Ishwor Khadka <asishwor@gmail.com>
 * @package app\core
 */
if ( ! class_exists( 'StyleGeneratorHelper' ) ) {
	class StyleGeneratorHelper {

		public static function uglifyCSS( $css_code ) {
			if ( empty( $css_code ) ) {
				return '';
			}

			// Remove unnecessary spaces.
			$css_code = preg_replace( '/\s+/', ' ', $css_code );

			// Remove comments.
			$css_code = preg_replace( '/\/\*[\s\S]*?\*\//', '', $css_code );

			// Remove spaces around symbols like :, ;, {}, etc..
			$css_code = preg_replace( '/ ?([:;,{}]) ?/', '$1', $css_code );

			return $css_code ?: '';
		}

		public static function generateTextShadowCSS( $text_shadow ) {
			if ( empty( $text_shadow ) || ! isset( $text_shadow['shadows'] ) ) {
				return '';
			}

			$shadow_css = array_map(
				function ( $shadow ) {
					$offset_x      = isset( $shadow['offsetX'] ) ? $shadow['offsetX'] . 'px' : '0px';
					$offset_y      = isset( $shadow['offsetY'] ) ? $shadow['offsetY'] . 'px' : '0px';
					$blur_radius   = isset( $shadow['blurRadius'] ) ? $shadow['blurRadius'] . 'px' : '0px';
					$spread_radius = isset( $shadow['spreadRadius'] ) ? $shadow['spreadRadius'] . 'px' : '0px';
					$color         = isset( $shadow['color'] ) ? $shadow['color'] : 'rgba(0, 0, 0, 0)';

					return "{$offset_x} {$offset_y} {$blur_radius} {$spread_radius} {$color}";
				},
				$text_shadow['shadows']
			);

			// Filter out default 'none' shadows and join.
			$shadow_css = array_filter(
				$shadow_css,
				function ( $shadow ) {
					return $shadow !== '0px 0px 0px 0px rgba(0, 0, 0, 0)';
				}
			);

			return implode( ', ', $shadow_css ) ?: '';
		}

		public static function isValidObject( $value ) {
			return is_array( $value ) && ! empty( $value );
		}

		public static function generateTransformStyles( $value ) {
			if ( empty( $value ) ) {
				return '';
			}

			$transforms = array();

			// Handle translate.
			if ( isset( $value['translate'] ) ) {
				$x = ! empty( $value['translate']['x'] ) ? $value['translate']['x'] : '0px';
				$y = ! empty( $value['translate']['y'] ) ? $value['translate']['y'] : '0px';
				$z = ! empty( $value['translate']['z'] ) ? $value['translate']['z'] : null;

				$transforms[] = "translate({$x}, {$y})";

				if ( ! empty( $z ) ) {
					$transforms[] = "translateZ({$z})";
				}
			}

			// Handle rotate.
			if ( isset( $value['rotate'] ) && ! is_array( $value['rotate'] ) && ! is_object( $value['rotate'] ) ) {
				$transforms[] = "rotate({$value['rotate']}deg)";
			}

			// Handle 3D rotations.
			if ( isset( $value['rotateX'] ) ) {
				$transforms[] = "rotateX({$value['rotateX']}deg)";
			}

			if ( isset( $value['rotateY'] ) ) {
				$transforms[] = "rotateY({$value['rotateY']}deg)";
			}

			// Handle scale.
			if ( isset( $value['scale'] ) && isset( $value['scale']['x'] ) && isset( $value['scale']['y'] ) ) {
				$transforms[] = "scale({$value['scale']['x']}, {$value['scale']['y']})";
			}

			// Handle 3D scaling.
			if ( isset( $value['scaleZ'] ) ) {
				$transforms[] = "scaleZ({$value['scaleZ']})";
			}

			// Handle skew.
			if ( isset( $value['skew'] ) && ( isset( $value['skew']['x'] ) || isset( $value['skew']['y'] ) ) ) {
				$value['skew']['x'] ??= 0;
				$value['skew']['y'] ??= 0;

				$transforms[] = "skew({$value['skew']['x']}deg, {$value['skew']['y']}deg)";
			}

			// Handle perspective.
			if ( isset( $value['perspective'] ) ) {
				$transforms[] = "perspective({$value['perspective']}px)";
			}

			// Handle matrix.
			if ( isset( $value['matrix'] ) ) {
				$matrix       = $value['matrix'];
				$transforms[] = "matrix({$matrix['a']}, {$matrix['b']}, {$matrix['c']}, {$matrix['d']}, {$matrix['e']}, {$matrix['f']})";
			}

			return implode( ' ', $transforms );
		}

		public static function generateFilterCSS( $filter ) {
			if ( empty( $filter ) ) {
				return '';
			}

			$filter_parts = array();

			// Handle different filter types.
			if ( isset( $filter['blur'] ) ) {
				$filter_parts[] = "blur({$filter['blur']}px)";
			}
			if ( isset( $filter['brightness'] ) ) {
				$filter_parts[] = "brightness({$filter['brightness']}%)";
			}
			if ( isset( $filter['contrast'] ) ) {
				$filter_parts[] = "contrast({$filter['contrast']}%)";
			}
			if ( isset( $filter['grayscale'] ) ) {
				$filter_parts[] = "grayscale({$filter['grayscale']}%)";
			}
			if ( isset( $filter['hueRotate'] ) ) {
				$filter_parts[] = "hue-rotate({$filter['hueRotate']}deg)";
			}
			if ( isset( $filter['invert'] ) ) {
				$filter_parts[] = "invert({$filter['invert']}%)";
			}
			if ( isset( $filter['opacity'] ) ) {
				$filter_parts[] = "opacity({$filter['opacity']}%)";
			}
			if ( isset( $filter['saturate'] ) ) {
				$filter_parts[] = "saturate({$filter['saturate']}%)";
			}
			if ( isset( $filter['sepia'] ) ) {
				$filter_parts[] = "sepia({$filter['sepia']}%)";
			}

			return implode( ' ', $filter_parts );
		}

		public static function changeAttributesKeyIntoValidCssProperty( $str ) {
			$str = lcfirst( $str );
			$str = preg_replace( '/([A-Z])/', '-$1', $str );
			return strtolower( $str );
		}

		public static function generate_shadow_styles( array $shadows = null ): string {

			if ( empty( $shadows ) ) {
				return '';
			}

			if ( is_array( $shadows ) ) {
				$shadow_strings = array_map(
					function ( $shadow ) {
						return sprintf(
							'%s %spx %spx %spx %spx %s',
							! empty( $shadow['inset'] ) && $shadow['inset'] ? 'inset' : '',
							$shadow['x'] ?? 0,
							$shadow['y'] ?? 0,
							$shadow['blur'] ?? 0,
							$shadow['spread'] ?? 0,
							$shadow['color'] ?? '#000'
						);
					},
					$shadows
				);

				return implode( ', ', $shadow_strings );
			}

			return '';
		}
	}
}
