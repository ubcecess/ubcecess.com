<?php

/**
 * Header Options Admin Page
 */

Class UBCECESS_Foundation_Header_Options {

	static function init() {
		add_action( 'admin_init', array( __CLASS__, 'admin' ) );
	}

	static function admin_ui() {
	
	}
	
	static function admin() {
		add_settings_section(
			'header',	// Unique identifier for the settings section
			'Header',	// Section title
			'__return_false',	// Section callback (we don't want anything)
			'theme_options'		// Menu slug, used to uniquely identify the page
		);	
	}

}

UBCECESS_Foundation_Header_Options::init();

