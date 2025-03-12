<?php

namespace Omnipress\Blocks;

defined( 'ABSPATH' ) || exit;
/**
 * Class AttributeConverter
 *
 * Converts attribute arrays into a structured format.
 */
class AttributeValidator {
	/**
	 * Converts an array of attributes.
	 *
	 * @param array $attributes The input attributes.
	 *
	 * @return array The converted attributes.
	 */
	public static function convert( array $attributes ): array {
		$obj = array();

		foreach ( $attributes as $key => $value ) {
			if ( ! $key || null === $value ) {
				$obj[ $key ] = null;
				continue;
			}

			$lower_cased_key = strtolower( $key );
			$pseudo_key      = self::get_pseudo_key( $lower_cased_key );

			if ( ! self::is_style_attribute_key( $lower_cased_key ) || $key === $pseudo_key ) {
				$obj[ $key ] = is_array( $value ) ? self::convert( $value ) : $value;
				continue;
			}

			switch ( $pseudo_key ) {
				case 'hover':
				case 'active':
				case 'focus':
					$obj = self::pseudo_attrs_converter( $obj, $value, $key, $pseudo_key );
					break;
				case 'sm':
				case 'md':
					$obj = self::pseudo_attrs_converter( $obj, $value, $key, false );
					break;
				default:
					$obj[ $key ] = $value;
					break;
			}
		}

		return self::remove_null( $obj );
	}

	/**
	 * Gets the pseudo key from the provided key.
	 *
	 * @param string $key The attribute key.
	 *
	 * @return string|null The pseudo key if found, otherwise null.
	 */
	private static function get_pseudo_key( string $key ): ?string {
		$pseudo_keys = array( 'hover', 'active', 'focus', 'sm', 'md' );

		foreach ( $pseudo_keys as $pseudo ) {
			if ( false !== strpos( $key, $pseudo ) && $key !== $pseudo ) {
				return $pseudo;
			}
		}

		return null;
	}

	/**
	 * Converts pseudo attributes.
	 *
	 * @param array  $obj       The attribute object.
	 * @param mixed  $value     The attribute value.
	 * @param string $key       The attribute key.
	 * @param mixed  $pseudo_key The pseudo key.
	 *
	 * @return array The converted attributes.
	 */
	private static function pseudo_attrs_converter( array $obj, $value, string $key, $pseudo_key ): array {
		$lower_cased_key = strtolower( $key );

		if ( ! $pseudo_key ) {
			if ( false !== strpos( $lower_cased_key, 'sm' ) ) {
				$pseudo_key = 'sm';
			} elseif ( false !== strpos( $lower_cased_key, 'md' ) ) {
				$pseudo_key = 'md';
			}

			$attr_key = $pseudo_key ? self::replace_starting_letters( $key, $pseudo_key ) : $key;

			if ( $pseudo_key ) {
				$obj[ $pseudo_key ][ $attr_key ] = $value;
			} else {
				$obj[ $attr_key ] = $value;
			}

			return $obj;
		}

		if ( false !== strpos( $lower_cased_key, 'sm' ) ) {
			$attr_key                              = self::replace_starting_letters( $key, 'sm' . $pseudo_key );
			$obj[ $pseudo_key ]['sm'][ $attr_key ] = $value;
		} elseif ( false !== strpos( $lower_cased_key, 'md' ) ) {
			$attr_key                              = self::replace_starting_letters( $key, 'md' . $pseudo_key );
			$obj[ $pseudo_key ]['md'][ $attr_key ] = $value;
		} else {
			$attr_key                        = self::replace_starting_letters( $key, $pseudo_key );
			$obj[ $pseudo_key ][ $attr_key ] = $value;
		}

		return $obj;
	}

	/**
	 * Replaces starting letters in a key.
	 *
	 * @param string $key          The original key.
	 * @param string $starting_key The key to replace.
	 *
	 * @return string The modified key.
	 */
	private static function replace_starting_letters( string $key, string $starting_key ): string {
		return preg_replace( '/^' . preg_quote( $starting_key, '/' ) . '/i', '', $key );
	}

	/**
	 * Checks if a string is a style attribute key.
	 *
	 * @param string $string The attribute key.
	 *
	 * @return bool True if it is a style attribute key, false otherwise.
	 */
	private static function is_style_attribute_key( string $string ): bool {
		return 1 === preg_match( '/^(mdhover|smhover|smactive|mdactive|active|hover|sm|md)/', $string );
	}

	/**
	 * Removes null values from an array.
	 *
	 * @param array $array The input array.
	 *
	 * @return array The array without null values.
	 */
	private static function remove_null( array $array ): array {
		return array_filter(
			$array,
			function ( $value ) {
				return null !== $value;
			}
		);
	}
}
