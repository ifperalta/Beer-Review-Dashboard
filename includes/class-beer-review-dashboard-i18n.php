<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ianperalta.dev
 * @since      1.0.0
 *
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/includes
 * @author     Ian Peralta <ifransperalta@gmail.com>
 */
class Beer_Review_Dashboard_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'beer-review-dashboard',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
