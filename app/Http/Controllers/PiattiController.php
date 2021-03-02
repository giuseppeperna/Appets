<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PiattoFormRequest;
use App\Piatto;
use App\Tipologia;
use App\User;

class PiattiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $piatti = Piatto::Where(fn($query) => $query->where('rist_id', '=', $userId))->get();
        return view('piatti.index', compact('piatti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piatti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PiattoFormRequest $request)
    {
        $userId = Auth::id();
        $data = $request->validated();

        $nuovoPiatto = Piatto::create([
            "rist_id" => $userId,
            "piatto_nome" => $data['piatto_nome'],
            "piatto_img" => $data['piatto_img']->storePublicly('img'),
            "piatto_descrizione" => $data['piatto_descrizione'],
            "piatto_prezzo" => $data['piatto_prezzo'],
            "piatto_visibile" => $data['piatto_visibile']
        ]);
        $nuovoPiatto->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piatto = Piatto::find($id);

        return view('piatti.show', compact('piatto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
