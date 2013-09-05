<?php
/**
 * Content Single
 *
 * Loop content in single post template (single.php)
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<hgroup>
			<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h6 class="small spacedcaps"><?php _e('Posted by', 'foundation' );?> <?php the_author_posts_link(); ?> on <?php the_time(get_option('date_format')); ?></h6>
		</hgroup>
	</header>


	<?php $meta_data =  get_post_meta( get_the_ID() ); ?>
	<hr />
	<?php if( esc_attr( $meta_data['_ubcecess_featured_image_in_post'][0] ) === 'on' ): ?>
		<?php if ( has_post_thumbnail()) : ?>
		<div class="row">
			<div class="large-12 columns">
				<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?></a>
			</div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="row">
		<div class="large-12 columns">
			<?php the_content(); ?>
		</div>
	</div>
	
	<hr />

	<footer>

		<p><?php wp_link_pages(); ?></p>

		<h6 class="smallspacedcaps"><?php _e('Posted Under:', 'foundation' );?> <?php the_category(', '); ?></h6><br>
		<?php the_tags('<span class="radius secondary label">','</span><span class="radius secondary label">','</span>'); ?>

		<?php get_template_part('author-box'); ?>
		<?php comments_template(); ?>

	</footer>

</article>

<hr />
