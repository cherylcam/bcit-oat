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
			<div class="staff-container">
				<p>Name:
					<?php
						echo '<b class="schedule-title">' . the_sub_field('faculty_name') . '</b>';
					?>
			  	</p>
				<p> Role: 
					<?php
						echo '<b>' . the_sub_field('faculty_position') . '</b>';
					?>
				</p>
				<p> Number: 
					<?php
						echo '<b>' . the_sub_field('faculty_number') . '</b>';
					?>
				</p>
				<p> Email: 
					<?php
						echo '<b>' . the_sub_field('faculty_email') . '</b>';
					?>
				</p>



			</div>	

			<?php


			endwhile;

			else :

			// no rows found

			endif;
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
