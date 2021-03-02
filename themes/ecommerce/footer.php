<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecommerce
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center-middle">
				<div class="small-12">
					<div class="grid-x">
						<div class="small-12 medium-4 footer-links">
							<div class="small-12 footer-links-title">Links</div>
							<?php 
								wp_nav_menu(
									array(
										'theme_location' => 'footer-links'
									)
								);
							?>
						</div>
						<div class="small-12 medium-4 footer-links text-center">
							<div class="small-12 footer-links-title">Company</div>
							<?php 
								wp_nav_menu(
									array(
										'theme_location' => 'footer-links-company'
									)
								);
							?>
						</div>
						<div class="small-12 medium-4 footer-links text-right">
							<div class="small-12 footer-links-title">Social</div>
							<?php 
								wp_nav_menu(
									array(
										'theme_location' => 'footer-links-social'
									)
								);
							?>
						</div>
					</div>
				</div>
				<div class="small-12 text-center footer-bottom">
					&copy; 2021 <?php bloginfo( 'name' ); ?>.
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
