<?php 
/**
 * Plugin Name: Courses
 * Description: Bespoke plugin to create Courses Post functionalities to display across the website
 * Version: 1.0
 * Author: Marvin Jayson Baga
 * Email: mjdbaga@gmail.com
 */

 if( !defined('ABSPATH'))
    die('Access denied.');

require_once dirname( __FILE__ ) . '/includes/plugin-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if( !class_exists( 'Page_Template_Plugin' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/tommcfarlin/page-template-example/class-page-template-example.php';
}

/** Return Plugin Directory Path */
function courses_plugin_path () {
	return plugin_dir_path( __FILE__ );
}

/**
 * Returns the absolute path of the specified template
 *
 * @param       string $template template path relative to templates directory
 *
 * @return      string absolute path to template
 */
function courses_template_path ($template) {
	return courses_plugin_path() . 'templates/' . $template;
}

/**
 * Autoloader for Plugin classes
 *
 * @param       string $className Name of the class that shall be loaded
 */
function courses_autoload ($className) {

	$filepath = courses_plugin_path() . '/' . str_replace('\\', '/', $className) . '.php';

	if (file_exists($filepath))
		require_once($filepath);
}

spl_autoload_register('courses_autoload');

$courses = PluginCourses\Courses::get_instance();