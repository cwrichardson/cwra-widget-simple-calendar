<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information
 * in the plugin admin area. This file also includes all of the
 * dependencies used by the plugin, registers the activation and
 * deactivation functions, and defines a function that starts the
 * plugin.
 *
 * @link              https://www.cwrichardson.com/open-source/
 * @since             0.99.1
 * @package           CWRA_Widget_Simple_Calendar
 *
 * @wordpress-plugin
 * Plugin Name:       CWR+A Widget Simple Calendar
 * Plugin URI:        https://www.cwrichardson.com/open-source/cwra-widget-simple-calendar
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.99.1
 * Author:            Chris Richardson
 * Author URI:        https://www.chrisrichardson.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cwra-widget-simple-calendar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.99.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CWRA_WIDGET_SIMPLE_CALENDAR_VERSION', '0.99.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in
 * includes/class-cwra-widget-simple-calendar-activator.php
 */
function activate_cwra_widget_simple_calendar() {
	require_once plugin_dir_path( __FILE__ )
	    . 'includes/class-cwra-widget-simple-calendar-activator.php';
	CWRA_Widget_Simple_Calendar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in
 * includes/class-cwra-widget-simple-calendar-deactivator.php
 */
function deactivate_cwra_widget_simple_calendar() {
	require_once plugin_dir_path( __FILE__ )
	    . 'includes/class-cwra-widget-simple-calendar-deactivator.php';
	CWRA_Widget_Simple_Calendar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cwra_widget_simple_calendar' );
register_deactivation_hook( __FILE__,
    'deactivate_cwra_widget_simple_calendar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ )
    . 'includes/class-cwra-widget-simple-calendar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.99.1
 */
function run_cwra_widget_simple_calendar() {

	$plugin = new CWRA_Widget_Simple_Calendar();
	$plugin->run();

}
run_cwra_widget_simple_calendar();
