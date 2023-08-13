<?php

namespace App\acf;
use snazzycp\data;
use ourcodeworld\NameThatColor;

add_filter('acf/load_field/name=colour', __NAMESPACE__ . '\\load_colour_choices');
function load_colour_choices( $field )
{
    $field['choices'] = [];
    $field['choices'] = colour_choices();

    return $field;
}

function colour_choices()
{
    $colour_amount = get_option('snazzycp_color_amount');
    if(!$colour_amount) return false;

    $colorInterpreter = new NameThatColor\ColorInterpreter();
    $colours = [
        '0' => __('Default', 'sage'),
    ];

    if(function_exists('snazzycp\\data\\latinate') && $colour_amount):
        foreach(range(1, $colour_amount) as $x):
            $slug = data\latinate($x);
            $value = get_option('snazzycp_color_' . $slug);

            if(!$value) continue;

            $name = ($value) ? @$colorInterpreter->name($value)['name'] : $slug;
            $colours[$slug] = $name;
        endforeach;
    endif;

    $colours['white'] = __('White', 'sage');
    $colours['black'] = __('Black', 'sage');

    return $colours;
}
