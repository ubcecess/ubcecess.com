<?php
/**
 * Content
 *
 * Displays content shown in the 'index.php' loop, default for 'standard' post format
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="alignleft" style="margin:0px 10px 50px 0px;">
    	<a href="<?php the_permalink() ?>">
		<?php if ( has_post_thumbnail()) : ?>
 			<?php echo get_the_post_thumbnail($post_id, 'thumbnail'); ?>
    	<?php else : ?>
    		<img src="<?php echo get_template_directory_uri(); ?>/img/thumbnail_placeholder.png" width="150" height="150"/>
		<?php endif; ?>
        </a>
	</div>
	<header>
		
			<h4><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<?php if ( is_sticky() ) : ?><span class="right radius secondary label"><?php _e( 'Sticky', 'foundation' ); ?></span><?php endif; ?>
			<h6 class="smallspacedcaps">Posted by <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
	</header>
	<?php the_excerpt(); ?>
	<hr>

</article>