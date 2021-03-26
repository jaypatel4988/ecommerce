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

			<!-- show 3 custom posts types -->
			<div class="grid-x grid-padding x-align-center-middle">
				<div class="small-12 text-center">
					<h4>Featured Shoes</h4>
				</div>
				<?php 
				$custom_posts = new WP_Query(array("post_type" => "featured"));
				
				// showing posts
				if ( $custom_posts->have_posts(  ) ) {
					while ($custom_posts->have_posts(  )) {
						$custom_posts->the_post(  );
						$image = get_the_post_thumbnail_url( $post );

						echo '<div class="small-12 medium-4">';

						echo '<a class="featured-shoe" href="'. get_post_permalink( ) .'">';

						echo '<img src="'. $image .'" />';

						echo '<div><h3>'. get_the_title() .'</h3><span>'. get_the_excerpt() .'</span></div>';

						echo '</a>';

						echo '</div>';
					}
				}
				?>
			</div>

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
