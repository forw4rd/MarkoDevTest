<?php

/**
 * @package  MarkoDevTest
 */
/*
Plugin Name: MarkoDevTest Plugin
Plugin URI: http://wp.local
Description: This is my first attempt on writing a custom Plugin for this amazing dev test.
Version: 1.0.0
Author: Marko Jančec
Author URI: http://localhost
License: GPLv2 or later
Text Domain: MarkoDevTest
*/
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_test_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_test_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_test_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_test_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
