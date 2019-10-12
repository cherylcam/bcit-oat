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

    //Formats to get the correct schedule data
    $currentMonth = date('F');
    $today = date("j"); 

    //Formats for the UI
    $weekdayUI = date("D");
    $monthUI    = date("M") 
    
    
    ?>

     
 

    <div class="schedule-widget">
        <div class="widget-date">
            <p class="widget-weekday">
                <?php echo $weekdayUI; ?>
            </p>
            <p class="widget-month">
                <?php echo $monthUI . "/" . $today ?>
        </div>
        <div class="widget-info">
            <p class="widget-class">
                <?php echo ($schedule[$currentMonth][$today][2]) ?>
            </p>
            <p class="widget-instructor">
                <?php echo ($schedule[$currentMonth][$today][4]) ?>
            </p>
            <p class="widget-room">
              Room:  <?php echo ($schedule[$currentMonth][$today][3]) ?>
            </p>
        </div>
    </div>

    

<?php endwhile; ?>


