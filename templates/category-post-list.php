<?php
/*
Template Name: Category Post List (Permalink=Category name)
Credit: nathanrice @ wordpress for code for fixing pagination in a custom page template
*/

get_header(); ?>

<!-- Main Content -->
<div class="large-9 columns" role="main">
<?php the_title('<h2>', '</h2>'); ?>
 
                <?php
                if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) {
                        $paged = get_query_var('page');
                } else {
                        $paged = 1;
                }
                query_posts(  array ( 'category_name' => get_permalink(), 'post_type' => 'post', 'paged' => $paged )  );
                if ( have_posts() ) : $count = 0; while ( have_posts() ) : the_post(); $count++;
                ?>
                                                                                                                               
                        <!-- Post Starts -->
                       <?php get_template_part( 'content', get_post_format() ); ?>
                                                                                       
                <?php endwhile; else: ?>
			<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
               
                <?php endif; ?>  
       
 
               <?php foundation_pagination(); ?>
               
                <?php wp_reset_query(); ?>
 
                </div><!-- #content -->
               
 
<?php
get_sidebar();
get_footer();
?>