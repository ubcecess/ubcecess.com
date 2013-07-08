<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

</div>
<!-- End Page -->

<!-- Footer -->
<hr/>
<footer class="row">

<?php if ( dynamic_sidebar('Sidebar Footer One') || dynamic_sidebar('Sidebar Footer Two') || dynamic_sidebar('Sidebar Footer Three') || dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>

<div class="large-12 columns">
	<!--<ul class="inline-list">
	<?php wp_list_pages('title_li='); ?>
	</ul>-->
	<div class="row">
		<div class="large-4 columns">
			<dl>
				<dt><?php bloginfo( 'name' ); ?></dt>
				<dt>Address</dt>
				<dt>City, Provice, Country</dt>
				<dt>email</dt>
			</dl>
		</div>
		<div class="large-4 large-offset-2 columns">
			<ul class="small-block-grid-2">
				<li>facebook</li>
				<li>twitter</li>
				<li>google+</li>
				<li>yolo</li>
			</ul>
		</div>
	</div>
</div>

<?php endif; ?>

</footer>
<!-- End Footer -->

<?php wp_footer(); ?>

</body>
</html>