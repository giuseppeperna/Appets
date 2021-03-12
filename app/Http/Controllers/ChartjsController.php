<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ordine;
use App\User;
use DB;
use Carbon\Carbon;

class ChartjsController extends Controller
{
    public function index()
    {
        $this_year = Carbon::now()->format('Y');
        $userId = Auth::id();
        $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $year = [($this_year-1), $this_year];

        $prev_year = [];
        foreach ($month as $key => $value) {
            $prev_year[] = Ordine::whereYear('created_at', $year[0])->where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)
            ->count();
        }

        $current_year = [];
        foreach ($month as $key => $value) {
            $current_year[] = Ordine::whereYear('created_at', $year[1])->where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }

        $prevYearSum = array_sum($prev_year);
        $currentYearSum = array_sum($current_year);

        $prevYearTotalOrder = Ordine::whereYear('created_at', $year[0])->sum('ord_totale');
        $currentYearTotalOrder = Ordine::whereYear('created_at', $year[1])->sum('ord_totale');

        return view('chartjs.index', compact('prevYearTotalOrder','currentYearTotalOrder', 'prevYearSum', 'currentYearSum', 'this_year'))
        ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
        ->with('month',json_encode($month,JSON_NUMERIC_CHECK))
        ->with('prev_year',json_encode($prev_year,JSON_NUMERIC_CHECK))
        ->with('current_year',json_encode($current_year,JSON_NUMERIC_CHECK));
    }
}
