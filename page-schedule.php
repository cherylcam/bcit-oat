<?php
/**
 * The template for displaying the schedule page.
 *
 * This is the template that displays the schedule page.
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

			$args = array(
				'post_type' 		=> 'tablepress_table',
				'posts_per_page'	=> -1 
			);

			$query = new WP_Query( $args );

			while ( $query->have_posts() ):
				$query->the_post();

				$table_data = get_the_content();
				$days = json_decode($table_data, false);
				$headers = array("Weekday","Week","Date", "Class", "Room", "Instructor");

				// Get the month name ("F" = full textual representation of month)
				// and then push into array indexed by month
				foreach ($days as $day){
					$month = date("F", strtotime($day[1]));
					$semesterSchedule[$month][] = $day;
				};


				echo "<div class='slider'>";
				
				foreach ($semesterSchedule as $key => $monthlySchedule){
					echo "<div>";
					echo "<h1>";
					echo $key;
					echo "</h1>";
					echo "<table>";
					foreach ($headers as $header){
						echo "<th>";
						echo $header;
						echo "</th>";
					}
					foreach($monthlySchedule as $weeks){
						// Add Weekday to array
						$weekday = date("D", strtotime($weeks[1]));
						array_unshift($weeks, $weekday);
					

						// Format date
						for ($j = 0; $j < count($weeks); $j++){
							$formatedDate = date("F d, Y", strtotime($weeks[2]));
							$weeks[2] = $formatedDate;
						}	

						echo "<tr>";
						for ($k = 0; $k < count($headers); $k++){
							if ($weeks[6] > 0 ){
							echo "<td style='background-color: #4285F4'>";
							echo $weeks[$k];
							echo "</td>";
							}else {
							echo "<td>";
							echo $weeks[$k];
							echo "</td>";
							};
						}
					};
					echo "</table>";
					echo "</div>";
				};

				echo "</div>";
			endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
