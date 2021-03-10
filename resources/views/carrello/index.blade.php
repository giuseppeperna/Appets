@extends('templates.layout')

@section('content')
<div class="carousel-item active" style="background: url({{asset('img/checkout.jpg')}}); background-size: cover;">

<div class="shopping-body">
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
</div>
@endsection
