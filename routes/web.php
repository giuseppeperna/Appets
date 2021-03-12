<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->middleware('auth')->name('dashboard');
Route::get('/ristorante/{ristorante}', 'HomeController@show')->name('ristorante');
Route::get('/cart', 'HomeController@cart')->name('cart.index');
Route::post('/add', 'HomeController@add')->name('cart.store');
Route::post('/update', 'HomeController@update')->name('cart.update');
Route::post('/remove', 'HomeController@remove')->name('cart.remove');
Route::post('/clear', 'HomeController@clear')->name('cart.clear');
Route::post('/checkout', 'HomeController@createOrderWithPayment')->name('checkout');

Route::prefix('dashboard')
->middleware('auth')
->group(function () {
    Route::delete('piatti/{piatti}/delete','PiattiController@softDestroy')->name('soft-destroy');
    Route::get('piatti/nascosti', 'PiattiController@hiddenPlates')->name('hidden');
    Route::get('piatti/aggiungi/{piatto}', 'PiattiController@restorePlates')->name('restore');
    Route::resource('piatti', 'PiattiController');
    Route::get('utente', 'DashboardController@show')->name('utente');
    Route::get('utente/edit', 'DashboardController@edit')->name('modifica-utente');
    Route::put('utente/update', 'DashboardController@update')->name('aggiorna-utente');
    Route::get('ordini', 'OrdiniController@index')->name('ordini');
    Route::get('statistiche', 'ChartjsController@index')->name('statistiche');
});

Route::get('/area-ristoranti', function() {
    if(Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('area-ristoranti.arearistoranti');
})->name('accesso');

Route::get('/sign-in', function() {
    return view('auth.register');
})->name('sign-in');
