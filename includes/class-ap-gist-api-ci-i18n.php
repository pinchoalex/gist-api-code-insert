<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 *
 * @package    Ap_Gist_Api_Ci
 * @subpackage Ap_Gist_Api_Ci/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ap_Gist_Api_Ci
 * @subpackage Ap_Gist_Api_Ci/includes
 * @author     Alex Pinkevych <pinchoalex@gmail.com>
 */
class Ap_Gist_Api_Ci_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ap-gist-api-ci',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
