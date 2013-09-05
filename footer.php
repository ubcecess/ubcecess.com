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
<!--<footer>-->
<?php //if ( dynamic_sidebar('Sidebar Footer One') || dynamic_sidebar('Sidebar Footer Two') || dynamic_sidebar('Sidebar Footer Three') || dynamic_sidebar('Sidebar Footer Four')  ) : else : ?>

<div class="content-text">
<!--
<div class="">
	<div class="ece-sponsor-footer large-12 columns">
		<div class="row">
			<h3>Our Sponsors</h3>
				The UBC Electrical & Computer Engineering Student Student (ECESS) would like to thank all our sponsors for their support.<BR><BR>
		</div>
		
		<div class="row">
				<ul class="inline-list">
				<li><a class="ece-footer-icons" href="https://www.facebook.com/groups/ubcecess/" alt="Join the Facebook Group"><i class="icon-facebook-sign"></i></a></li>
				<li><a class="ece-footer-icons" href="https://twitter.com/ubcecess" alt="Follow us on Twitter"><i class="icon-twitter"></i></a></li>
				<li><a class="ece-footer-icons" href="#"><i class="icon-google-plus-sign" alt="Add us to your circles in G+"></i></a></li>
				<li><a class="ece-footer-icons" href="#"><i class="icon-rss-sign" alt="Subscribe to the RSS feed"></i></a></li>
			</ul>
		</div>
	</div>

</div>-->

	<div class="ece-footer large-12 columns">
		<div class="row">	
			<div class="large-4 columns">
				<dl>
					<h6 class="spacedcaps" style="color:#ededed; font-weight:bold;">Contact Us</h6>
					<?php echo "<a href=\"mailto: contact@ubcecess.com\">";?>contact@ubcecess.com</a><br>
					Macleod Building, Room 434<br>
					University of British Columbia<br>
					2356 Main Mall<br>
					Vancouver, V6T 1Z4
				</dl>
			</div>
			<div class="large-4 columns">
				<dt><h6 class="spacedcaps" style="color:#ededed; font-weight:bold;">Stay Connected</h6></dt>
				<ul class="small-block-grid-4">
					<li><a class="ece-footer-icons" href="https://www.facebook.com/groups/ubcecess/" alt="Join the Facebook Group"><i class="icon-facebook-sign"></i></a></li>
					<li><a class="ece-footer-icons" href="https://twitter.com/ubcecess" alt="Follow us on Twitter"><i class="icon-twitter"></i></a></li>
					<!--<li><a class="ece-footer-icons" href="#"><i class="icon-google-plus-sign" alt="Add us to your circles in G+"></i></a></li>
					<li><a class="ece-footer-icons" href="#"><i class="icon-rss-sign" alt="Subscribe to the RSS feed"></i></a></li>-->
				</ul>
			</div>
		</div>
	</div>
<?php //endif; ?>
</div>
<!--</footer>-->
<!-- End Footer -->

<?php wp_footer(); ?>

</body>
</html>