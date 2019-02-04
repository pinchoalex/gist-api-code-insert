<?php

/**
 * The plugin bootstrap file
 *
 * @since             1.0.0
 * @package           Ap_Gist_Api_Ci
 *
 * @wordpress-plugin
 * Plugin Name:       Gist API Code insert
 * Description:       Inserts Github Gist code directly in to your posts via shortcode without using js embed script
 * Version:           1.0.0
 * Author:            Alex Pinkevych
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ap-gist-api-ci
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ap-gist-api-ci-activator.php
 */
function activate_ap_gist_api_ci() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ap-gist-api-ci-activator.php';
	Ap_Gist_Api_Ci_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ap-gist-api-ci-deactivator.php
 */
function deactivate_ap_gist_api_ci() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ap-gist-api-ci-deactivator.php';
	Ap_Gist_Api_Ci_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ap_gist_api_ci' );
register_deactivation_hook( __FILE__, 'deactivate_ap_gist_api_ci' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ap-gist-api-ci.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ap_gist_api_ci() {

	$plugin = new Ap_Gist_Api_Ci();
	$plugin->run();

}
run_ap_gist_api_ci();
