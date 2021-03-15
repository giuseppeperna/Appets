<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piatto;
use App\Tipologia;
use App\User;
use App\Ordine;

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

    //  Hompage con lista dei ristoranti
    public function index()
    {
        $ristoranti = User::all();

        return view('index', compact('ristoranti'));
    }

    // Mostra la pagina del singolo ristorante
    public function show($id) {
       
        $ristorante = User::find($id);
        $cartCollection = \Cart::getContent();
        $piatti = Piatto::where(fn($query) => $query->where('rist_id', '=', $id))->get();
        

        return view('ristorante.show', compact('ristorante', 'piatti', 'cartCollection'));
    }

    //Gestisci anche token pagamento per front-end
    public function cart(Request $request)  {
        $cartCollection = \Cart::getContent();

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();

        return view('carrello.index', compact('token'))->with(['cartCollection' => $cartCollection]);
    }

    //Controllo pagamento e aggiungo ordine al DB
    public function createOrderWithPayment(Request $request){
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $data = $request->all();
        $cartItems = \Cart::getContent();

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        //Se il pagamento va a buon fine, salva l'ordine con lo stato di "pagato"
        if ($result->success) {
            $transaction = $result->transaction;

            $newOrder = Ordine::firstOrCreate([
                'ord_nome' => $data['nome'],
                'ord_cognome' => $data['nognome'],
                'ord_indirizzo' => $data['indirizzo'],
                'ord_totale' => $data['amount'],
                'ord_commenti' => $data['commenti'],
                'ord_stato' => 1
            ]);

            $newOrder->save();

            foreach ($cartItems as $item){
                $newOrder->piatti()->attach($item->id);
            }

            \Cart::clear();

            return back()->with('success_message', "L'ordine è andato a buon fine. Il codice del pagamento è: " . $transaction->id);
        } else {
        //Se il pagamento NON va a buon fine, salva l'ordine con lo stato di "NON pagato"
            $errorString = "";

            $newOrder = Ordine::firstOrCreate([
                'ord_nome' => $data['nome'],
                'ord_cognome' => $data['nognome'],
                'ord_indirizzo' => $data['indirizzo'],
                'ord_totale' => $data['amount'],
                'ord_commenti' => $data['commenti'],
                'ord_stato' => 0,
            ]);

            $newOrder->save();

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->with('Transazione non a buon fine: ' . $result->message);

        }
    }

    // Aggiunge un prodotto al carrello
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

    // Rimuove un prodotto dal carrello
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->back()->with('success_msg', 'Item is removed!');
    }

    // Aggiorna un prodotto nel carrello
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

    // Svuota il carrello
    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

}
