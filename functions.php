<?php

/**
 * Functions
 *
 * Core functionality and initial theme setup
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

/**
 * Initiate Foundation, for WordPress
 */

if ( ! function_exists( 'foundation_setup' ) ) :

function foundation_setup() {

	// Content Width
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Language Translations
	load_theme_textdomain( 'foundation', get_template_directory() . '/languages' );

	// Custom Editor Style Support
	add_editor_style();

	// Support for Featured Images
	add_theme_support( 'post-thumbnails' ); 

	// Automatic Feed Links & Post Formats
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fff',
	) );

	// Custom Header
	add_theme_support( 'custom-header', array(
		'default-text-color' => '#000',
		'header-text'   => false,
		'uploads'       => true,
		'flex-height'	=> true,
		'flex-width'	=> true,
		'default-image' => get_template_directory_uri() . '/img/header_logo.png',
	) );

	// Add Theme Options Menu
	//foundation_theme_before_options_setup();
	//foundation_theme_after_options_setup();
}

//add_action( 'after_setup_theme', 'foundation_theme_before_options_setup', 8 );
add_action( 'after_setup_theme', 'foundation_setup' );
//add_action( 'after_setup_theme', 'foundation_theme_after_options_setup', 9 );


endif;

/** UBC ECESS START**/

if( ! function_exists( 'ubcecess_foundation_post_editor' ) ) {
	
	function ubcecess_foundation_post_editor() {
		require_once( get_template_directory() . '/inc/featured-image-choice-box/class.ubcecess-foundation-featured-image-choice-box.php' );
	}
	
	add_action( 'admin_init', 'ubcecess_foundation_post_editor' );
}

/**
 * foundation_theme_before_options_setup function
 * This function registers the theme options handler tags
 */
function foundation_theme_before_options_setup() {

	add_theme_support( 'general-options' );
	add_theme_support( 'layout' );
	add_theme_support( 'frontpage' );
	add_theme_support( 'navigation' );
	add_theme_support( 'header' );
	add_theme_support( 'footer' );

	require_once( get_template_directory() . '/inc/theme-options/class.theme-options.php' );

}

/**
 * foundation_theme_after_options_setup function
 * This function will load the options menus in the theme options page
 * The menus will appear in the order in while the files are included
 */
function foundation_theme_after_options_setup() {
	
	require_if_theme_supports( 'general-options', get_template_directory() . '/inc/general-options/class.general-options.php' );
	require_if_theme_supports( 'layout', get_template_directory() . '/inc/layout-options/class.layout-options.php' );
	require_if_theme_supports( 'frontpage', get_template_directory() . '/inc/frontpage-options/class.frontpage-options.php' );
	require_if_theme_supports( 'navigation', get_template_directory() . '/inc/navigation-options/class.navigation-options.php' );
	require_if_theme_supports( 'header', get_template_directory() . '/inc/header-options/class.header-options.php' );
	require_if_theme_supports( 'footer', get_template_directory() . '/inc/footer-options/class.footer-options.php' );
	
}
/** UBC ECESS END **/

/**
 * Enqueue Scripts and Styles for Front-End
 */

if ( ! function_exists( 'foundation_assets' ) ) :

function foundation_assets() {

	if (!is_admin()) {

		/** 
		 * Deregister jQuery in favour of ZeptoJS
		 * jQuery will be used as a fallback if ZeptoJS is not compatible
		 * @see foundation_compatibility & http://foundation.zurb.com/docs/javascript.html
		 */
		//wp_deregister_script('jquery');
		// DO NOT deregister jquery like that. it will cause plugin compatibility issues that rely on jquery

		// Load JavaScripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array( 'jquery' ), '4.0', true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/vendor/custom.modernizr.js', null, '2.1.0');
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		// Load Stylesheets
		wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.min.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array( 'foundation' ) );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
		
		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300' );
	
	}

}

add_action( 'wp_enqueue_scripts', 'foundation_assets' );

endif;

/**
 * Initialise Foundation JS
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_js_init' ) ) :

function foundation_js_init () {
    echo '<script>jQuery(document).ready(function($) { $(document).foundation(); });</script>';
}

add_action('wp_footer', 'foundation_js_init', 50);

endif;

/**
 * ZeptoJS and jQuery Fallback
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

/*if ( ! function_exists( 'foundation_comptability' ) ) :

function foundation_comptability () {

	?>
	<script>
		document.write('<script src=' + <?php echo get_template_directory_uri(); ?> + '/js/vendor/'
			+ ('__proto__' in {} ? 'zepto' : 'jquery')
			+ '.js><\/script>');
	</script>
	<?php

}

add_action('wp_footer', 'foundation_comptability', 10);

endif; */

