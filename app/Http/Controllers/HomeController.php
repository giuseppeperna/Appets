<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piatto;
use App\Tipologia;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ristoranti = User::all();

        return view('index', compact('ristoranti'));
    }

    public function show($id) {
       
        $ristorante = User::find($id);
        $cartCollection = \Cart::getContent();
        $piatti = Piatto::where(fn($query) => $query->where('rist_id', '=', $id))->get();
        

        return view('ristorante.show', compact('ristorante', 'piatti', 'cartCollection'));
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('carrello.index')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->back()->with('success_msg', 'Item is Added to Cart!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->back()->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

}
