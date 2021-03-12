<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordine;
// use App\Chart;
use DB;
// use Carbon\Carbon;

class ChartjsController extends Controller
{
    public function index()
    {
        $month = ["January", "Febbraio", "march", "April", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
        $year = [2020, 2021];

        $prev_year = [];
        foreach ($month as $key => $value) {
            $prev_year[] = Ordine::whereYear('created_at', $year[0])->where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }

        $current_year = [];
        foreach ($month as $key => $value) {
            $current_year[] = Ordine::whereYear('created_at', $year[1])->where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
        }

        return view('chartjs.index')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('month',json_encode($month,JSON_NUMERIC_CHECK))
        ->with('prev_year',json_encode($prev_year,JSON_NUMERIC_CHECK))->with('current_year',json_encode($current_year,JSON_NUMERIC_CHECK));
    }
}
