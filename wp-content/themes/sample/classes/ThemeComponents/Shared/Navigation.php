<?php

namespace ThemeComponents\Shared;

class Navigation
{
	public static function get_primary_navigation() 
	{
		$args = array(
		    'theme_location' => 'primary',
		    'menu' => 'Primary',
		    'container' => '',
		    'items_wrap' => '<ul id="%1$s" class="%2$s megamenu">%3$s</ul>',
		    'depth' => 3,
		    'echo' => false
		);
		return wp_nav_menu( $args );
	}

	public static function get_footer_navigation() {
	    $args = array(
	        'theme_location' => 'footer',
	        'menu' => 'Footer',
	        'container' => 'div',
	        'container_class' => '',
	        'menu_class' => 'footer-links',
	        'echo' => false
	    );
	    return wp_nav_menu( $args );
	}

	public static function get_social_navigation() {
	    $args = array(
	        'theme_location' => 'social',
	        'menu' => 'Social Links',
	        'container' => false,
	        'add_social_item_class' => true,
	        'menu_class' => 'social-icons',
	        'show_icons_after_title' => true,
	        'hide_item_title' => true,
	        'echo' => false
	    );
	    return wp_nav_menu( $args );
	}
}