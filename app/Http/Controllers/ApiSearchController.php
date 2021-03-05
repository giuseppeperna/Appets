<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RistoranteResource;
use App\Http\Resources\TipologiaResource;
use App\Piatto;
use App\User;
use App\Tipologia;
use Response;

class ApiSearchController extends Controller
{

    public function getRistorantiResults(Request $request) {
        $data = $request->get('data');

        $ristoranti = RistoranteResource::collection(User::where('rist_nome', 'like', "%{$data}%")
                         ->orWhere('rist_id', 'like', "%{$data}%")
                         ->get());
        
        return Response::json([
            'data' => $ristoranti
        ]);
    }

    public function getPiattiResults(Request $request) {
        $data = $request->get('data');

        $piatti = Piatto::where('piatto_nome', 'like', "%{$data}%")
                         ->orWhere('piatto_id', 'like', "%{$data}%")
                         ->get();
        
        return Response::json([
            'data' => $piatti
        ]);
    }

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
