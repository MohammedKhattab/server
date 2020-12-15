<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends RegisterNewRequest
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
            'city' => ['required', 'string'],
            'target_city' => ['required', 'string'],
            'target_phone' => ['required', 'numeric', 'min:10'],
            'product_type' => ['required', 'string'],
            'other' => ['required_if:product_type,other', 'nullable', 'string'],
            'product_price' => ['required', 'numeric', 'min:0'],
            'target_references' => ['required', 'string'],
            'why_you_send' => ['required']
        ], [
            'other.required_if' => 'اكتب نوع المنتج أو اختر نوع من القائمة'
        ], [
            'target_phone' => 'رقم العميل',
            'product_type' => 'نوع المنتج',
            'product_price' => 'السعر',
            'target_city' => 'مدينة المنتج',
            'target_references' => 'الحقل',
            'why_you_send' => 'الغرض من الطلب'
        ]);
    }
}
