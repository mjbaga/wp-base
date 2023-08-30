<?php

namespace PluginCourses;

use PluginCourses\Post\Post;
use PluginCourses\Page\Listing;
use PluginCourses\Api\Api;
use PluginCourses\Block\Block;

class Courses
{

	public $settings;

	protected static $instance;

	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Courses    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Courses();
		}

		return self::$instance;
  }

  private function __construct()
	{
		$this->init_custom_posts();
		$this->init_page_templates();
		$this->init_custom_block();
		$this->init_courses_api();
  }
    
  function init_custom_posts() 
	{
    $courses = Post::get_instance();
  }

	function init_custom_block()
	{
		$block = Block::get_instance();
	}

	function init_page_templates()
	{
		$listing = Listing::get_instance();
	}

	function init_courses_api()
	{
		add_action( 'rest_api_init', function () {
			register_rest_route( 'courses', 'list',array(
					'methods'  => array('POST', 'GET'),
					'callback' => array('\\PluginCourses\\Api\\Api', 'get_filtered_courses')
			));
		});
	}
}