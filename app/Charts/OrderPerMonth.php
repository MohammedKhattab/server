<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Order;
use Carbon\CarbonPeriod;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class OrderPerMonth extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     *
     * @param Request $request
     * @return Chartisan
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $shipped = [];
        $rejected = [];
        $period = CarbonPeriod::create(now()->startOfYear(), '1 month', now()->endOfMonth());
        foreach ($period as $dt) {
            $labels[] = $dt->translatedFormat('M/Y');
            $shipped[] = Order::whereMonth('created_at', $dt)->where('status', 5)->count();
            $rejected[] = Order::whereMonth('created_at', $dt)->whereIn('status', [1, 4])->count();
        }

        return Chartisan::build()
            ->labels($labels)
            ->dataset('طلبات منتيه', $shipped)
            ->dataset('طلبات ملغية', $rejected);
    }
}
