<?php
namespace App\View\Composers;
use Roots\Acorn\View\Composer;

class FooterContact extends Composer
{
    protected static $views = [
        'partials.footer-contact',
    ];

    public function with()
    {
        return [
            'contact' => get_page_by_path('contact'),
        ];
    }
}
