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

        $ristoranti = RistoranteResource::collection(User::where('rist_nome', 'like', "%{$data}%")->where('rist_id', 'like', "%{$dataId}%")          
        ->get());
    
        return Response::json([
            'data' => $ristoranti,
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
        // $data = request('nome');
        // $dataId = request('id');
        // $dataRist = request('ristorante');

        // $tipologie = DB::table('tipologie')
        // ->join('tipologie_ristoranti', 'tipologie.tipologia_id', '=', 'tipologie_ristoranti.tipologia_id')
        // ->join('users', 'tipologie_ristoranti.rist_id', '=', 'users.rist_id')
        // ->where('tipologia_nome', 'like', explode(",", "%{$data}%"))
        // ->where('rist_nome', 'like', "%{$dataRist}%")
        // ->where('users.rist_id', 'like', "%{$dataId}%" )
        // ->get();

        // // $data = $request->get('data');
        // // $tipologie = TipologiaResource::collection(Tipologia::where('tipologia_nome', 'like', "%{$data}%")
        // //                  ->where('tipologia_id', 'like', "%{$data}%")
        // //                  ->get());
        
        // return Response::json([
        //     'data' => $tipologie
        // ]);

        // return dd($data);

        $data = $request->get('data');

        $tipologie = TipologiaResource::collection(Tipologia::where('tipologia_nome', 'like', "%{$data}%")
                         ->orWhere('tipologia_id', 'like', "%{$data}%")
                         ->get());
        
        return Response::json([
            'data' => $tipologie
        ]);
    }

}
