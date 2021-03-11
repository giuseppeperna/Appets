<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\RistoranteResource;
use App\Http\Resources\PiattoResource;
use App\Http\Resources\TipologiaResource;
use App\User;
use App\Piatto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ristoranti/search', 'ApiSearchController@getRistorantiResults')
->middleware('cors')
->middleware('api_token');

Route::get('/piatti/search', 'ApiSearchController@getPiattiResults')
->middleware('cors')
->middleware('api_token');

Route::get('/tipologie/search', 'ApiSearchController@getTipologieResults')
->middleware('cors')
->middleware('api_token');


Route::get('/ristoranti', function() {
    $name = request('nome');
    return ['success' => true, 
            'response' => RistoranteResource::collection(User::all()),
            'ristoranti_count' => RistoranteResource::collection(User::all())->count(),
            'nome' => $name
        ];
})->middleware('cors')->middleware('api_token');

Route::get('/piatti', function() {
    return ['success' => true, 
            'response' => PiattoResource::collection(Piatto::all()),
            'piatti_count' => PiattoResource::collection(Piatto::all())->count(),
        ];
})->middleware('cors')->middleware('api_token');
