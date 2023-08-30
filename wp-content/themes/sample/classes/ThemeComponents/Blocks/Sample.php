<?php

namespace ThemeComponents\Blocks;

class Sample
{
    public $settings;

    protected static $instance;

    /**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Sample    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Sample();
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
				'name'				=> 'sample_block',
				'title'				=> __('Sample'),
				'description'		=> __('A custom sample block.'),
				'render_callback'	=> array( $this, 'block_render_callback'),
				'category'			=> 'sample-blocks',
				'icon'				=> 'welcome-widgets-menus',
				'keywords'			=> array( 'sample' ),
			));
    }
  }
    
  function block_render_callback($block)
	{		
    $data = array();
    $data['accordion'] = get_field('accordion');	
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
        'key' => 'group_63d240bf1821c',
        'title' => 'Block: Sample',
        'fields' => array(
          array(
            'key' => 'field_63d240c06e8e1',
            'label' => 'Title',
            'name' => 'title',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_63d240d46e8e2',
            'label' => 'Banner',
            'name' => 'banner',
            'aria-label' => '',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'preview_size' => 'medium',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'block',
              'operator' => '==',
              'value' => 'acf/sample-block',
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
        'show_in_rest' => 0,
      ));
      
      endif;		  
  }    

}