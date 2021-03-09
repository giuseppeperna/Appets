<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Ordine;
use App\PiattoOrdine;

class OrdiniController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->search;
     
        
        $ordini = DB::table('ordini')
        ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
        ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
        ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
        ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
        ->paginate(4);
        


        return view('ordini.index', compact('ordini', 'search'));
    }
}
