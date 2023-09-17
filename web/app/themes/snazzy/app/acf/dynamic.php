<?php

namespace App\acf;
use snazzycp\data;
use snazzycp\utilities;
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
        '0' => '<i class="snazzycp-colour-option fas fa-circle" style="color: #f2f2f2;"></i> <span>' . __('Default', 'sage') . '</span>',
    ];

    if(function_exists('snazzycp\\data\\latinate') && $colour_amount):
        foreach(range(1, $colour_amount) as $x):
            $slug = data\latinate($x);
            $value = get_option('snazzycp_color_' . $slug);

            if(!$value) continue;

            $name = ($value) ? @$colorInterpreter->name($value)['name'] : $slug;
            $colours[$slug] = '<i class="snazzycp-colour-option fas fa-circle" style="color: ' . utilities\colour_name_to_hex($slug) . '"></i> <span>' . $name . '</span>';
        endforeach;
    endif;

    $colours['white'] = '<i class="snazzycp-colour-option fas fa-circle" style="color: #FFF;"></i> <span>' . __('White', 'sage') . '</span>';
    $colours['black'] = '<i class="snazzycp-colour-option fas fa-circle" style="color: #000;"></i> <span>' . __('Black', 'sage') . '</span>';

    return $colours;
}

add_filter('acf/load_field/name=fontawesome_solid', __NAMESPACE__ . '\\load_fontawesome_solid_icons');
function load_fontawesome_solid_icons( $field )
{
    $field['choices'] = [];
    $field['choices'] = fontawesome_choices('solid');

    return $field;
}

function fontawesome_choices($set = 'solid')
{
    $icons = data\fontawesome($set);

    $choices = [
        '0' => '<i class="fa-solid"></i> <span>Please select an icon</span>',
    ];

    foreach($icons as $slug => $props):
        if(in_array($slug, range(0,9))) continue;

        $choices[$slug] = '<i class="fa-'.$set.' fa-'.$slug.'" style="color: #2271b1;"></i> <span>' . (ucwords(str_replace('-', ' ', $slug))) . '</span>';
    endforeach;

    return $choices;
}
