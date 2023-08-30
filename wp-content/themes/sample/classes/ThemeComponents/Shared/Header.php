<?php

namespace ThemeComponents\Shared;

use ThemeComponents\Shared\Navigation;

class Header
{
	public static function get_data()
	{
		$data = array();
		$data['is_home'] = is_home();
		$data['site_title'] = SITE_NAME;
		$logo_id = get_theme_mod('custom_logo');
		$data['logo'] = wp_get_attachment_image_url($logo_id,'full');
		$data['primary_navigation'] = Navigation::get_primary_navigation();
		$data['home'] = get_home_url();

		return $data;
	}
}