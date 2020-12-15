<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
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
            'phone' => ['required', 'unique:jobs'],
            'city' => ['required'],
            'has_a_car' => ['required'],
        ], [
            'phone.unique' => 'أنت مسجل من قبل، سنقوم بالاتصال بك في أقرب وقت ممكن'
        ]);

        Job::create($request->all());

        return response()->json([
            'message' => 'done'
        ]);
    }
}
