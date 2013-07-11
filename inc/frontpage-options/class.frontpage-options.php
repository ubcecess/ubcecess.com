<?php

/**
 * Frontpage Options Admin Page
 */

Class UBCECESS_Foundation_Frontpage_Options {
	
	static $prefix;
	static $add_script;
	static $update_reading_option;
	
	static function init() {
		
		add_action( 'admin_init', array( __CLASS__, 'admin' ) );
		
	}
	
	static function admin_ui() {
	
	}
	
	static function admin() {
	
		add_settings_section(
			'frontpage',	// Unique identifier for the settings section
			'Front Page',	// Section title
			'__return_false',	// Section callback (we don't want anything)
			'theme_options'		// Menu slug, used to uniquely identify the page
		);	
	}
	
}

UBCECESS_Foundation_Frontpage_Options::init();
