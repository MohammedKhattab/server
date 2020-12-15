<?php

namespace App\View\Components;

use App\Page;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;
use Illuminate\View\View;

class NavLinks extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.nav-links', [
            'links' => array_merge([[
                'url' => $link = url('/'),
                'text' => 'الرئيسية',
                'active' => $this->is($link)
            ]],
                $this->getPages()
            )
        ]);
    }

    /**
     * determine if this page is active.
     *
     * @param $url
     * @return bool
     */
    protected function is($url)
    {
        return URL::full() === $url;
    }

    /**
     * Get application pages.
     *
     * @return array
     */
    protected function getPages()
    {
        return Page::all()->map(function (Page $page) {
            return [
                'url' => $link = url('pages', $page->slug),
                'text' => $page->title,
                'active' => $this->is($link)
            ];
        })->all();
    }
}
