<?php
namespace App\View\Composers;
use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = [
        'sections.header.header',
    ];

    public function with()
    {
        return [
            'logo' => @file_get_contents(get_template_directory() . '/resources/images/logo-my-academic-family.svg'),
        ];
    }
}
