<?php

namespace App\View\Components;

use App\Order;
use Illuminate\View\Component;
use Illuminate\View\View;

class Summary extends Component
{
    /**
     * @var Order
     */
    public Order $order;

    /**
     * Hide total and amount rows.
     *
     * @var bool
     */
    public bool $withoutSensitiveDetails;

    /**
     * Create a new component instance.
     *
     * @param Order $order
     * @param bool $withoutSensitiveDetails
     */
    public function __construct(Order $order, $withoutSensitiveDetails = false)
    {
        $this->order = $order;
        $this->withoutSensitiveDetails = $withoutSensitiveDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.summary');
    }
}
