<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PiattoFormRequest;
use App\Http\Requests\PiattoUpdateRequest;
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

    // Mostra la lista dei piatti del ristorante nella sua area privata.
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->search;
        if($search) {
            $piatti = Piatto::Where(fn($query) => $query->where('rist_id', '=', $userId))
            ->where('piatto_nome', 'LIKE', "%$search%")->paginate(4);
        }else{
            $piatti = Piatto::Where(fn($query) => $query->where('rist_id', '=', $userId))->paginate(4);
        }

        return view('piatti.index', compact('piatti', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Form di aggiunta di un nuovo piatto
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

    // Creazione di un nuovo piatto
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

        return redirect()->route('piatti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Mostra il dettaglio del singolo piatto
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

    //  Form di modifica del piatto
    public function edit($id)
    {
        $piatto = Piatto::find($id);
        $tipologie = Tipologia::all();

        return view('piatti.edit', compact('piatto', 'tipologie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Aggiornamento delle informazioni relative al piatto
    public function update(PiattoUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $piatto = Piatto::find($id);
        $piatto->piatto_nome = $data['piatto_nome'];
        if(isset($data['piatto_img'])){
            $piatto->piatto_img = $data['piatto_img']->storePublicly('storage');
        }
        $piatto->piatto_descrizione = $data['piatto_descrizione'];
        $piatto->piatto_prezzo = $data['piatto_prezzo'];
        $piatto->piatto_visibile = $data['piatto_visibile'];
        $piatto->save();

        return redirect()->route('piatti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Eliminazione permanente del piatto
    public function destroy($id)
    {
        $piatto = Piatto::find($id);
        $piatto->piatto_visibile = 0;
        $piatto->save();
        $piatto->delete();
        // if(Storage::exists($piatto->piatto_img)){
        //     Storage::delete($piatto->piatto_img);
        // }else{
        //     dd('File does not exists.');
        // }
        return redirect()->route('piatti.index');
    }

    // Eliminazione non distruttiva del piatto. Il record si trova ancora nel DB
    public function softDestroy($id)
    {
        $piatto = Piatto::find($id);
        $piatto->delete();;
        return redirect()->route('piatti.index');
    }

    // Mostra la lista dei piatti momentaneamente eliminati dal menù
    public function HiddenPlates(Request $request)
    {   
        $userId = Auth::id();
        $search = $request->search;
        if($search) {
            $piatti = Piatto::onlyTrashed()->where(fn($query) => $query->where('rist_id', '=', $userId))
            ->where('piatto_nome', 'LIKE', "%$search%")
            ->where('piatto_visibile', 1)
            ->paginate(4);
        }else{
            $piatti = Piatto::onlyTrashed()->where(fn($query) => $query->where('rist_id', '=', $userId))
            ->where('piatto_visibile', 1)
            ->paginate(4);
        }

        return view('piatti.hidden', compact('piatti', 'search'));
    }

    // Sposta i piatti momentaneamente eliminati nella menù del ristorante.
    public function restorePlates($id)
    {
        Piatto::withTrashed()->find($id)->restore();

        return redirect()->route('hidden');
    }
}
