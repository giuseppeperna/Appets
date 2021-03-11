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

         $ristoranti = DB::table('users')
        ->join('tipologie_ristoranti', 'users.rist_id', '=', 'tipologie_ristoranti.rist_id')
        ->join('tipologie', 'tipologie_ristoranti.tipologia_id', '=', 'tipologie.tipologia_id')
        ->whereIn('tipologia_nome', $data)
    
        ->get()->groupBy('rist_nome');

    
        return Response::json([
            'data' => $ristoranti,
        ]);
    }

    public function getPiattiResults(Request $request) {
    

        $data = request('nome');
        $id = request('id');
        $data_p = explode(",", $id);


        $piatti = Piatto::where('piatto_nome', explode(",",$id))
                        //  ->orWhere('piatto_id', 'like', "%{$data}%")
                         ->get();
        
        return Response::json([
            'data' => $piatti
        ]);

        // $data = request('nome');
        // $id = request('id');

        // $piatti = DB::table('piatti')
        //                 // ->whereIn('piatto_nome', $data)
        //                 ->where('piatto_prezzo', ($id))
        //                 ->whereIn('piatto_prezzo', $id)
        //                 ->get();
        
        // return Response::json([
        //     'data' => $piatti
        // ]);

        return dd($data_p);
    }

    public function getTipologieResults(Request $request) {
        $data = request('nome');
        $dataId = request('id');
        $dataRist = request('ristorante');

        $tipologie = DB::table('tipologie')
        ->join('tipologie_ristoranti', 'tipologie.tipologia_id', '=', 'tipologie_ristoranti.tipologia_id')
        ->join('users', 'tipologie_ristoranti.rist_id', '=', 'users.rist_id')
        ->whereIn('tipologia_nome', $data)
        // ->where('rist_nome', 'like', "%{$dataRist}%")
        // ->where('users.rist_id', 'like', "%{$dataId}%" )
        ->get();

        // $data = $request->get('data');
        // $tipologie = TipologiaResource::collection(Tipologia::where('tipologia_nome', 'like', "%{$data}%")
        //                  ->where('tipologia_id', 'like', "%{$data}%")
        //                  ->get());
        
        return Response::json([
            'data' => $tipologie
        ]);

        return dd($data);

        // $data = $request->get('data');

        // $tipologie = TipologiaResource::collection(Tipologia::where('tipologia_nome', 'like', "%{$data}%")
        //                  ->orWhere('tipologia_id', 'like', "%{$data}%")
        //                  ->get());
        
        // return Response::json([
        //     'data' => $tipologie
        // ]);
    }

}
