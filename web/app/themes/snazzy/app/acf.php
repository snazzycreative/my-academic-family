<?php

namespace App;

foreach([
    'json',
    'dynamic',
] as $item ):
    $path = get_template_directory() . '/app/acf/' . $item;
    require_once($path . '.php');
endforeach;
