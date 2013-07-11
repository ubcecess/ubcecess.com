<?php

require_once( get_template_directory() . '/inc/theme-options/class.theme-options-admin.php' );

Class UBCECESS_Foundation_Theme_Options {

	static function init() {
		add_action( 'admin_init', array( __CLASS__, 'admin_init' ) );
	}
	
	/**
	 * admin_init function
	 * This function is attached to the admin_init action hook.
	 *
	 * Registers a validation callback, ubcecess_foundation_theme_options_validate,
	 * which is used when the option is saved, to ensure that our option values are properly
	 * formatted and safe.
	 */
	static function admin_init() {
		register_setting(
			'ubcecess_foundation_options',	// Options group
			'ubcecess-foundation-theme-options', // Database option
			array( __CLASS__, 'validate' )	// The sanitization callback
		);
	}
	
	/**
	 * validate function
	 *
	 */
	static function validate( $input ) {
		$output = array();
		
		// clear the super cache (if it is available)
		if( function_exists( 'wp_cache_clear_cache' ) )
			wp_cache_clear_cache();
			
		return apply_filters( 'ubcecess_foundation_theme_options_validate', $output, $input );
	}
}

UBCECESS_Foundation_Theme_Options::init();