<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ianperalta.dev
 * @since             1.0.0
 * @package           Beer_Review_Dashboard
 *
 * @wordpress-plugin
 * Plugin Name:       Beer Review
 * Plugin URI:        https://github.com/ifperalta/Beer-Review-Plugin
 * Description:       A beer review dashboard plugin
 * Version:           1.0.0
 * Author:            Ian Peralta
 * Author URI:        https://ianperalta.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       beer-review-dashboard
 * Domain Path:       /languages
 */

include plugin_dir_path( __FILE__ ) . 'utilities/class-beer-review-dashboard-loader.php';
include plugin_dir_path( __FILE__ ) . 'admin/class-beer-review-dashboard-admin.php';
include plugin_dir_path( __FILE__ ) . 'public/class-beer-review-dashboard-public.php';
include plugin_dir_path( __FILE__ ) . 'utilities/class-beer-review-dashboard.php';
include plugin_dir_path( __FILE__ ) . 'data/api.php';
include plugin_dir_path( __FILE__ ) . 'data/untappdapi.php';
include plugin_dir_path( __FILE__ ) . 'data/untappddata.php';
include plugin_dir_path( __FILE__ ) . 'utilities/utils.php';

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'BEER_REVIEW_DASHBOARD_VERSION', '1.0.0' );

function activate_beer_review_dashboard() {
	require_once plugin_dir_path( __FILE__ ) . 'utilities/class-beer-review-dashboard-activator.php';
	Beer_Review_Dashboard_Activator::activate();
}

function deactivate_beer_review_dashboard() {
	require_once plugin_dir_path( __FILE__ ) . 'utilities/class-beer-review-dashboard-deactivator.php';
	Beer_Review_Dashboard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_beer_review_dashboard' );
register_deactivation_hook( __FILE__, 'deactivate_beer_review_dashboard' );

function run_beer_review_dashboard() {
	$plugin = new Beer_Review_Dashboard();
	$plugin->run();
}
run_beer_review_dashboard();

function review_admin_menu(){
	add_menu_page('Review Settings', 'Review Settings', 'administrator', 'review-settings', '' );
	add_submenu_page('Review Settings', 'Review Settings', 'Review Settings', 'administrator', 'review-settings', 'reviewsettings');	
}
add_action('admin_menu', 'review_admin_menu');

function reviewsettings(){ 
	require_once plugin_dir_path( __FILE__ ) . 'admin/review-dashboard.php';
}