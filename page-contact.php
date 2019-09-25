<?php
/**
 * The template for displaying the contact page.
 *
 * This is the template that displays the contact page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcit-oat
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php
			if( have_rows('faculty_staff') ):

				echo '<h1>';
				the_title();
				echo '</h1>';

			while ( have_rows('faculty_staff') ) : the_row();			
		?>
		
		<h2>Faculty Contact</h2>
			<div class="faculty-staff">
				
				<p class="faculty-name">
					<?php
						echo  the_sub_field('faculty_name');
					?>
			  	</p>
				<p class="faculty-position">
					<?php
						echo the_sub_field('faculty_position');
					?>
				</p>
				<p class="faculty-number">
					<?php
						the_sub_field('faculty_number');
					?>
				</p>
				<p class="faculty-email">
					<?php
						echo the_sub_field('faculty_email');
					?>
				</p>
			</div>	

			<!-- Program Info -->

		<?php
			if( have_rows('program_info') ):

			while ( have_rows('program_info') ) : the_row();			
		?>

		<h2>Program Location</h2>
			<div class="program-location">
	
				<p class="program-name">
					<?php
						echo  the_sub_field('program_name');
					?>
			  	</p>
				<p class="program-location">
					<?php
						echo the_sub_field('program_location');
					?>
				</p>
				<p class="program-phone">
					<?php
						echo the_sub_field('program_phone');
					?>
				</p>
				<p class="program-email">
					<?php
						echo the_sub_field('program_email');
					?>
				</p>
				<p class="program-website">
						<a href=" <?php echo  the_sub_field('program_website'); ?> " target="_blank"><?php echo the_sub_field('program_website'); ?></a>
				</p>
				<p class="bcit-website">
						<a href=" <?php echo  the_sub_field('bcit_website'); ?> " target="_blank"><?php echo the_sub_field('bcit_website'); ?></a>
				</p>
			</div>	

			<div class="bcit-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.6312010021024!2d-123.11752518431048!3d49.28338507933136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54867178c92a69b9%3A0x6b40938af55472d6!2s555+Seymour+St%2C+Vancouver%2C+BC+V6B+3H6!5e0!3m2!1sen!2sca!4v1566424196502!5m2!1sen!2sca" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
			</div>
			
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
		
			endwhile;

			else :

			// no rows found

			endif;

			endwhile;

			else :

			// no rows found

			endif;
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
