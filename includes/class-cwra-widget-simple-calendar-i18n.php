<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.cwrichardson.com/open-source/
 * @since      0.99.1
 *
 * @package    CWRA_Widget_Simple_Calendar
 * @subpackage CWRA_Widget_Simple_Calendar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.99.1
 * @package    CWRA_Widget_Simple_Calendar
 * @subpackage CWRA_Widget_Simple_Calendar/includes
 * @author     Chris Richardson <cwr@cwrichardson.com>
 */
class CWRA_Widget_Simple_Calendar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.99.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cwra-widget-simple-calendar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) )
			    . '/languages/'
		);

	}



}
