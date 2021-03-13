<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Ordine;
use App\PiattoOrdine;

class OrdiniController extends Controller
{
    // Mostra la lista degli ordini evasi dal singolo ristorante
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->search;
        
        // Cerca ordine per id, nome acquirente o nome piatto.
        if($search) {
            $ordini = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))
            ->where('ordini.ord_nome', 'LIKE', "%$search%")
            ->orWhere('ordini.ord_cognome', 'LIKE', "%$search%")
            ->orWhere('ordini.ord_id', $search)
            ->orWhere('piatti.piatto_nome', 'LIKE', "%$search%")
            ->orderBy('ordini.created_at', 'DESC')
            ->paginate(4);
        }else{
            $ordini = DB::table('ordini')
            ->join('piatti_ordini', 'ordini.ord_id', '=', 'piatti_ordini.ord_id')
            ->join('piatti', 'piatti_ordini.piatto_id', '=', 'piatti.piatto_id')
            ->join('users', 'piatti.rist_id', '=', 'users.rist_id')
            ->where(fn($query) => $query->where('users.rist_id', '=', $userId))->orderBy('ordini.created_at', 'DESC')
            ->paginate(4);
        }

        return view('ordini.index', compact('ordini', 'search'));
    }
}
