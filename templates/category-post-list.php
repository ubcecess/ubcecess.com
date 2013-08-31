<?php /*
Template Name: Category Post List (Permalink=Category name)
*/ ?>

<?php get_header(); ?>

<div class="large-9 columns" role="main">

<?php query_posts('category_name='.get_permalink().'&post_status=publish');?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Starting post excerpt formatting (same as content.php) -->
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
				<h6 class="h6postmetadata">Posted by <?php the_author_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
		</header>
		<?php the_excerpt(); ?>
		<hr>
<!-- End post excerpt formating -->
<?php endwhile; ?>

<?php else : ?>

<div>
  <h2><a href="<?php the_permalink() ?>">Not Found</a></h2>
  <div><p>Sorry, but there is no content on this page. If you feel this is an error, please contact webmaster@ubcecess.com</p></div>
</div>

<?php endif; ?>

<div>
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
<BR><BR>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>