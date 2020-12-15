<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display checkout page.
     *
     * @param Order $order
     * @return View|void
     */
    public function index(Order $order)
    {
        if (!in_array($order->status, [0, 2, 3])) {
            return abort(404);
        }

        return view('checkout', compact('order'));
    }

    /**
     * Display confirm page.
     *
     * @param Order $order
     * @return View|void
     */
    public function show(Order $order)
    {
        if ($order->status !== 0) {
            return abort(404);
        }

        return view('confirm', compact('order'));
    }

    /**
     * Confirm the order.
     *
     * @param Request $request
     * @param Order $order
     * @return RedirectResponse|void
     * @throws ValidationException
     */
    public function update(Request $request, Order $order)
    {
        if ($order->status !== 0) {
            return abort(404);
        }

        $this->validate($request, [
            'confirm' => ['required', 'boolean']
        ], [
            'confirm.*' => 'يجب تحديد خيار لإتخاذ الإجراءات اللازمة'
        ]);

        $order->updateStatusTo(
            $request->input('confirm') ? 2 : 1
        );

        return redirect('/')
            ->with('message', [
                'title' => 'شكراً لك',
                'text' => 'لقد تم حفظ ردك وسنعمل على استجابته والرد عليكم إن لزم الأمر.'
            ]);
    }
}
