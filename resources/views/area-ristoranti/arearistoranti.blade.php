@extends('templates.layout')

@section('content')

<section id="restourants-area" class="restourants-area container">
    <div class="row">
        <div class="col-6">
            <div class="card mx-auto" style="width: 20rem;">
                <a href="{{route('sign-in')}}">
                    <img src="img/jobs/jobs-3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Registrati</h5>
                        <p class="card-text">Registra il tuo ristorante su Appets, in pochi click potrai creare la tua pagina personale e connetterti con tutti i clienti della tua zona!</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-6">
            <div class="card mx-auto" style="width: 20rem;">
                <a href="{{route('dashboard')}}">{{--TODO: da collegare alla dashboard del rist con il controllo dell'autenticazione --}}
                    <img src="img/jobs/jobs-3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Accedi</h5>
                        <p class="card-text">Accedi alla tua pagina personale per gestire ordini, modificare i dati del tuo ristorante ed aggiornare il tuo menù.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

</section>

@endsection
