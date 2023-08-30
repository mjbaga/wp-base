<?php

namespace ThemeComponents\Pages;

class Standard
{

    public static function get_data()
    {
        $data = array();
	    $data['title'] = apply_filters( 'the_title', get_the_title());
        ob_start();
        the_content();
        $data['content'] = ob_get_contents();
        ob_end_clean();

        return $data;
    }

}