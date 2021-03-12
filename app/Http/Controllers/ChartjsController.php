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
        // Informazione sull'anno corrente
        $this_year = Carbon::now()->format('Y');
        // Recupero Id dell'utente loggato
        $userId = Auth::id();
        $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $year = [($this_year-1), $this_year];

        // Totale degli ordini dello scorso anno, divisi per mese
        $prev_year = [];
        foreach ($month as $key => $value) {
            $prev_year[] = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
            ->whereYear('ordini.created_at', $year[0])->where(\DB::raw("DATE_FORMAT(ordini.created_at, '%M')"),$value)->count();
        }

        // Totale ordini dell'anno corrente, divisi per mese
        $current_year = [];
        foreach ($month as $key => $value) {
            $current_year[] = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
            ->whereYear('ordini.created_at', $year[1])->where(\DB::raw("DATE_FORMAT(ordini.created_at, '%M')"),$value)->count();
        }

        // Numero degli ordini evasi nello scorso anno e nell'anno corrente
        $prevYearSum = array_sum($prev_year);
        $currentYearSum = array_sum($current_year);

        // Incasso totale per gli ordini dello scorso anno
        $prevYearTotalOrder = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
            ->whereYear('ordini.created_at', $year[0])->sum('ord_totale');

        // Incasso totale per gli ordini dell'anno corrente
        $currentYearTotalOrder = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
            ->whereYear('ordini.created_at', $year[1])->sum('ord_totale');


        return view('chartjs.index', compact('prevYearTotalOrder','currentYearTotalOrder', 'prevYearSum', 'currentYearSum', 'this_year'))
        ->with('year',json_encode($year,JSON_NUMERIC_CHECK))
        ->with('month',json_encode($month,JSON_NUMERIC_CHECK))
        ->with('prev_year',json_encode($prev_year,JSON_NUMERIC_CHECK))
        ->with('current_year',json_encode($current_year,JSON_NUMERIC_CHECK));
    }
}
