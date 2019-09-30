<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */


get_header();

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			$args = array(
				'post_type' 		=> 'tablepress_table',
				'posts_per_page'	=> -1 
			);

			$query = new WP_Query( $args );

			while ($query->have_posts()):
				$query->the_post();
				$table_data 	= json_decode(get_the_content());
				$table_headers	= array("Weekday","Week","Date", "Class", "Room", "Instructor");
			foreach ($table_data as $item):
				$month = date("F", strtotime($item[1]));
				$schedule[$month][] = $item;
			endforeach;?>
			
			<div class="schedule">
				<div class="buttons">
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			
			<div class="swiper-container">
				<div class="swiper-wrapper">
						<?php foreach ($schedule as $month => $monthlySchedule):?>
							<div class="swiper-slide">
								<div class="schedule-header">
									<h1><?php echo $month; ?></h1>	
								</div>								
								<table>
									<?php foreach ($table_headers as $table_header):?>
										<th><?php echo $table_header; ?> </th>
									<?php endforeach;?>

									<?php foreach ($monthlySchedule as $weeks):
									// Add the appropriate weekday to the array 
									$weekday = date("D", strtotime($weeks[1])); 
									array_unshift($weeks, $weekday);

									// Format the date
									for ($i = 0; $i < count($weeks); $i++):
										$formatedDate = date("F d, Y", strtotime($weeks[2]));
										$weeks[2] = $formatedDate;
									endfor;
									?>
										<tr>
											<?php 
											for ($j=0; $j < count($table_headers);$j++):
												if ($weeks[6]):?>
													<td class="weekend">
														<?php echo $weeks[$j]; ?>
													</td>
												<?php else: ?>
													<td class="weekday">
														<?php echo $weeks[$j] ?>
													</td>
												<?php endif; ?>

											<?php endfor;?>
										</tr>
									<?php endforeach;?>
								</table>
							</div>
						<?php endforeach; ?>
					</div>
					    <div class="swiper-pagination"></div>

				</div>
				</div>
				<?php endwhile;

				wp_reset_postdata();

				/* Start the Loop */
			
				?>

			</main><!-- #main -->
		</section><!-- #primary -->
	<?php

	get_footer();
				