<?php

namespace PluginCourses\Api;

//use PluginCourses\Post\Query;
use PluginCourses\Util\ViewRenderer;
use PluginCourses\Api\Query;

class Api
{
    /**
	 * This function renders templates on specified path
	 * @param  string $template_path
	 * @param  array $data
	 */
	public static function render($template_path, $data)
	{
		$vr = new ViewRenderer(courses_template_path($template_path), $data);
		$vr->render();
	}

	public static function get_filtered_courses($params) {
		$courses = Query::get_filtered_courses($params);
		return $courses;
	}

	public static function get_page_details() {
		$listing = Query::get_page_details();
		return $listing;
	}

	/**
	 * Get the gallery data by post ID
	 *
	 * @param [type] $course_id
	 * @return array $data
	 */
	public static function get_course_data($course_id)
	{
		try {	
			$data = Query::get_course_data($course_id);
			return $data;
		} catch (\Exception $ex) {
			error_log( $ex->getMessage() );
			return array();
		}
	}

}