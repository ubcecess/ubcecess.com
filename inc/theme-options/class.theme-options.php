<?php

require_once( get_template_directory() . '/inc/theme-options/class.theme-options-admin.php' );

Class UBCECESS_Foundation_Theme_Options {

	static function init() {
		add_action( 'admin_init', array( __CLASS__, 'admin_init' ) );
	}

	static function admin_init() {
		
	}
}

UBCECESS_Foundation_Theme_Options::init();