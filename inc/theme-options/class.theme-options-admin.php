<?php

Class UBCECESS_Foundation_Theme_Options_Admin {

	static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'create_theme_options_page' ) );
		add_action( 'wp_before_admin_bar_render', array( __CLASS__, 'add_to_admin_bar' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'global_enqueue_scripts_styles' ) );
	}
	/**
	 * register_script_style function
	 * This function is responsible for registering the handler tags
	 * for scripts and styles to be used in the theme options
	 *
	 * Provides a central place to store all the handler tags for every
	 * individual script and style for the theme options pages
	 */
	static function register_script_style() {

	}

	/**
	 * global_enqueue_scripts_styles function
	 * This function is responsible for adding the scripts
	 * and styles to be used globally in the theme options
	 *
	 * Will only enqueue the scripts to be used on all the
	 * theme options pages. Will dynamically load the individual scripts
	 * and styles for each of the theme options page in the respective
	 * files
	 */
	static function global_enqueue_scripts_styles( $hook ) {

		/*if( 'themes.php?page=theme_options' != $hook )
			return;*/

		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-tabs' );

		wp_enqueue_script( 
			'ubcecess-theme-options-js', get_template_directory_uri() . '/inc/theme-options/js/theme-options.js', array( 'jquery-ui-core' ), '1.0', true );
		wp_register_style( 'ubcecess-theme-options-styles', get_template_directory_uri() . '/inc/theme-options/css/theme-options.css', false, '1.0.0' );
		wp_enqueue_style( 'ubcecess-theme-options-styles' );
	}

	/**
	 * create_theme_options_page function
	 * This function creates the theme options page links
	 * as well as creating the context for the theme options pages
	 */
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

	/**
	 * admin_page function
	 * This function will render the Theme Options admin page
	 */
	static function admin_page() { ?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2>Theme Options</h2>
			<form id="ubcecess-foundation-theme-options" method="post">
				<?php submit_button( 'Save Changes' );?>
					<?php  settings_fields( 'ubcecess_foundation_options' ); ?>
					<?php self::do_settings_sections_tabs( 'theme_options' ); ?>
				<?php submit_button( 'Save Changes' );?>
			</form>
		</div>
	<?php }
	
	/**
	 * do_settings_sections_tabs function
	 * 
	 */
	static function do_settings_sections_tabs( $page ) {
		global $wp_settings_sections, $wp_settings_fields;
		
		if( !isset( $wp_settings_sections ) || !isset( $wp_settings_sections[$page] ) ) {
			return;
		} ?>
		<div id="theme-options-wrap">
			<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all hide-if-no-js">
			<?php foreach( (array) $wp_settings_sections[$page] as $section ) { ?>
				<li><a href="#<?php echo $section['id']; ?>" title="<?php echo esc_attr( $section['title'] ); ?>"><?php echo $section['title']; ?></a></li>
			<?php } // end of foreach ?>
			</ul> <!-- // ui-tabs-nav -->
			<?php foreach( (array) $wp_settings_sections[$page] as $section ) { ?>
				<div id="<?php echo $section['id']; ?>" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
					<h3><?php echo $section['title']; ?></h3>
					<?php
					call_user_func( $section['callback'], $section );
					if( isset( $wp_settings_fields[$page][$section['id']] ) ) { ?>
						<div class="form-table-shell">
							<table class="form-table">
								<?php do_settings_fields( $page, $section['id'] ); ?>
							</table>
						</div>
					<?php } // end if?>
				</div>
			<?php } // end foreach?>
		</div> <!-- end ui-tabs-panel -->
		<?php ?>
	<?php }
}

UBCECESS_Foundation_Theme_Options_Admin::init();