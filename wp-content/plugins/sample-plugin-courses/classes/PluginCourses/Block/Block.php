<?php

namespace PluginCourses\Block;

use PluginCourses\Api\Api;
//use PluginCourses\Post\Query;

class Block
{
    public $settings;

	protected static $instance;

	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Block    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Block();
		}

		return self::$instance;
	}

	function __construct() 
	{
		$this->block_template = 'content-courses-block.php';
		$this->register_block();
		$this->register_fields();
	}
	
	function register_block()
	{
		if( function_exists('acf_register_block') ) {
			acf_register_block(array(
				'name'				=> 'courses_block',
				'title'				=> __('Course Block'),
				'description'		=> __('A custom block for a Course block.'),
				'render_callback'	=> array( $this, 'block_render_callback'),
				'category'			=> 'np-blocks',
				'icon'				=> 'book',
				'keywords'			=> array( 'course', 'courses' ),
			));
		}
	}

	function block_render_callback($block)
	{
		$data = array();
		$course_post = get_field('course_selector');

		if(!empty($course_post)) {
			$data = Api::get_course_data($course_post->ID);
			$data['title'] = $course_post->post_title;
			$data['content'] = $course_post->post_content;

			if (has_post_thumbnail( $course_post->ID ) ) {
				$image =  wp_get_attachment_image_src( get_post_thumbnail_id( $course_post->ID ), 'large' );
				$data['featured_image'] = $image[0];
			}

		}

		$html = Api::render( $this->block_template, $data );

		return $html;
	}

	public static function register_fields()
	{
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5fa4b5637b725',
				'title' => 'Block: Courses',
				'fields' => array(
					array(
						'key' => 'field_5fa4b56a417b7',
						'label' => 'Course Selector',
						'name' => 'course_selector',
						'type' => 'post_object',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'plugin-courses',
						),
						'taxonomy' => '',
						'allow_null' => 0,
						'multiple' => 0,
						'return_format' => 'object',
						'ui' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'block',
							'operator' => '==',
							'value' => 'acf/courses-block',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
			
		endif;
	}
}