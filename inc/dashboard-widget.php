<?php
/**
 * Add a new dashboard widget.
 */
function oat_add_dashboard_widgets() {
    wp_add_dashboard_widget( 
        'oat_dashboard_widget', 
        esc_html__( 'WELCOME', 'oat' ), 
        'oat_welcome_dashboard_function'
	);
	
	wp_add_dashboard_widget(
		'custom_help_widget', 
		'HOW TO ADD A NEW COURSE', 
		'add_course_tutorial'
	);

    wp_add_dashboard_widget(
		'schedule_tutorial_widget', 
		'How to update the schedule', 
		'update_schedule_tutorial'
	);
	
}
add_action( 'wp_dashboard_setup', 'oat_add_dashboard_widgets' );

/**
 * Output the contents of the welcome dashboard widget
 */
function oat_welcome_dashboard_function( $post, $callback_args ) {
    echo "<h1>Hello there, welcome to BCIT OAT dashboard!</h1>";
}

/**
 * Output the contents of tutorials
*/
function add_course_tutorial() {
 	echo "<p>Hiii</p>";

	?>
	<!-- <video width="320" height="240" controls>
		<source src="./tutorials/add-new-course.mp4" type="video/mp4">
    </video> -->
    <img src="/images/oat-logo.jpg" alt="test">
	<?php
}

function update_schedule_tutorial(){
    echo "<ol>";
        echo "<li>";
        echo "Select 'TablePress' in the sidebar";
        echo "<img src='images/schedule_tutorial/schedule_tutorial_1.png'</img>";
        echo "</li>";
        echo "<li>";
        echo "Select 'Import' and choose the .csv-file you want the update, please make sure to always use the same format";
        echo "<img src='images/schedule_tutorial/schedule_tutorial_2.png'</img>";
        echo "</li>";
        echo "<li>";
        echo "Click on 'Replace existing table' and select the table you want to replace";
        echo "<img src='images/schedule_tutorial/schedule_tutorial_3.png'</img>";
        echo "</li>";
         echo "<li>";
        echo "Save the changes and you're done!";
        echo "</li>";
    echo "</ol>";
}

function oat_remove_all_dashboard_metaboxes() {
    // Remove Welcome panel
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    // Remove the rest of the dashboard widgets
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'oat_remove_all_dashboard_metaboxes' );
