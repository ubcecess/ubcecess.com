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
				<dt><h5><strong>Contact Us</h5></strong></dt>
				<dt><h6><?php echo "<a href=\"mailto: contact@ubcecess.com\">";?>contact@ubcecess.com</a></dt></h6>
				<dt><h6>Macleod Building, Room 434</dt></h6>
				<dt><h6>University of British Columbia</dt></h6>
				<dt><h6>2356 Main Mall</dt></h6>
				<dt><h6>Vancouver, V6T 1Z4</dt></h6>
				
			</dl>
		</div>
		<div class="large-4 large-offset-2 columns">
			<dt><h5><strong>Social Media</h5></strong></dt>
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