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

    $totalNumberOfDays = count($allMonths);
    $currentDay = 0;
		 
		//  while $totalNumberOfDays > currentNumber of day

    date_default_timezone_set('America/Vancouver');

    //Formats to get the correct schedule data
    $currentMonth = date('F');
    $today = date("j") ;
    

    //Formats for the UI
    $weekdayUI = date("D");
    $monthUI    = date("M");

    $weekdayUItomorrow = date("D"); 
    ?>

   
    <a href="/oat/schedule">
    <div class="schedule-widget">
        <div class="widget-date">
            <p class="widget-weekday">
                <?php echo $weekdayUI; ?>
            </p>
            <p class="widget-month">
                <?php echo $monthUI ?>
            </p>
            <p class="widget-day">
                <?php echo $today ?>
            </p>

        </div>

        <div class="widget-info">
            <?php if (date("H") >= 17 || $weekdayUI == "Sun" || $schedule[$month][$today][5] == 1): // after 17, Sunday, or holiday  ?> 
                <h3>Tomorrow's class</h3>
                <p class="widget-class">
                    <?php echo ($schedule[$currentMonth][$today][2])  // Weekdays start at 1 in php?> 
                </p>
                <p class="widget-instructor">
                    <?php echo ($schedule[$currentMonth][$today][4]) ?>
                </p>
                <?php if ($schedule[$month][$today][5] != 1): ?>
                    <p class="widget-room ">
                    Room:  <?php echo ($schedule[$currentMonth][$today][3]) ?>
                    </p>
                <?php endif; ?>
            <?php elseif ($weekday == "Sat"):?>
                <h3>Mondays's class</h3>
                <p class="widget-class ">
                    <?php echo ($schedule[$currentMonth][$today + 1][2]) ?> 
                </p>
                <p class="widget-instructor ">
                    <?php echo ($schedule[$currentMonth][$today + 1][4]) ?>
                </p>
                <?php if ($schedule[$month][$today + 1 ][5] != 1): ?>
                    <p class="widget-room ">
                    Room:  <?php echo ($schedule[$currentMonth][$today + 1][3]) ?>
                    </p>
                <?php endif; ?>
            <?php elseif ($weekday == "Fri" && date("H") >= 17):?>
                <h3>Mondays's class</h3>
                <p class="widget-class ">
                    <?php echo ($schedule[$currentMonth][$today + 2][2])  ?> 
                </p>
                <p class="widget-instructor ">
                    <?php echo ($schedule[$currentMonth][$today + 2][4]) ?>
                </p>
                <?php if ($schedule[$month][$today + 2][5] != 1): ?>
                    <p class="widget-room ">
                    Room:  <?php echo ($schedule[$currentMonth][$today + 2][3]) ?>
                    </p>
                <?php endif; ?>
            <?php else: ?>
            <h3>Today's class</h3>
                <p class="widget-class">
                    <?php echo ($schedule[$currentMonth][$today - 1][2])  // Minus 1 because weekdays start at 1 in php?> 
                </p>
                <p class="widget-instructor">
                    <?php echo ($schedule[$currentMonth][$today - 1][4]) ?>
                </p>
                 <?php if ($schedule[$month][$today - 1][5] != 1): ?>
                    <p class="widget-room ">
                    Room:  <?php echo ($schedule[$currentMonth][$today - 1][3]) ?>
                    </p>
                <?php endif; ?>
            <?php endif; ?>
            <?php $currentDay++; ?>
        </div>
    </div>
    </a>

    

<?php endwhile; ?>


