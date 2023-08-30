<?php

/**
 * Site Prefix
 */
if( !defined('COURSES_SITE_PREFIX') ) {
	define( 'COURSES_SITE_PREFIX', 'courses-' );
}

/**
 * Plugin Directory
 */
if( !defined('COURSES_PLUGIN_DIR') ) {
	define( 'COURSES_PLUGIN_DIR', dirname( __FILE__ ) . '/..' );
}

/**
 * Site Prefix
 */
if( !defined('COURSES_SLUG') ) {
	define( 'COURSES_SLUG', 'plugin-courses' );
}

/*
 * Lecture Series Listing Cache Time for featured items
 */
if( !defined( 'COURSES_CACHE_TIME' ) ) {
	define( 'COURSES_CACHE_TIME', 1800 ); //30 * 60
}

/**
 * Lecture Series Options name in cms settings
 */
if( !defined( 'COURSES_OPTIONS_NAME' ) ) {
  define( 'COURSES_OPTIONS_NAME', 'plugin_courses_options_name' );
}