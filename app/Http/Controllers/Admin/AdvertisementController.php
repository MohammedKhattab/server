<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Microboard\Traits\Controller as MicroboardController;

class AdvertisementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AdvertisementController
    |--------------------------------------------------------------------------
    |
    | This controller handles admin resources methods, such as creating, view
    | updating or deleting. The controller uses a trait to conveniently provide
    | its functionality to your applications.
    |
    */
    use MicroboardController;

    protected $indexWidgets = [
        '\App\Widgets\ActiveAdvertisements',
        '\App\Widgets\FutureAdvertisements',
        '\App\Widgets\DisabledAdvertisements',
    ];

    /**
     * The model has been created.
     *
     * @param Request $request
     * @param Advertisement $advertisement
     * @return mixed
     */
    protected function created($request, $advertisement)
    {
        addMediaTo($advertisement, 'image');
    }

    /**
     * The model has been updated.
     *
     * @param Request $request
     * @param Advertisement $advertisement
     * @return mixed
     */
    protected function updated($request, $advertisement)
    {
        addMediaTo($advertisement, 'image');
    }
}
