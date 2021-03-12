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
        return dd(explode(',', $data));
    }
        

    public function getPiattiResults(Request $request) {

        $data = request('nome');
        $id = request('id');
        $data_p = explode(",", $id);


        $piatti = Piatto::where('piatto_nome', explode(",",$id))->get();
        
        return Response::json([
            'data' => $piatti
        ]);

        return dd($data_p);
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
