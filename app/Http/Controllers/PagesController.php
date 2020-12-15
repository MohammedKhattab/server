<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Page $page
     * @return View
     */
    public function __invoke(Request $request, Page $page)
    {
        if (view()->exists($view = "pages.{$page->slug}")) {
            return view($view, compact('page'));
        }

        return view('pages.default', compact('page'));
    }
}
