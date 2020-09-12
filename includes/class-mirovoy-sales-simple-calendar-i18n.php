<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://example.com
 * @since      0.99.1
 *
 * @package    Mirovoy_Sales_Simple_Calendar
 * @subpackage Mirovoy_Sales_Simple_Calendar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.99.1
 * @package    Mirovoy_Sales_Simple_Calendar
 * @subpackage Mirovoy_Sales_Simple_Calendar/includes
 * @author     Your Name <email@example.com>
 */
class Mirovoy_Sales_Simple_Calendar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.99.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mirovoy-sales-simple-calendar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) )
			  . '/languages/'
		);

	}



}
