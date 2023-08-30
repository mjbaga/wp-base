<?php

namespace PluginCourses\Post;

class Post {

    private static $instance;
    private $slug;
    private $label;

    /**
    * Returns an instance of this class. An implementation of the singleton design pattern.
    *
    * @return   Post    A reference to an instance of this class.
    * @since    1.0.0
    */
    public static function get_instance() {

        if( null == self::$instance ) {
            self::$instance = new Post();
        } // end if

        return self::$instance;
    }

    function __construct() {
        $this->slug = 'plugin-courses';
        $this->label = __( 'Courses' );

        add_action( 'init', array( $this, 'init_post' ) );
        add_action( 'init', array( $this, 'register_fields' ) );
        add_action( 'init', array( $this, 'init_taxonomy' ) );
        add_action( 'init', array( $this, 'init_courses_template' ) );
    }

    /**
    * Initiate the single template for courses post
    */
    function init_courses_template() {
        //add template
        add_filter( 'single_template', array( $this, '_courses_single_template' ), 10, 1 );
    }


    /**
    * Callback for single template filter for courses post type
    * 
    * @param string $single_template
    * @return string
    */
    function _courses_single_template( $single_template ) {
        $object = get_queried_object();

        if( $object->post_type != $this->slug ) {
            return $single_template;
        }

        $single_template = COURSES_PLUGIN_DIR . '/templates/Post/single-' . $this->slug . '.php';
        return $single_template;
    }

    function init_post()
    {
        $args = array(
            'label' => $this->label,
            'public' => TRUE,
            'rewrite' => array( 'slug' => 'courses' ),
            'menu_icon' => 'dashicons-book',
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'excerpt'
            )
        );
        register_post_type( $this->slug, $args );

        $args2 = array(
            'label' => 'Academic School',
            'public' => TRUE,
            'rewrite' => array( 'slug' => 'academic-school' ),
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array(
                'title'
            )
        );
        register_post_type( 'academic-school', $args2 );
    }

    function init_taxonomy()
    {
        $labels = array(
            'name'              => _x( 'Interests', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Interest', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Interests', 'textdomain' ),
            'all_items'         => __( 'All Interests', 'textdomain' ),
            'parent_item'       => __( 'Parent Interest', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Interest:', 'textdomain' ),
            'edit_item'         => __( 'Edit Interest', 'textdomain' ),
            'update_item'       => __( 'Update Interest', 'textdomain' ),
            'add_new_item'      => __( 'Add New Interest', 'textdomain' ),
            'new_item_name'     => __( 'New Interest Name', 'textdomain' ),
            'menu_name'         => __( 'Interest', 'textdomain' ),
        );

        $args = array(  
            'hierarchical' => true,  
            'labels' => $labels,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array(
                'slug' => 'course-interests'
            )
        );

        register_taxonomy('course_interests', 'plugin-courses', $args); 
    }

    function register_fields()
    {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_5fa39b1e57345',
                'title' => 'Post: Courses',
                'fields' => array(
                    array(
                        'key' => 'field_5faa58c033dd6',
                        'label' => 'Course Code',
                        'name' => 'course_code',
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
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5fa3b3ebcd5fd',
                        'label' => 'Tagline',
                        'name' => 'tagline',
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
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => 250,
                    ),
                    array(
                        'key' => 'field_5fa3b3fccd5fe',
                        'label' => 'CTA',
                        'name' => 'cta',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_5fa3b407cd5ff',
                        'label' => 'Image Placement',
                        'name' => 'image_placement',
                        'type' => 'radio',
                        'instructions' => 'Placement of Featured Image Left/Right',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'right' => 'Right',
                            'left' => 'Left',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => 'right',
                        'layout' => 'horizontal',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                    array(
                        'key' => 'field_5fa39b239db17',
                        'label' => 'Academic School',
                        'name' => 'academic_school',
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
                            0 => 'academic-school',
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
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'plugin-courses',
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

            acf_add_local_field_group(array(
                'key' => 'group_5fb4bdbe0d36b',
                'title' => 'Post: Academic School',
                'fields' => array(
                    array(
                        'key' => 'field_5fb4bfc7972b7',
                        'label' => 'School Code',
                        'name' => 'school_code',
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
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5fb4bfe4972b8',
                        'label' => 'School Link',
                        'name' => 'school_link',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'academic-school',
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