<?php

namespace ThemeComponents\Blocks;

class Accordion
{
    public $settings;

    protected static $instance;

    /**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Accordion    A reference to an instance of this class.
	 * @since    0.1.0
	 */
	public static function get_instance() 
	{
		if( null == self::$instance ) {
			self::$instance = new Accordion();
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
				'name'				=> 'accordion_block',
				'title'				=> __('Accordion'),
				'description'		=> __('A custom accodrion block.'),
				'render_callback'	=> array( $this, 'block_render_callback'),
				'category'			=> 'sample-blocks',
				'icon'				=> 'welcome-widgets-menus',
				'keywords'			=> array( 'accordion' ),
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
				'key' => 'group_63d230dc84dbc',
				'title' => 'Block: Accordion',
				'fields' => array(
					array(
						'key' => 'field_63d230ef26d7e',
						'label' => 'Accordion',
						'name' => 'accordion',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_63d2312e26d80',
								'label' => 'Heading',
								'name' => 'heading',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 1,
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
								'parent_repeater' => 'field_63d230ef26d7e',
							),
							array(
								'key' => 'field_63d2314026d81',
								'label' => 'Body',
								'name' => 'body',
								'aria-label' => '',
								'type' => 'textarea',
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
								'rows' => '',
								'placeholder' => '',
								'new_lines' => '',
								'parent_repeater' => 'field_63d230ef26d7e',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'block',
							'operator' => '==',
							'value' => 'acf/accordion-block',
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