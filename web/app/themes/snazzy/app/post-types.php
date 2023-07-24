<?php

/**
 * Custom Post Types.
 */

namespace App;

$themedir = get_template_directory();

foreach([
    'slide',
    'resource',
    'event',
    'service',
    'faq',
    'team',
    'mentor',
    'term',
] as $postType):
    require_once($themedir . '/app/post-types/' . $postType . '.php');
endforeach;
