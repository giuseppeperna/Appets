@extends('templates.layout')

@section('content')
<!-- ======= Hero Section ======= -->
<div class="carousel-item active" style="background: linear-gradient(90deg, rgba(68,129,62,1) 0%, rgba(146,194,76,1) 50%, rgba(99,172,76,1) 100%);">
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
                            @if(\Cart::getTotalQuantity()>0)
                            @foreach ($cartCollection as $item)
                            <li>{{$item->name}} x {{$item->quantity}}
                            <form action="{{ route('cart.remove') }}" method="POST" style="display: inline">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="remove" style="margin-right: 10px;">Rimuovi</button>
                            </form></li>
                            @endforeach
                            <div class="line"></div>
                            <p class="sub-total text-center mt-2">Totale ordine: {{ \Cart::getTotal() }}€</p>
                            @endif
                        </ul>
                        <a href="{{route('cart.index')}}" class="btn btn-order centering">Riepilogo Ordine</a>

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
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="input-group input-group-order">
                                        <input type="hidden" value="{{ $piatto->piatto_id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $piatto->piatto_nome }}" id="name" name="name">
                                        <input type="hidden" value="{{ $piatto->piatto_prezzo }}" id="price" name="price">
                                        <input type="hidden" value="{{ $piatto->piatto_img }}" id="img" name="img">
                                        <input type="hidden" value="{{ $ristorante->rist_id }}" id="slug" name="slug">
                                        <select class="form-select" aria-label="Default select example" id="quantity" name="quantity">
                                            <option disabled>Quantità</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-warning centering" class="tooltip-test" id="button-addon2" title="Aggiungi a ordine">
                                                    <i class="bi bi-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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