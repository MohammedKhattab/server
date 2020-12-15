<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends RegisterNewRequest
{
    /**
     * Validate the request fields.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'product_type' => ['required', 'string'],
            'other' => ['required_if:product_type,other', 'nullable', 'string'],
            'city' => ['required', 'string'],
            'target_name' => ['required', 'string', 'min:3', 'max:255'],
            'target_city' => ['required', 'string'],
            'target_phone' => ['required', 'numeric', 'min:10'],
            'why_you_send' => ['required'],
            'product_price' => ['required', 'numeric', 'min:0'],
        ], [
            'required_if' => 'اكتب نوع المنتج أو اختر نوع من القائمة'
        ], [
            'target_name' => 'اسم العميل',
            'target_city' => 'مدينة العميل',
            'product_price' => 'السعر',
            'target_phone' => 'رقم العميل',
            'product_type' => 'نوع المنتج',
            'why_you_send' => 'الغرض من الطلب'
        ]);
    }
}
