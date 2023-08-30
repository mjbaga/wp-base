<?php

/**
 * Template Name: Courses Listing Page Template
 *
 * Courses Listing Page Template
 */

use PluginCourses\Api\Api;

get_header(); ?>
<div class="scroll-wrap">
<?php
while( have_posts() ):

    the_post();

    $paged = absint( get_query_var( 'paged', 1 ) );
    $perpage = get_option( 'posts_per_page' );

    $template = 'content-course-listing.php';

    $data = Api::get_page_details();
    
    wp_reset_postdata();

    Api::render($template, $data);

endwhile;

get_footer();
