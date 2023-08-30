<?php

get_header();
while ( have_posts() ) :
	
	the_post();

	// Include the page content template.
	$page_data = ThemeComponents\Pages\Standard::get_data();
	sample_theme_render( 'templates/content', 'page', $page_data );

// End the loop.
endwhile;
get_footer(); 