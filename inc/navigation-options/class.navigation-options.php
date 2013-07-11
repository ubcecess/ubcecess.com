<?php

/*
 * Navigation Options Admin Page
 */

Class UBCECESS_Foundation_Navigation_Options {

	static function init() {
		add_action( 'admin_init', array( __CLASS__, 'admin' ) );
	}

	static function admin_ui() {
	
	}
	
	static function admin() {
		add_settings_section(
			'navigation',	// Unique identifier for the settings section
			'Navigation',	// Section title
			'__return_false',	// Section callback (we don't want anything)
			'theme_options'		// Menu slug, used to uniquely identify the page
		);	
	}
	
}

UBCECESS_Foundation_Navigation_Options::init();
