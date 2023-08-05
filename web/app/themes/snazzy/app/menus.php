<?php

namespace App\menus;
use snazzycp\frontend;

add_filter( 'wp_nav_menu_items', __NAMESPACE__.'\\footer', 10, 2);
function footer( $items, $args ){

    if( $args->theme_location == 'footer_navigation' ):
        $contact = get_page_by_path('contact');
        ob_start(); ?>

        <li class="menu-item menu-divider divider-contact">
            <a href="#">divider</a>
        </li>
        <li class="menu-item menu-contact-details">
            <?php if($contact): ?>
                <a href="<?= get_the_permalink($contact) ?>"><?= $contact->post_title ?></a>
            <?php endif; ?>
            <?php frontend\contact_info(['hide-labels' => true]); ?>
            <h4><?php _e('Connect with us:', 'sage') ?></h4>
            <?php frontend\social(); ?>
        </li>

        <?php $contact = ob_get_clean();

        $items .= $contact;

    endif;

    return $items;
}
