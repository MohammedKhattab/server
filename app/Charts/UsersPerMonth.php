<?php

declare(strict_types = 1);

namespace App\Charts;

use App\User;
use Carbon\CarbonPeriod;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class UsersPerMonth extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $count = [];
        $period = CarbonPeriod::create(now()->startOfYear(), '1 month', now()->endOfMonth());
        foreach ($period as $dt) {
            $labels[] = $dt->translatedFormat('M/Y');
            $count[] = User::whereMonth('created_at', $dt)->where('role_id', 2)->count();
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('المستخدمين الجدد', $count);
    }
}
