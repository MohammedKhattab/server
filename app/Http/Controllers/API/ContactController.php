<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'subject' => ['required', 'min:4'],
            'message' => ['required', 'min:25', 'max:1000'],
        ]);

        Contact::create($request->all());

        return response()->json([
            'message' => 'done'
        ]);
    }
}
