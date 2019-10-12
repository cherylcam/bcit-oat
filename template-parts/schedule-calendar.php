

<?php
$args = array(
	'post_type' 		=> 'tablepress_table',
	'posts_per_page'	=> -1 
);

$query = new WP_Query( $args );

while ($query->have_posts()):
	$query->the_post();
	$table_data 	= json_decode(get_the_content()); // Parsing the json into an object.
	$allMonths = array();


	foreach ($table_data as $item):
		$month = date("F", strtotime($item[1]));//Format the month to text
		$year = date("Y", strtotime($item[1])); // Get the year in the right format
		array_push($allMonths, $month);	// Push all months in an array --> It going to add the month info for every day
		$schedule[$month][] = $item; //Add the month as a key to the array
	endforeach;
?>
		<div class="schedule-calendar">
				

		
		
			<?php $months = array_unique($allMonths); // Filter out all the duplicate values
			// print_r($month);
			$numberOfDaysInMonth = array(); //Empty array to get the number of days in a month	
			$monthIndex = 0; // Define index so you can loop through all months ?>

			<!-- <div class="swiper-container">
				<div class="swiper-wrapper"> -->

			<?php foreach ($months as $month):
					$monthAsNumber = date("n", strtotime($month)); // Converting the months to a number so they can be used in cal_days_in_month function
					array_push($numberOfDaysInMonth, cal_days_in_month(CAL_GREGORIAN, $monthAsNumber, $year)); // Push the number of days for each month in an array
					$firstDay = date("N",  mktime(0, 0, 0, $monthAsNumber, 1, $year)); // Getting the first weekday of month.?>
				

					<!-- <div class="swiper-slide" slide_index=<?php echo $monthIndex?>>  -->
						<div class="schedule-header">
							<h1><?php echo $month . " " . $year ?> </h1>
							<?php print_r(count($schedule[$month])); ?>
						</div>
						<div class="calendar">
							<div class="weekdays-grid">
								<p class="weekday">Monday</p>
								<p class="weekday">Tuesday</p>
								<p class="weekday">Wednesday</p>
								<p class="weekday">Thursday</p>
								<p class="weekday">Friday</p>
								<p class="weekday">Saturday</p>
								<p class="weekday">Sunday</p>
							</div>
								<?php $dayOfMonth = 1 ?>
								<div class="date-grid">
									<?php for ($i = 0 ; $i < 5; $i ++): // Create table rows?> 
											<?php for ($j = 0; $j < 7; $j++ ): //Creating the individual cells ?>  
												<?php if ($i == 0 && $j < $firstDay - 1):  ?>
													<div class="beginning-month">
													</div>
												<?php elseif ($dayOfMonth > $numberOfDaysInMonth[$monthIndex] || $dayOfMonth > count($schedule[$month])): ?>
													<div class="end-month">
													</div>
		
												<?php else: ?>
													<div class="day-of-month" id=<?php echo "'" . $schedule[$month][$dayOfMonth - 1][1] . "'"?> >
														<?php echo $dayOfMonth ?>
														<span class="class">
															<?php echo ($schedule[$month][$dayOfMonth - 1][2]) ?> 
														</span>
																
														<span class="instructor">
															<?php echo ($schedule[$month][$dayOfMonth - 1][4])// Multidimensional array can be accessed with brackets - [2] is  the postion of the instructor ?> 
														</span>
															<?php if ($schedule[$month][$dayOfMonth - 1][5] != 1): ?>
																	<span class="room">
																		Room: <?php echo ($schedule[$month][$dayOfMonth - 1][3]) ?> 
																	</span>
																	
															<?php endif; ?>
													</div>
					
													<?php $dayOfMonth++; ?>
												<?php endif; ?>
											<?php endfor;?>
										
									<?php endfor; ?>
									</div><!-- END date-grid -->
								
						
					</table>
					<!-- </div> 	END SWIPERSLIDE -->
					<?php $monthIndex++ ?>
				<?php endforeach; ?>
			<!-- </div>  END SWIPERWRAPPER -->
		<!--</div>END SWIPPERCONTAINER -->
		</div> <!-- .END SCHEDULE-CALENDAR -->

		<?php endwhile;

		wp_reset_postdata();

		/* Start the Loop */
	
		?>

			</main><!-- #main -->
		</section><!-- #primary -->
	<?php

				
?>