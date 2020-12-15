<?php

namespace App\Http\Controllers\API;

use App\Events\NewOrder;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

abstract class RegisterNewRequest extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validator($request)->validate();

        if ($request->input('product_type') === 'other') {
            $request->merge([
                'product_type' => $request->input('other')
            ]);
        }

        $user = User::firstOrCreate([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ], [
            'role_id' => 2,
            'email' => uniqid() . '@system.app',
            'password' => bcrypt('password')
        ]);

        $order = $user->orders()->create(
            $request->only([
                'is_for_client',
                'city', 'target_name', 'target_phone', 'target_city',
                'target_references', 'product_type', 'product_price'
            ])
        );

        event(new NewOrder($order));

        return response()->json([
            'message' => 'done',
            'order' => $order->id,
            'redirect_url' => url("orders/{$order->id}/checkout")
        ]);
    }

    /**
     * Validate the request fields.
     *
     * @param Request $request
     * @return Validator
     */
    abstract protected function validator(Request $request): Validator;
}
