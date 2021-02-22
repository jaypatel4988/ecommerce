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

</div>

	<footer id="colophon" class="site-footer">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center-middle">
				<div class="small-4">
					&copy; 2021 <?php bloginfo( 'name' ); ?>.
				</div>
				<div class="small-4">
					<div class="grid-x">
						<div class="small-4">
							<a href="">Contact</a>
						</div>
						<div class="small-4">
							<a href="">Policy</a>
						</div>
						<div class="small-4">
							<a href="">Return</a>
						</div>
					</div>
				</div>
				<div class="small-4">
					<div class="grid-x">
						<div class="small-4 small-offset-4">
							<a href="">Facebook</a>
						</div>
						<div class="small-4">
							<a href="">Instagram</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
