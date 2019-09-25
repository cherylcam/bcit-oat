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
			<div class="faculty-staff">
				<h2>Faculty Contact</h2>
				<p>Name:
					<?php
						echo '<b class="faculty-name">' . the_sub_field('faculty_name') . '</b>';
					?>
			  	</p>
				<p> Role: 
					<?php
						echo '<b class="faculty-position">' . the_sub_field('faculty_position') . '</b>';
					?>
				</p>
				<p> Number: 
					<?php
						echo '<b class="faculty-number">' . the_sub_field('faculty_number') . '</b>';
					?>
				</p>
				<p> Email: 
					<?php
						echo '<b class="faculty-email">' . the_sub_field('faculty_email') . '</b>';
					?>
				</p>
			</div>	

			<!-- Program Info -->

		<?php
			if( have_rows('program_info') ):

			while ( have_rows('program_info') ) : the_row();			
		?>

			<div class="program-location">
				<h2>Program Location</h2>
				<p>Program Name:
					<?php
						echo '<b class="program-name">' . the_sub_field('program_name') . '</b>';
					?>
			  	</p>
				<p> Location: 
					<?php
						echo '<b class="program-location">' . the_sub_field('program_location') . '</b>';
					?>
				</p>
				<p> Number: 
					<?php
						echo '<b class="program-phone">' . the_sub_field('program_phone') . '</b>';
					?>
				</p>
				<p> Email: 
					<?php
						echo '<b class="program-email">' . the_sub_field('program_email') . '</b>';
					?>
				</p>
				<p> Website: 
					<?php
						echo '<b class="program-website">' ?> 
						<a href=" <?php echo  the_sub_field('program_website') ?> " target="_blank"><?php echo the_sub_field('program_website') ?></a></b>
				</p>
				<p> BCIT: 
					<?php
						echo '<b class="bcit-website">' ?> 
						<a href=" <?php echo  the_sub_field('bcit_website') ?> " target="_blank"><?php echo the_sub_field('bcit_website') ?></a></b>
				</p>
			</div>	

			<div class="bcit-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.6312010021024!2d-123.11752518431048!3d49.28338507933136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54867178c92a69b9%3A0x6b40938af55472d6!2s555+Seymour+St%2C+Vancouver%2C+BC+V6B+3H6!5e0!3m2!1sen!2sca!4v1566424196502!5m2!1sen!2sca" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
			</div>

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
