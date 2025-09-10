<?php
/**
 * Style Engine: FP_Style_Engine_CSS_Rules_Store class
 *
 * @package WordPress
 * @subpackage StyleEngine
 * @since 6.1.0
 */

/**
 * Core class used as a store for FP_Style_Engine_CSS_Rule objects.
 *
 * Holds, sanitizes, processes, and prints CSS declarations for the style engine.
 *
 * @since 6.1.0
 */
#[AllowDynamicProperties]
class FP_Style_Engine_CSS_Rules_Store {

	/**
	 * An array of named FP_Style_Engine_CSS_Rules_Store objects.
	 *
	 * @static
	 *
	 * @since 6.1.0
	 * @var FP_Style_Engine_CSS_Rules_Store[]
	 */
	protected static $stores = array();

	/**
	 * The store name.
	 *
	 * @since 6.1.0
	 * @var string
	 */
	protected $name = '';

	/**
	 * An array of CSS Rules objects assigned to the store.
	 *
	 * @since 6.1.0
	 * @var FP_Style_Engine_CSS_Rule[]
	 */
	protected $rules = array();

	/**
	 * Gets an instance of the store.
	 *
	 * @since 6.1.0
	 *
	 * @param string $store_name The name of the store.
	 * @return FP_Style_Engine_CSS_Rules_Store|void
	 */
	public static function get_store( $store_name = 'default' ) {
		if ( ! is_string( $store_name ) || empty( $store_name ) ) {
			return;
		}
		if ( ! isset( static::$stores[ $store_name ] ) ) {
			static::$stores[ $store_name ] = new static();
			// Set the store name.
			static::$stores[ $store_name ]->set_name( $store_name );
		}
		return static::$stores[ $store_name ];
	}

	/**
	 * Gets an array of all available stores.
	 *
	 * @since 6.1.0
	 *
	 * @return FP_Style_Engine_CSS_Rules_Store[]
	 */
	public static function get_stores() {
		return static::$stores;
	}

	/**
	 * Clears all stores from static::$stores.
	 *
	 * @since 6.1.0
	 */
	public static function remove_all_stores() {
		static::$stores = array();
	}

	/**
	 * Sets the store name.
	 *
	 * @since 6.1.0
	 *
	 * @param string $name The store name.
	 */
	public function set_name( $name ) {
		$this->name = $name;
	}

	/**
	 * Gets the store name.
	 *
	 * @since 6.1.0
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Gets an array of all rules.
	 *
	 * @since 6.1.0
	 *
	 * @return FP_Style_Engine_CSS_Rule[]
	 */
	public function get_all_rules() {
		return $this->rules;
	}

	/**
	 * Gets a FP_Style_Engine_CSS_Rule object by its selector.
	 * If the rule does not exist, it will be created.
	 *
	 * @since 6.1.0
	 * @since 6.6.0 Added the $rules_group parameter.
	 *
	 * @param string $selector The CSS selector.
	 * @param string $rules_group A parent CSS selector in the case of nested CSS, or a CSS nested @rule,
	 *                            such as `@media (min-width: 80rem)` or `@layer module`.
	 * @return FP_Style_Engine_CSS_Rule|void Returns a FP_Style_Engine_CSS_Rule object,
	 *                                       or void if the selector is empty.
	 */
	public function add_rule( $selector, $rules_group = '' ) {
		$selector    = $selector ? trim( $selector ) : '';
		$rules_group = $rules_group ? trim( $rules_group ) : '';

		// Bail early if there is no selector.
		if ( empty( $selector ) ) {
			return;
		}

		if ( ! empty( $rules_group ) ) {
			if ( empty( $this->rules[ "$rules_group $selector" ] ) ) {
				$this->rules[ "$rules_group $selector" ] = new FP_Style_Engine_CSS_Rule( $selector, array(), $rules_group );
			}
			return $this->rules[ "$rules_group $selector" ];
		}

		// Create the rule if it doesn't exist.
		if ( empty( $this->rules[ $selector ] ) ) {
			$this->rules[ $selector ] = new FP_Style_Engine_CSS_Rule( $selector );
		}

		return $this->rules[ $selector ];
	}

	/**
	 * Removes a selector from the store.
	 *
	 * @since 6.1.0
	 *
	 * @param string $selector The CSS selector.
	 */
	public function remove_rule( $selector ) {
		unset( $this->rules[ $selector ] );
	}
}
