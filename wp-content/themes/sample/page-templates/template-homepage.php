<?php
/**
 * Template Name: Homepage Template
 * 
 * Homepage Template
 * 
 */

 get_header();
 while( have_posts()) :
    the_post();

    //Include the page content template.
    $page_data = ThemeComponents\Pages\Homepage::get_data();
	sample_theme_render( 'templates/content', 'home', $page_data );

 endwhile;
 get_footer();