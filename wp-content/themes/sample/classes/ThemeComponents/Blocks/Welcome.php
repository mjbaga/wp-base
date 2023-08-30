<?php

namespace ThemeComponents\Blocks;

class Welcome
{
    public $settings;

    protected static $instance;

    /**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Welcome    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Welcome();
		}

		return self::$instance;
    }
    
    function __construct() 
	{
        $this->register_block();
        $this->register_fields();
	}
	
	function register_block()
	{
		
		if( function_exists('acf_register_block') ) {
			acf_register_block(array(
				'name'				=> 'welcome_block',
				'title'				=> __('Welcome'),
				'description'		=> __('A custom home page welcome block.'),
				'render_callback'	=> array( $this, 'block_render_callback'),
				'category'			=> 'sample-blocks',
				'icon'				=> 'welcome-widgets-menus',
				'keywords'			=> array( 'welcome', 'Home Section' ),
			));
		}
    }
    
    function block_render_callback($block)
	{		
        $data = array();
        $data['section_title'] = get_field('section_title');
		$data['title'] = get_field('title');
        $data['bg_image'] = get_field('background_image');
        $data['bg_image_mobile'] = get_field('background_image_mobile');
		$data['txt_image'] = get_field('text_image');		
		$data = (object) $data;

		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "templates/blocks" folder
		if( file_exists( get_theme_file_path("/templates/blocks/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/templates/blocks/content-{$slug}.php") );
		}
    }
    
    public static function register_fields()
    {
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_5f9a8c441a530',
				'title' => 'Block: Welcome',
				'fields' => array(
                    array(
                        'key' => 'field_5faa83e0d271c',
                        'label' => 'Section Title',
                        'name' => 'section_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),                    
                    array(
                        'key' => 'field_5f9a8c4d927fc',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => 250
                    ),
                    array(
                        'key' => 'field_5f9a8c58927fd',
                        'label' => 'Background Image',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => ''
                    ),
                    array(
                        'key' => 'field_5faa49b87e4f5',
                        'label' => 'Background Image Mobile',
                        'name' => 'background_image_mobile',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => ''
                    ),                    
                    array(
                        'key' => 'field_5f9a8c6e927fe',
                        'label' => 'Text Image',
                        'name' => 'text_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => ''
                    ),          
                ),
				'location' => array(
					array(
						array(
							'param' => 'block',
							'operator' => '==',
							'value' => 'acf/welcome-block',
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