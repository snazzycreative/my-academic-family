<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    protected static $views = [
        'sections.footer',
    ];


    public function privacy()
    {
        $privacyID = get_option('wp_page_for_privacy_policy');

        if(!$privacyID) return false;

        ob_start(); ?>

        <a href="<?= get_the_permalink($privacyID) ?>"><?= get_the_title($privacyID) ?></a>

        <?php return ob_get_clean();
    }

    public function with()
    {
        return [
            'privacy' => $this->privacy(),
        ];
    }
}