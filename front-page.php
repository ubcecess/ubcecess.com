<?php
/**
 * Frontpage
 *
 * Slider
 * Content
 *
 * Loop container for page content
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 **/

get_header(); 

//$posts = get_posts();
?>
	
	<!-- Content Container -->
	<div class="large-12 columns">
		<!-- Slider and Main Container -->
		<div class="row">
			<!-- Slider -->
			<div class="large-9 columns">
				<?php foundation_orbit(); ?>
			</div>
			<!-- End Slider -->
			<?php make_frontpage_widget_primary_one(); ?>
		</div>
		<div class="row">
			<!-- Main Content -->
			<div class="large-8 columns" role="main">
				<?php
				if( have_posts() ):
					while( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );
					endwhile;
				else:
					?>
					<h2><?php _e( 'No posts.', 'foundation' ); ?></h2>
					<p class="lead"><?php _e( 'Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
					<?php
				endif;
				?>
			</div>
			<!-- End Main Content -->
			<?php make_frontpage_widget_primary_two(); ?>
		</div>
		<!-- End Slider and Main Container -->
	</div>
	<!-- End Content Container -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>