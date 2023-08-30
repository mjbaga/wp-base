<?php
/**
 * The template for displaying single event template
 */

use PluginCourses\Api\Api;

get_header(); ?>
<div class="scroll-wrap">
<?php
while( have_posts() ) {
  
	the_post();

	$template = 'content-course-details.php';

	$data = Api::get_course_data();

	Api::render($template, $data);
    
}

get_footer();
