<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bcit-oat
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class='footer-headings'>
				<h3>Students</h3>
				<h3>Program</h3>
				<h3>Find Us</h3>
			</div>

			<div class='footer-links'>
				<div class='footer-section'>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-students',
							'menu_id'        => 'footer-students',
						) );
					?>
				</div>
				
				<div class='footer-section'>
					<?php

						wp_nav_menu( array(
							'theme_location' => 'footer-program',
							'menu_id'        => 'footer-program',
						) );
					?>
				</div>

				<div class='footer-section'>
					<p>
						British Columbia Institute of Technology
						555 Seymour St
						Vancouver, BC
						V6B 3H6
					</p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
