<?php

namespace App\Providers;

use App\Charts\OrderPerMonth;
use App\Charts\UsersPerMonth;
use App\View\SettingsCollection;
use Carbon\Carbon;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Microboard\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Carbon::setLocale('ar_SA');

        View::composer('*', function ($view) {
            $view->with('settings', SettingsCollection::make(Setting::all()));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @param Charts $charts
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            OrderPerMonth::class,
            UsersPerMonth::class,
        ]);
    }
}
