<?php

/**
 * General Options Admin Page
 */

Class UBCECESS_Foundation_General_Options {

	static function init() {
		
		// Theme Options actions
		add_action( 'admin_init', array( __CLASS__, 'admin' ) );
	}

	static function admin_ui() {
	
	}
	
	static function admin() {
	
		add_settings_section(
			'general-options',	// Unique identifier for the settings section
			'General Options',	// Section title
			'__return_false',	// Section callback (we don't want anything)
			'theme_options'		// Menu slug, used to uniquely identify the page
		);
	}
	
}

UBCECESS_Foundation_General_Options::init();
