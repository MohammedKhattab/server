<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Microboard\Traits\Controller as MicroboardController;

class NewsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | NewsController
    |--------------------------------------------------------------------------
    |
    | This controller handles admin resources methods, such as creating, view
    | updating or deleting. The controller uses a trait to conveniently provide
    | its functionality to your applications.
    |
    */
    use MicroboardController;

    /**
     * The model has been created.
     *
     * @param Request $request
     * @param News $news
     * @return mixed
     */
    protected function created($request, $news)
    {
        addMediaTo($news, 'image');
    }

    /**
     * The model has been updated.
     *
     * @param Request $request
     * @param News $news
     * @return mixed
     */
    protected function updated($request, $news)
    {
        addMediaTo($news, 'image');
    }
}
