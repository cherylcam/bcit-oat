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

		
				echo '<div class="staff-container">';		
				echo '<p> Name: ';
				echo '<b class="schedule-title">' . the_sub_field('faculty_name') . '</b>';
				echo '</p>';
				echo '<p> Role:  ';
				echo '<b>' . the_sub_field('faculty_position') . '</b>';
				echo '</p>';
				echo '<p> Number:   ';
				echo '<b>' . the_sub_field('faculty_number') . '</b>';
				echo '</p>';
				echo '<p>  Email:   ';
				echo '<b>' . the_sub_field('faculty_email') . '</b>';
				echo '</p>';
				echo '</div>';


			endwhile;

			else :

			// no rows found

			endif;
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
