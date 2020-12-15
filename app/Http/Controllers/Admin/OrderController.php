<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderStatusChanged;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Microboard\Traits\Controller as MicroboardController;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | OrderController
    |--------------------------------------------------------------------------
    |
    | This controller handles admin resources methods, such as creating, view
    | updating or deleting. The controller uses a trait to conveniently provide
    | its functionality to your applications.
    |
    */
    use MicroboardController;

    protected $indexWidgets = [
        '\App\Widgets\TotalAmount',
        '\App\Widgets\TotalOrders',
        '\App\Widgets\PendingOrders',
        '\App\Widgets\RejectedOrders',
    ];

    /**
     * @param Request $request
     * @param Order $order
     * @return Response
     * @throws ValidationException
     */
    public function changeStatus(Request $request, Order $order)
    {
        $this->validate($request, [
            'status' => ['required', 'between:0,5']
        ]);

        $order->updateStatusTo($request->input('status'));
        return response('OK');
    }
}
