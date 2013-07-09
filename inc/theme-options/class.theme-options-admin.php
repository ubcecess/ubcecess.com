<?php

Class UBCECESS_Foundation_Theme_Options_Admin {

	static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'create_theme_options_page' ) );
		add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'add_to_admin_bar' ) );
	}

	static function create_theme_options_page() {
		$theme_page = add_theme_page(
			__( 'Theme Options', 'foundation' ),
			__( 'Theme Options', 'foundation' ),
			'edit_theme_options',
			'theme_options',
			array( __CLASS__, 'admin_page' )
		);
	}

	static function add_to_admin_bar() {
		global $wp_admin_bar;
		// Add theme options link to the top admin bar
		$wp_admin_bar->add_menu( array( 
			'parent' => 'appearance',
			'id'	 => 'ubcecess_foundation_theme',
			'title'	 => __( 'Theme Options', 'foundation' ),
			'href'	 => admin_url( 'themes.php?page=theme_options' )
		) );
	}

	static function admin_page() { ?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2>Theme Options</h2>
			<form id="ubcecess-foundation-theme-options" method="post">
				<?php submit_button( 'Save Changes' );?>

				<?php submit_button( 'Save Changes' );?>
			</form>
		</div>
	<?php }
}

UBCECESS_Foundation_Theme_Options_Admin::init();