<?php

namespace App\View\Components;

use App\Advertisement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Layout extends Component
{
    /**
     * @var Collection
     */
    public Collection $advertisements;

    /**
     * @var string|null
     */
    public ?string $pageName;

    /**
     * Create a new component instance.
     *
     * @param string|null $pageName
     */
    public function __construct($pageName = null)
    {
        $this->advertisements = Advertisement::available()->take(5)->inRandomOrder()->get();
        $this->pageName = $pageName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.layout');
    }
}
