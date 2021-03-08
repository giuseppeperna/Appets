@extends('piatti.layouts.layoutpiatti')

@section('title', 'Lista ordini')

@section('content')
<div class="carousel-item active" style="background: url(../img/slide/slide-5.jpg); background-size: cover;">

    <section id="order-list" class="order-list">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 plates-list-container">
                    {{-- <div class="input-group mb-3 w-50">
                        <form class="input-group" method="get" action="{{ route('ordini.index')}}">
                            @csrf
                            <input type="text" name="search" class="form-control" placeholder="Cerca ordini..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn register-btn" type="submit" id="button-addon2">Cerca</button>
                            <a class="btn btn-danger clear-search" href="{{ route('ordini.index')}}">Cancella</a>
                        </form>
                    </div> --}}
                    {{-- <a class="btn register-btn" href="{{ route('ordini.create') }}">Aggiungi ordine</a>
                    <a class="btn btn-warning" href="{{ route('hidden') }}">Fuori Menù</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($ordini->count() > 0)

                    @foreach ($ordini as $ordine)
                    <div class="card mb-3">
                        <div class="card-body d-flex">
                            <div class="col-2 order-padding">
                                <h5 class="card-title">Dati</h5>
                                <p class="card-text">{{$ordine->ord_nome}} {{$ordine->ord_cognome}}</p>
                                <p class="card-text">{{$ordine->ord_indirizzo}}</p>
                            </div>
                            <div class="col-7 order-padding">
                                <h5 class="card-title">Ordine</h5>
                                <p class="card-text">{{$ordine->piatto_nome}} X{{$ordine->quantità}}</p>
                                <h5 class="card-title">Commenti</h5>
                                <p class="card-text">{{$ordine->ord_commenti}}</p>
                            </div>
                            <div class="col-3 justify-center order-padding">
                                <div>
                                    <h5 class="card-title text-center">Totale</h5>
                                    <p class="card-title text-center">{{$ordine->ord_totale}} Euro</p>
                                </div>
                                <div>
                                    <h5 class="card-title text-center">Stato</h5>
                                    <p class="card-title text-center">
                                    @if ($ordine->ord_stato)
                                    Pagato
                                    @else
                                    In attesa
                                    @endif</p>    
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                @if (isset($search))
                <div class="col-12 centering empty-plates">
                    <h3>Nessun risultato!</h3>
                </div> 
                @else 
                <div class="col-12 centering empty-plates">
                    <h3>La tua lista ordini è vuota!</h3>
                </div>
                @endif
                @endif
                </div>
            </div>
        </div>
    </section>

    <div class="pagination pagination-container d-flex justify-content-center">
        {{ $ordini->links() }}
    </div>
@endsection('content')