/**
 * Register Navigation Menus
 */

if ( ! function_exists( 'foundation_menus' ) ) :

// Register wp_nav_menus
function foundation_menus() {

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'foundation' )
		)
	);
	
}

add_action( 'init', 'foundation_menus' );

endif;

if ( ! function_exists( 'foundation_page_menu' ) ) :

function foundation_page_menu() {

	$args = array(
	'sort_column' => 'menu_order, post_title',
	'menu_class'  => 'large-12 columns',
	'include'     => '',
	'exclude'     => '',
	'echo'        => true,
	'show_home'   => false,
	'link_before' => '',
	'link_after'  => ''
	);

	wp_page_menu($args);

}

endif;

/**
 * Navigation Menu Adjustments
 */

// Add class to navigation sub-menu
class foundation_navigation extends Walker_Nav_Menu {

function start_lvl(&$output, $depth) {
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	$id_field = $this->db_fields['id'];
	if ( !empty( $children_elements[ $element->$id_field ] ) ) {
		$element->classes[] = 'has-dropdown';
	}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

/**
 * Create pagination
 */

if ( ! function_exists( 'foundation_pagination' ) ) :

function foundation_pagination() {

global $wp_query;

$big = 999999999;

$links = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_next' => true,
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
)
);

$pagination = str_replace('page-numbers','pagination',$links);

echo $pagination;

}

endif;

/**
 * Register Sidebars
 */

if ( ! function_exists( 'foundation_widgets' ) ) :

function foundation_widgets() {

	/** UBC ECESS START **/ 
	
	// Frontpage Widget Right of Slider
	register_sidebar( array(
			'id' => 'foundation_sidebar_frontpage_primary_one',
			'name' => __( 'Frontpage Primary Widget One', 'foundation' ),
			'description' => __( 'This widget is located on the frontpage to the right of the slider', 'foundation' ),
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="spacedcaps">',
			'after_title' => '</h5>',
		) );
		
	// Frontpage Widget Right of Content
	register_sidebar( array (
			'id' => 'foundation_sidebar_frontpage_primary_two',
			'name' => __( 'Frontpage Primary Widget Two', 'foundation' ),
			'description' => __( 'This widget is located on the frontpage to the right of the content area', 'foundation' ),
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="spacedcaps">',
			'after_title' => '</h5>',
		));

	// Primary Sidebar
	register_sidebar( array(
			'id' => 'foundation_sidebar_primary',
			'name' => __( 'Primary Sidebar', 'foundation' ),
			'description' => __( 'This is the primary sidebar of posts and pages', 'foundation' ),
			'before_widget' => '<div class="ece-widgets">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="spacedcaps">',
			'after_title' => '</h5>',
		) );

	/** UBCECESS END **/

	// Sidebar Footer Column One
	/*register_sidebar( array(
			'id' => 'foundation_sidebar_footer_one',
			'name' => __( 'Sidebar Footer One', 'foundation' ),
			'description' => __( 'This sidebar is located in column one of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Two
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_two',
			'name' => __( 'Sidebar Footer Two', 'foundation' ),
			'description' => __( 'This sidebar is located in column two of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Three
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_three',
			'name' => __( 'Sidebar Footer Three', 'foundation' ),
			'description' => __( 'This sidebar is located in column three of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Four
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_four',
			'name' => __( 'Sidebar Footer Four', 'foundation' ),
			'description' => __( 'This sidebar is located in column four of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );*/
	
	}

add_action( 'widgets_init', 'foundation_widgets' );

endif;

/**
 * Custom Avatar Classes
 */

if ( ! function_exists( 'foundation_avatar_css' ) ) :

function foundation_avatar_css($class) {
	$class = str_replace("class='avatar", "class='author_gravatar left ", $class) ;
	return $class;
}

add_filter('get_avatar','foundation_avatar_css');

endif;

/**
 * Custom Post Excerpt
 */

function new_excerpt_more( $more ) {
	return '...<br><br><a href="'.get_permalink($post->ID) .'" class="button secondary small">' . __('Continue Reading', 'foundation') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/** 
 * Comments Template
 */

if ( ! function_exists( 'foundation_comment' ) ) :

function foundation_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'foundation' ), '<span>', '</span>' ); ?></p>
	<?php
		break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header>
				<?php
					echo "<span class='th alignleft' style='margin-right:1rem;'>";
					echo get_avatar( $comment, 44 );
					echo "</span>";
					printf( '%2$s %1$s',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span class="label">' . __( 'Post Author', 'foundation' ) . '</span>' : ''
					);
					printf( '<br><a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( __( '%1$s at %2$s', 'foundation' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p><?php _e( 'Your comment is awaiting moderation.', 'foundation' ); ?></p>
			<?php endif; ?>

			<section>
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'foundation' ), 'after' => ' &darr; <br><br>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			</div>
		</article>
	<?php
		break;
	endswitch;
}
endif;

