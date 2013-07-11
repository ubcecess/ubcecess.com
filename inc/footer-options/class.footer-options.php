<?php

/**
 * Footer Options Admin Page
 */

Class UBCECESS_Foundation_Footer_Options {

	static function init() {
		add_action( 'admin_init', array( __CLASS__, 'admin' ) );
	}

	static function admin_ui() {
	
	}
	
	static function admin() {
		add_settings_section(
			'footer',	// Unique identifier for the settings section
			'Footer',	// Section title
			'__return_false',	// Section callback (we don't want anything)
			'theme_options'		// Menu slug, used to uniquely identify the page
		);	
	}

}

UBCECESS_Foundation_Footer_Options::init();
