<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ristorante;

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
        return view('index');
    }

    public function show($id) {
        $ristoranti = Ristorante::find($id);

        return dd($ristoranti);
    }
}
