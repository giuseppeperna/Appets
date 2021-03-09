<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piatto;
use App\Tipologia;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ristoranti = User::all();

        return view('index', compact('ristoranti'));
        // return dd($ristoranti->rist_id);
    }

    public function show($id) {
       
        $ristorante = User::find($id);
        $piatti = Piatto::where(fn($query) => $query->where('rist_id', '=', $id))->get();

        return view('ristorante.show', compact('ristorante', 'piatti'));
        // return dd($piatti);
    }
}
