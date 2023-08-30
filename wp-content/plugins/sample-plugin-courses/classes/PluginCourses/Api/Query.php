<?php

namespace PluginCourses\Api;

class Query {

	/**
	 * Get page details for listing page
	 *
	 * @return array
	 */
	public static function get_page_details() {
		$data = array();
		$data['title'] = apply_filters( 'the_title', get_the_title());
		$data['content'] = apply_filters( 'the_content', get_the_content());
		$data['terms'] = get_terms( array(
			'taxonomy' => 'course_interests',
			'hide_empty' => false
		) );

		$args = array(
			'post_type' => 'academic-school',
			'numberposts' => -1,
			'post_status' => 'publish',
			'order' => 'asc',
			'orderby' => 'title'
		);

		$sa = get_posts($args);

		global $post;

		$schools = array();

    foreach( $sa as $post ) {
			setup_postdata( $post );

			$arr = array();
			$arr['school_id'] = $post->ID;
			$arr['school'] = $post->post_title;
			$arr['school_code'] = strtolower(get_field('school_code'));
			$schools[] = $arr;
		}

		$data['schools'] = $schools;
		$data['backlink'] = get_field('back_link');

		return $data;
	}

	public static function get_filtered_courses($params) {
		$school = $params['school'];
		$interests = $params['interests'];

		$args = array(
			'post_type' => COURSES_SLUG,
			'posts_per_page' => 100,
			'post_status' => 'publish',
			'order' => 'asc'
		);

		if($interests != 'all') {
			$selected_interests = explode(',', $interests);

			$args['tax_query'] = array(
				array(
					'taxonomy' => 'course_interests',
					'field' => 'slug',
					'terms' => $selected_interests
				)
			);
		}

		if($school != 'all') {
			$args['meta_query'] = array(
				array(
					'key' => 'academic_school',
					'value' => $school,
					'compare' => '=',
				)
			);
		}

		$courses = get_posts($args);

		$processed_courses = self::get_all_courses_data($courses);

		//arrange output
		$data = self::sortOutput($processed_courses);

		return $data;
	}

	public static function get_course_data($course_id) {
		if( !is_numeric( $course_id ) ) {
			throw new \Exception( 'Requested Course ID is not an integer' );
		}

		$data = array();

		$data['tagline'] = get_field( 'tagline', $course_id );
		$data['cta'] = get_field( 'cta', $course_id );
		$data['image_placement'] = get_field( 'image_placement', $course_id );
		$data['academic_school'] = get_field( 'academic_school', $course_id );
	
		return $data;
	}

	public static function get_all_courses_data($courses) {

		global $post;

		$data = array();

    foreach( $courses as $post ) {
			setup_postdata( $post );

			$cta = get_field('cta');

			$course = array();
			$course['link'] = !empty($cta) ? $cta['url'] : '#';
			$course['name'] = apply_filters( 'the_title', get_the_title());
			$course['courseCode'] = get_field('course_code');
			$abbrv = get_field('academic_school');

			$course['abbrv'] = strtolower(get_field('school_code', $abbrv->ID));

			$data[] = $course;
		}

		return $data;
	}

	public static function sortOutput($processed_courses) {

		$data = array();

		$school_args = array(
			'post_type' => 'academic-school',
			'numberposts' => -1,
			'post_status' => 'publish',
			'order' => 'asc',
			'orderby' => 'title'
		);

		$sa = get_posts($school_args);

		global $post;

		if(!empty($sa)) {
			foreach( $sa as $post ) {

				setup_postdata( $post );
	
				$key = strtolower(get_field('school_code'));
				$school_link = get_field('school_link');

				$a = array();
	
				foreach($processed_courses as $c) {

					if($c['abbrv'] == $key) {

						$a['school'] = $post->post_title;
						$a['school_link'] = $school_link['url'];
						$a['courses'][] = $c;
					}
	
				}
	
				if(!empty($a)) {
					usort($a['courses'], function($x, $y){ return strcmp($x["name"], $y["name"]); });
					$data[] = $a;
				}
			}
		}

		return $data;
	}
}