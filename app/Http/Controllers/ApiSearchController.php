<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piatto;
use App\User;
use Response;

class ApiSearchController extends Controller
{
    public function getRistorantiResults(Request $request) {
        $data = $request->get('data');

        $ristoranti = User::where('rist_nome', 'like', "%{$data}%")
                         ->orWhere('rist_id', 'like', "%{$data}%")
                         ->get();
        
        return Response::json([
            'data' => $ristoranti
        ]);
    }

    public function getPiattiResults(Request $request) {
        $data = $request->get('data');

        $ristoranti = Piatto::where('piatto_nome', 'like', "%{$data}%")
                         ->orWhere('piatto_id', 'like', "%{$data}%")
                         ->get();
        
        return Response::json([
            'data' => $ristoranti
        ]);
    }
}
