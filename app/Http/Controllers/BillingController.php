<?php

namespace App\Http\Controllers;

use App\Billing\Checkout;
use App\Events\OrderStatusChanged;
use App\Order;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class BillingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @param string $method
     * @return JsonResponse
     */
    public function show(Order $order, string $method)
    {
        try {
            return response()->json([
                'redirect_to' => (new Checkout($method, $order))->pay(),
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => 'ERROR', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Order $order
     * @param string $method
     * @return RedirectResponse
     */
    public function store(Order $order, string $method)
    {
        if ((new Checkout($method, $order))->validate()) {
            $order->update([
                'payment_method' => $method,
                'status' => 3,
                'paid_at' => now()
            ]);

            event(new OrderStatusChanged($order));
            return redirect('/')->with('message', [
                'title' => 'شكراً لك',
                'text' => 'طلبك الآن قيد التنفيذ، سنقوم بمراجعتك قريباً'
            ]);
        }

        return redirect("orders/{$order->id}/checkout");
    }
}
