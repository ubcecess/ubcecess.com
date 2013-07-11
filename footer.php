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
<div class="push"></div>
</div>
<!-- End Page -->

<!-- Footer -->
<hr/>
<footer class="ece-footer">

<?php if ( dynamic_sidebar('Sidebar Footer One') || dynamic_sidebar('Sidebar Footer Two') || dynamic_sidebar('Sidebar Footer Three') || dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>

<div class="large-12 columns">
	<!--<ul class="inline-list">
	<?php wp_list_pages('title_li='); ?>
	</ul>-->
	<div class="row">
		<div class="large-4 columns">
			<dl>
				<h6 class="h6footer"><strong>Contact Us</strong></h6>
				<?php echo "<a href=\"mailto: contact@ubcecess.com\">";?>contact@ubcecess.com</a><br>
				Macleod Building, Room 434<br>
				University of British Columbia<br>
				2356 Main Mall<br>
				Vancouver, V6T 1Z4
				
			</dl>
		</div>
		<div class="large-4 large-offset-2 columns">
			<dt><h6 class="h6footer">Social Media</h6></dt>
			<ul class="small-block-grid-2">
				<li>Facebook</li>
				<li>Twitter</li>
				<li>Google+</li>
				<li>YOLO</li>
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