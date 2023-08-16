<?php

namespace App;
use snazzycp\utilities;

function background_settings($prefix = null, $id = null)
{
    if(is_null($id)) $id = get_the_ID();
    if($prefix) $prefix .= '_';

    $props = get_field($prefix . 'background', $id);

    return $props;
}
