@extends('templates.layout')

@section('content')
<!-- ======= Hero Section ======= -->
<div class="carousel-item active" style="background: url({{asset('img/bg-menu.jpeg')}}); background-size: cover;">
    <section id="single-restaurant" class="single-restaurant">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="info-container text-center mx-auto pt-2">
                        <h1>{{$ristorante->rist_nome}}</h1>
                        <p>{{$ristorante->rist_indirizzo}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Order preview section --}}
                <div class="mb-3 col-lg-3">
                    <div class="order-container">
                        <h4 class="mb-3 text-center">Il tuo ordine: </h4>
                        <ul class="order-recap">
                            <li>
                                <p>Pizza margherita 7€ <a href="#" class="remove">Rimuovi</a></p>
                            </li>
                            <li>
                                <p>Pizza 7€ <a href="#" class="remove">Rimuovi</a></p>
                            </li>
                            <li>
                                <p>Pasta 7€ <a href="#" class="remove">Rimuovi</a></p>
                            </li>
                            <li>
                                <p>Riso 7€ <a href="#" class="remove">Rimuovi</a></p>
                            </li>
                            <li>
                                <p>Carne 7€ <a href="#" class="remove">Rimuovi</a></p>
                            </li>
                        </ul>
                        <div class="line"></div>
                        <p class="sub-total text-center mt-2">Totale ordine: 45 €</p>
                        <a href="#" class="btn btn-order centering">Riepilogo Ordine</a>

                    </div>
                </div>
                {{-- List dishes section --}}
                <div class="col-lg-9 center-justify flex-column">
                    <div class="card-container centering d-flex flex-column">
                        @foreach ($piatti as $piatto)
                        @if ($piatto->piatto_visibile == 1)
                        <div class="card-dish d-flex">
                            <div class="col-3 centering">
                                <img src="{{asset($piatto->piatto_img)}}" class="thumbnail-img-dish" alt="piatto">
                            </div>
                            <div class="col-6 ps-2">
                                <h5>{{$piatto->piatto_nome}}</h5>
                                <p class="description">{{$piatto->piatto_descrizione}}</p>
                            </div>
                            <div class="col-3 ps-2">
                                <p>Prezzo: <strong>{{$piatto->piatto_prezzo}} €</strong></p>
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example">
                                        <option disabled>Quantità</option>
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $piatto->piatto_id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $piatto->piatto_nome }}" id="name" name="name">
                                        <input type="hidden" value="{{ $piatto->piatto_prezzo }}" id="price" name="price">
                                        <input type="hidden" value="{{ $piatto->piatto_img }}" id="img" name="img">
                                        <input type="hidden" value="{{ $ristorante->rist_id }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-warning centering" class="tooltip-test" title="Aggiungi a ordine">
                                                    <i class="bi bi-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



{{-- @extends('templates.layout')

@section('title', 'Ristorante')

@section('content')
<div class="container-fluid piatti-container">
    <h1 class="text-center">{{$ristorante->rist_nome}}</h1>
    <div class="row">
        @foreach ($piatti as $piatto)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset($piatto->piatto_img)}}" alt="...">
                <div class="caption">
                    <h4>{{$piatto->piatto_nome}}</h4>
                    <p>{{$piatto->piatto_descrizione}}</p>
                    <div>
                        <p><strong>Prezzo: </strong> {{$piatto->piatto_prezzo}} Euro</p>
                    </div>
                    
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $piatto->piatto_id }}" id="id" name="id">
                        <input type="hidden" value="{{ $piatto->piatto_nome }}" id="name" name="name">
                        <input type="hidden" value="{{ $piatto->piatto_prezzo }}" id="price" name="price">
                        <input type="hidden" value="{{ $piatto->piatto_img }}" id="img" name="img">
                        <input type="hidden" value="{{ $ristorante->rist_id }}" id="slug" name="slug">
                        <input type="hidden" value="1" id="quantity" name="quantity">
                        <div class="card-footer" style="background-color: white;">
                              <div class="row">
                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                    <i class="fa fa-shopping-cart"></i> add to cart
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection('content') --}}
