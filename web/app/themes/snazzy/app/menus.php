<?php

namespace App\menus;
use snazzycp\frontend;

add_filter( 'wp_nav_menu_items', __NAMESPACE__.'\\footer', 10, 2);
function footer( $items, $args ){

    if( $args->theme_location == 'footer_navigation' ):
        $items .= \Roots\view('partials/footer-contact', ['contact' => get_page_by_path('contact')]);
    endif;

    return $items;
}
