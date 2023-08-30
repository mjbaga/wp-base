<?php

namespace ThemeComponents\Pages;

use Carbon\Carbon;

class Homepage
{
    public static function get_data()
    {
        $data = array();
        ob_start();
        the_content();
        $data['content'] = ob_get_contents();
        ob_end_clean();

        $start_date = get_field('date_start');
        $end_date = get_field('date_end');

        date_default_timezone_set('Asia/Singapore');

        if($start_date != '') {
            $data['start_date'] = Carbon::parse($start_date);
        }

        if($end_date != '') {
            $data['end_date'] = Carbon::parse($end_date);
        }

        $data['telegram_link'] = get_field('telegram_link');
        
        return $data;
    }

    public static function register_fields()
    {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_5faba51771684',
                'title' => 'Telegram Availability',
                'fields' => array(
                    array(
                        'key' => 'field_5faba52eadb0c',
                        'label' => 'Telegram Availability Start',
                        'name' => 'date_start',
                        'type' => 'date_time_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'Y-m-d H:i',
                        'return_format' => 'Y-m-d H:i',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5faba588adb0d',
                        'label' => 'Telegram Availability End',
                        'name' => 'date_end',
                        'type' => 'date_time_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'Y-m-d H:i',
                        'return_format' => 'Y-m-d H:i',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5fad0fd76d5c6',
                        'label' => 'Telegram Link',
                        'name' => 'telegram_link',
                        'type' => 'url',
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
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/template-homepage.php',
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