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
	echo "<p>hiiii</p>";
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