/**
 * Remove Class from Sticky Post
 */

if ( ! function_exists( 'foundation_remove_sticky' ) ) :

function foundation_remove_sticky($classes) {
  $classes = array_diff($classes, array("sticky"));
  return $classes;
}

add_filter('post_class','foundation_remove_sticky');

endif;

/**
 * Custom Foundation Title Tag
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function foundation_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'foundation' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'foundation_title', 10, 2 );

/**
 * Retrieve Shortcodes
 * @see: http://fwp.drewsymo.com/shortcodes/
 */

$foundation_shortcodes = trailingslashit( get_template_directory() ) . 'inc/shortcodes.php';

if (file_exists($foundation_shortcodes)) {
	require( $foundation_shortcodes );
}

/** UBC ECESS START **/
/**
 * foundation_orbit function
 * This function creates the foundation orbit slider for the frontpage
 */
if( !function_exists( 'foundation_orbit' ) ) {

	function foundation_orbit() {
		$args = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '_ubcecess_featured_image_in_slider',
			'meta_compare'     => '=',
			'meta_value'       => 'on',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$orbit_posts = get_posts( $args ); ?>
		<div class="slideshow-wrapper">
			<ul data-orbit>
			<?php foreach( $orbit_posts as $orbit_post ) { ?>
				<?php $orbit_excerpt = $orbit_post->post_excerpt; ?>
					<li>
						<a href="<?php echo get_permalink( $orbit_post->ID ); ?>" title="<?php echo esc_attr( $orbit_post->post_title ); ?>">
							<?php echo has_post_thumbnail( $orbit_post->ID ) ? get_the_post_thumbnail( $orbit_post->ID, 'full' ) : '<img src="' . get_template_directory_uri() . '/img/slider_placeholder.png' . '" width="720" height="450" />'; ?>
						</a>
						<div class="orbit-caption ece-white-text">
							<a href="<?php echo get_permalink( $orbit_post->ID ); ?>" title="<?php echo esc_attr( $orbit_post->post_title ); ?>"><h6 class="ece-white-text"><?php echo esc_attr( $orbit_post->post_title ); ?></h6></a>
							<?php echo '<p class="ece-white-text">' . $orbit_excerpt . '</p>'; ?>
						</div>
					</li>
			<?php } ?>
			</ul>
		</div>
	<?php }
}

/**
 * make_frontpage_widget_primary_one function
 * This function creates widget area one for the front page
 */
if( !function_exists( 'make_frontpage_widget_primary_one' ) ) {

	function make_frontpage_widget_primary_one() { ?>
		<aside class="large-3 small-12 columns sidebar">
			<?php if( dynamic_sidebar('foundation_sidebar_frontpage_primary_one') ) : elseif( current_user_can( 'edit_theme_options' ) ): ?>
				<h5><?php _e( 'No widgets found.', 'foundation' ); ?></h5>
				<p><?php printf( __( 'It seems you don\'t have any widgets in your sidebar! Would you like to %s now?', 'foundation' ), '<a href=" '. get_admin_url( '', 'widgets.php' ) .' ">populate your sidebar</a>' ); ?></p>
			<?php endif; ?>
		</aside>
	<?php }
}

/**
 * make_frontpage_widget_primary_two function
 * This function creates widget area two for the front page
 */
if( !function_exists( 'make_frontpage_widget_primary_two' ) ) {
	
	function make_frontpage_widget_primary_two() { ?>
		<aside class="large-3 small-12 columns sidebar">
			<?php if( dynamic_sidebar('foundation_sidebar_frontpage_primary_two') ) : elseif( current_user_can( 'edit_theme_options' ) ): ?>
				<h5><?php _e( 'No widgets found.', 'foundation' ); ?></h5>
				<p><?php printf( __( 'It seems you don\'t have any widgets in your sidebar! Would you like to %s now?', 'foundation' ), '<a href=" '. get_admin_url( '', 'widgets.php' ) .' ">populate your sidebar</a>' ); ?></p>
			<?php endif; ?>			
		</aside>
	<?php }
}


/** UBC ECESS END **/


