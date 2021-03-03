<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PiattoFormRequest;
use Storage;
use App\Piatto;
use App\Tipologia;
use App\User;
use App\TipologiaRistorante;

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
        $tipologie = Tipologia::all();

        return view('piatti.create', compact('tipologie'));
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
            "piatto_img" => $data['piatto_img']->storePublicly('storage'),
            "piatto_descrizione" => $data['piatto_descrizione'],
            "piatto_prezzo" => $data['piatto_prezzo'],
            "piatto_visibile" => $data['piatto_visibile']
        ]);
        $nuovoPiatto->save();

        $tipologia = TipologiaRistorante::firstorNew([
            "tipologia_id" => $data['tipologia'],
            "rist_id" => $userId,
        ]);

        $tipologia->save();

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
            $piatto = Piatto::find($id);
            $tipologie = Tipologia::all();

        return view('piatti.edit', compact('piatto', 'tipologie'));
        // return dd($piatto['piatto_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PiattoFormRequest $request, $id)
    {
        $data = $request->validated();
        $piatto = Piatto::find($id);
        $piatto->piatto_nome = $data['piatto_nome'];
        $piatto->piatto_img = $data['piatto_img']->storePublicly('storage');
        $piatto->piatto_descrizione = $data['piatto_descrizione'];
        $piatto->piatto_prezzo = $data['piatto_prezzo'];
        $piatto->piatto_visibile = $data['piatto_visibile'];
        $piatto->save();

        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piatto = Piatto::find($id);
        $piatto->delete();
        if(Storage::exists($piatto->piatto_img)){
            Storage::delete($piatto->piatto_img);
        }else{
            dd('File does not exists.');
        }
        return redirect()->route('piatti.index');
    }
}
