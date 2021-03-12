<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Appets</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons -->
      <link href="{{asset('img/favicon.png')}}" rel="icon">
      <!-- Ricordarsi di cambiare le favicon -->
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Lobster&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
      <!-- Libraries/Frameworks CSS Files -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
      <!-- Main CSS File -->
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
      <!-- Libreria animazioni -->
      <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <!-- Vue.js -->
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
      <script src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   </head>
   <body>
      <div id="root">
         @include('../templates._header')

         <div class="carousel-item active" style="background: url({{asset('img/checkout.jpg')}}); background-size: cover;">

            <div class="shopping-body d-flex flex-column">
                <div class="card shopping-cart__card">
                    <div class="row shopping-cart__row">
                        <div class="col-md-12 cart shopping-cart__cart">
                            <div class="title shopping-cart__title">
                                <div class="row shopping-cart__row">
                                    <div class="col shopping-cart__col">
                                        <h4><b>Il tuo ordine</b></h4>
                                    </div>
                                    <div class="col shopping-cart__col align-self-center text-right text-muted">
                                        @if(\Cart::getTotalQuantity()== 1)
                                        <h4>{{ \Cart::getTotalQuantity()}} Prodotto nel carrello</h4><br>
                                        <h5>Totale: {{ \Cart::getTotal() }} &euro;</h5>
                                        @elseif(\Cart::getTotalQuantity()> 0)
                                        <h4>{{ \Cart::getTotalQuantity()}} Prodotti nel carrello</h4><br>
                                        <h5>Totale: {{ \Cart::getTotal() }} &euro;</h5>
                                        @else
                                        <h4>Nessun prodotto nel carrello</h4><br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Feedback pagamento --}}
                            @if (session('success_message'))
                                <div class="alert alert-success">
                                    {{ session('success_message') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach($cartCollection as $item)
                            <div class="row shopping-cart__row border-top border-bottom">
                                <div class="row shopping-cart__row main shopping-cart__main align-items-center">
                                    <div class="col-2 shopping-cart__col-2"><a href="/ristorante/{{ $item->attributes->slug }}"><img class="img-fluid shopping-cart__img" src="{{asset($item->attributes->image)}}"></a></div>
                                    <div class="col shopping-cart__col">
                                        <div class="row shopping-cart__row text-muted">{{ $item->name }} x {{$item->quantity}}</div>
                                    </div>
                                    <div class="col shopping-cart__rol">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                            <input type="number" class="form-control form-control-sm shopping-cart-update" value="1"
                                                id="quantity" name="quantity" style="width: 70px; margin-right: 10px;">
                                            <button class="shopping-btn"><i class="fas fa-sync-alt"></i></button>
                                        </form>
                                    </div>
                                    <div class="col shopping-cart__col">
                                        <div class="row shopping-cart__row text-muted">Sub-totale : {{ \Cart::get($item->id)->getPriceSum() }} &euro; </div>
                                    </div>
                                    <div class="col shopping-cart__col">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                            <span>{{$item->price}} €</span>
                                            <button class="shopping-btn"><i class="fas fa-trash-alt shopping-cart__icon"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="back-to-shop d-flex justify-content-between align-items-center">
                                <a href="/" class="btn btn-warning">Continua lo shopping</a>
                                @if(count($cartCollection)>0)
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-secondary btn-md">Svuota carrello</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card shopping-cart__card mt-3">
                    <div class="row shopping-cart__row">
                        @if (!\Cart::isEmpty())
                        <div class="col-md-12 cart shopping-cart__cart">
                            {{-- FORM PAGAMENTO --}}
                            <form method="post" id="payment-form" action="{{route('checkout')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="Nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="nome" aria-describedby="Nome">
                                </div>
                                <div class="mb-3">
                                    <label for="Cognome" class="form-label">Cognome</label>
                                    <input type="text" class="form-control" name="nognome" aria-describedby="Cognome">
                                </div>
                                <div class="mb-3">
                                    <label for="Indirizzo" class="form-label">Indirizzo</label>
                                    <input type="text" class="form-control" name="indirizzo" aria-describedby="Indirizzo">
                                </div>
                                <div class="mb-3">
                                    <label for="Commenti" class="form-label">Note per il ristorante</label>
                                    <textarea type="text" class="form-control" name="commenti" aria-describedby="Commenti"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Totale Ordine</label>
                                    <input id="amount" name="amount" class="form-control" aria-describedby="Indirizzo" value="{{ \Cart::getTotal() }}" readonly style="background-color: white">
                                </div>
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                <button class="btn btn-register" type="submit"><span>Paga ora</span></button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

         @include('../templates._footer')

         <!-- Libreries/Frameworks JS Files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        {{-- Script pagamento --}}
        <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>

        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";
            braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
/*             paypal: {
                flow: 'vault'
            } */
            }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
                });
            });
            });
        </script>
      </div>
   </body>
</html>
