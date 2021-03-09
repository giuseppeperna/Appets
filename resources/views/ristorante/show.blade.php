@extends('templates.layout')

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
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="#" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                        <input class="quantity-product"type="number" id="quantità" name="quantità" min="1" max="10">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection('content')
