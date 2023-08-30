<?php

namespace ThemeComponents\Blocks;

class Tabs
{
    public $settings;

    protected static $instance;

    /**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Tabs    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Tabs();
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
				'name'				=> 'tabs_block',
				'title'				=> __('Tabs'),
				'description'		=> __('A custom tabs block.'),
				'render_callback'	=> array( $this, 'block_render_callback'),
				'category'			=> 'sample-blocks',
				'icon'				=> 'welcome-widgets-menus',
				'keywords'			=> array( 'tabs' ),
			));
		}
  }

  function block_render_callback($block)
	{		
    $data = array();
    $data['heading'] = get_field('heading');
		$data = (object) $data;

		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "templates/blocks" folder
		if( file_exists( get_theme_file_path("/templates/blocks/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/templates/blocks/content-{$slug}.php") );
		}
  }

  public static function register_fields() {

  }
}