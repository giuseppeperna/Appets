@extends('piatti.layouts.layoutpiatti')

@section('title', 'Lista ordini')

@section('content')
<div class="carousel-item active" style="background: url(../img/slide/slide-5.jpg); background-size: cover;">

    <section id="order-list" class="order-list">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 plates-list-container">
                <a class="btn register-btn" href="{{ route('statistiche') }}">Statistiche</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if($ordini->count() > 0)

                    @foreach ($ordini as $ordine)
                    <div class="card mb-3">
                        <div class="container">
                            <div class="row d-flex card-body">
                                <div class="col-lg-3 order-padding">
                                    <h5 class="card-title">Dati</h5>
                                    <p class="card-text">{{$ordine->ord_nome}} {{$ordine->ord_cognome}}</p>
                                    <p class="card-text">{{$ordine->ord_indirizzo}}</p>
                                </div>
                                <div class="col-lg-7 order-padding">
                                    <h5 class="card-title">Ordine</h5>
                                    <p class="card-text">{{$ordine->piatto_nome}}</p>
                                    <h5 class="card-title">Commenti</h5>
                                    <p class="card-text">{{$ordine->ord_commenti}}</p>
                                </div>
                                <div class="col-lg-2 justify-center order-padding">
                                    <div>
                                        <h5 class="card-title">Totale</h5>
                                        <p class="card-title">{{$ordine->ord_totale}} Euro</p>
                                    
                                        <h5 class="card-title">Stato</h5>
                                        <p class="card-title">
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
