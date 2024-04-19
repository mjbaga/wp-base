<?php

require_once dirname( __FILE__ ) . '/includes/theme-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

/** Returns Theme Directory Path */
function sample_theme_path () {
    return get_template_directory(__FILE__);
}

/**
 * Autoloader for classes
 *
 * @param string $className Name of the class that shall be loaded
 */
function sample_theme_autoload ($className) {

    $filepath = sample_theme_path() . '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($filepath))
        require_once($filepath);
}

spl_autoload_register('sample_theme_autoload');

/**
 *
 * @param String $path Path to template
 * @param Array $data Array containing all the data to be rendered. Should not have numeric keys.
 * @param type $echo  To echo the html or to return it as a string
 * @return mixed string containing html if echo is false and will print the content if echo is true.
 * @since 0.1.0
 */
function sample_theme_render( $slug, $name = null, $data = array(), $var_name = 'data', $echo = true ) {
    global $wp_query;

    $wp_query->query_vars[ $var_name ] = (object) $data;
    ob_start();
    get_template_part( $slug, $name );

    $out = ob_get_clean();
    if( $echo === true ) {
        echo $out;
    } else {
        return $out;
    }
}

function sample_get_assets_url() {
    return THEME_URL . '/assets';
}

/**
 * Enqueue styles and scripts conditionally.
 * @since 0.1.0
 */
if( !function_exists( 'enqueue_sample_styles_and_scripts' ) ):

    function enqueue_sample_styles_and_scripts() {
        
        // header styles and scripts scripts
        wp_enqueue_style( 'sample_main', ASSETS_URL . '/app.css' );
        
        // footer scripts
        wp_enqueue_script( 'sample_main', ASSETS_URL . '/app.js', array(), false, false );
    }

endif;

add_action( 'wp_enqueue_scripts', 'enqueue_sample_styles_and_scripts' );

/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

    // Check if uploaded file is an image, else do nothing

    if ( wp_attachment_is_image( $post_ID ) ) {

        $my_image_title = get_post( $post_ID )->post_title;

        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $my_image_title = ucwords( strtolower( $my_image_title ) );

        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        $my_image_meta = array(
            'ID'        => $post_ID,            // Specify the image (ID) to be updated
            'post_title'    => $my_image_title,     // Set image Title to sanitized title
            'post_excerpt'  => $my_image_title,     // Set image Caption (Excerpt) to sanitized title
            'post_content'  => $my_image_title,     // Set image Description (Content) to sanitized title
        );

        // Set the image Alt-Text
        update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post( $my_image_meta );

    } 
}

function is_freeform_block( $block ) {
	return ( $block['blockName'] === null && !empty( trim( $block['innerHTML'] ) ) );
}

function parse_blocks_ignore_empty_blocks( $input ) {
	return array_filter( parse_blocks( $input ), 'is_non_empty_block' );
}

/**
 * Parses the html of given sidebar
 * 
 * @param string $sidebar
 * @return string
 * @since 0.1.0
 */
function sample_parse_sidebar( $sidebar ) {
    $html = '';
    if( is_active_sidebar( $sidebar ) ) {
        ob_start();
		dynamic_sidebar( $sidebar );
		$html = ob_get_clean();
    }
    return $html;
}

if( !function_exists( 'sample_widgets_init' ) ):

    function sample_widgets_init() {
    
        register_sidebar( array(
            'name' => 'Footer Widget',
            'description' => __( 'Appears in all templates, used for copyright branding' ),
            'id' => 'footer_widget',
            'before_widget' => '',
            'after_widget' => '',
        ) );
    }
    
endif;

add_action( 'widgets_init', 'sample_widgets_init' );

/**
 * Add custom block category to group custom built categories
 */
function sample_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'sample-blocks',
				'title' => __( 'Sample Theme Blocks', 'sample-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'sample_block_category', 10, 2);

add_action( 'init', array( '\\ThemeComponents\\Pages\\Homepage', 'register_fields' ) );
add_action( 'init', 'register_custom_blocks');

// All custom blocks here
function register_custom_blocks() {
    if (class_exists('\\ThemeComponents\\Blocks\\Welcome')) {
        new \ThemeComponents\Blocks\Welcome();
    }

    if (class_exists('\\ThemeComponents\\Blocks\\Accordion')) {
        new \ThemeComponents\Blocks\Accordion();
    }

    if (class_exists('\\ThemeComponents\\Blocks\\Sample')) {
        new \ThemeComponents\Blocks\Sample();
    }

    if (class_exists('\\ThemeComponents\\Blocks\\Tabs')) {
        new \ThemeComponents\Blocks\Tabs();
    }
    
    if (class_exists('\\ThemeComponents\\Blocks\\HeroBanner')) {
        new \ThemeComponents\Blocks\HeroBanner();
    }
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
