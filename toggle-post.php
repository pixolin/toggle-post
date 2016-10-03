<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://pixolin.de
 * @since             1.0.0
 * @package           Toggle_Post
 *
 * @wordpress-plugin
 * Plugin Name:       Toggle Post
 * Plugin URI:        https://github.com/pixolin/toggle-post
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Bego Mario Garde
 * Author URI:        https://pixolin.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       toggle-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-toggle-post-activator.php
 */
function activate_toggle_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-toggle-post-activator.php';
	Toggle_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-toggle-post-deactivator.php
 */
function deactivate_toggle_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-toggle-post-deactivator.php';
	Toggle_Post_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_toggle_post' );
register_deactivation_hook( __FILE__, 'deactivate_toggle_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-toggle-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_toggle_post() {

	$plugin = new Toggle_Post();
	$plugin->run();

}
run_toggle_post();
