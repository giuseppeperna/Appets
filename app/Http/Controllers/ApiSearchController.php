<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RistoranteResource;
use App\Http\Resources\TipologiaResource;
use Illuminate\Support\Facades\DB;
use App\Piatto;
use App\User;
use App\Tipologia;
use Response;

class ApiSearchController extends Controller
{
    // Ricerca ristoranti per tipologia
    public function getRistorantiResults(Request $request) {
        $data = request('nome');
        $dataId = request('id');

        $ristoranti = RistoranteResource::collection(
            User::whereHas('tipologie', function($q) {
                $data = request('nome');
            $q->whereIn('tipologia_nome', $data);
        })
        ->get())->groupBy('rist_nome');

    
        return Response::json([
            'data' => $ristoranti,
        ]);
    }
        
    // Ricerca piatti per nome
    public function getPiattiResults(Request $request) {

        $data = request('nome');

        $piatti = Piatto::where('piatto_nome', $data)->get();
        
        return Response::json([
            'data' => $piatti
        ]);


    }

    // Ricerca tipologia per nome
    public function getTipologieResults(Request $request) {

        $data = $request->get('data');

        $tipologie = TipologiaResource::collection(Tipologia::where('tipologia_nome', 'like', "%{$data}%")
                         ->orWhere('tipologia_id', 'like', "%{$data}%")
                         ->get());
        
        return Response::json([
            'data' => $tipologie
        ]);
    }

}
