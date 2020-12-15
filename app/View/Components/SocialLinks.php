<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SocialLinks extends Component
{
    public array $links;

    /**
     * SocialLinks constructor.
     *
     * @param array $links
     */
    public function __construct($links)
    {
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.social-links');
    }
}
