<?php
/**
 * Customize Admin Menu
 */

//Activate Custom menu order & The order of the menus is top to bottom!
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		'index.php',                              // Dashboard
        'edit.php?post_type=page',                // Pages
        'tablepress',                             // schedule
        'edit.php?post_type=oat-courses',         // Courses
        'edit.php?post_type=oat-certifications',  // Certifications
        'wpcf7',                                  // Contact Form
		'upload.php',                             // Media
		'themes.php',                             // Appearance
		'plugins.php',                            // Plugins
		'users.php',                              // Users
		'tools.php',                              // Tools
		'options-general.php',                    // Settings
	);
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

//RESTRICTED FOR specific USERS

function remove_menus(){
	remove_menu_page( 'edit.php' );           //Posts
	remove_menu_page( 'edit-comments.php' );  //Comments
}
add_action('admin_menu', 'remove_menus');