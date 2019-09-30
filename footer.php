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
		<div class="footer-headings">
			<div class='footer-headings-row'>
					<h3>Students</h3>
					<h3>Program</h3>
					<h3>Find Us</h3>
			</div>
		</div>

		<div class='footer-links'>

			<img src="http://bcitoat.bcitwebdeveloper.ca/wp-content/uploads/2019/09/bcit-logo.png">
		
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
				<p>British Columbia Institute of Technology<br>555 Seymour St<br>Vancouver, BC<br>V6B 3H6<br><br></p>
				
				<p>Telephone: 604-434-5734</p>
				<p>Toll-free (Can/US): 1-866-434-1610<br><br></p>
				
				<a href='https://www.bcit.ca/contacts/'>More Contact Numbers</a>
			</div>
	</footer><!-- #colophon -->
	<span class='copyright'>Copyright &copy; BCIT OAT 2019. All rights reserved.</span>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
