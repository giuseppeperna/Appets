@extends('piatti.layouts.layoutPiatti')

@section('title', 'Informazioni utente')
@section('content')
<div class="carousel-item active" style="background: url(../img/slide/slide-6.jpg); background-size: cover;">
  <div class="container">
      <div class="row justify-content-center form-container">
          <div class="col-md-8">
              <h1 class="text-center" style="margin-bottom: 40px; color: white;">I miei dati</h1>
              <div class="card justify-center" >
                  <div class="card-body">
                    <h5 class="card-title">{{$user['rist_nome']}}</h5>
                    <p class="card-text">In questa sezione puoi trovare un riepilogo dei tuoi dati.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome Ristorante:</strong> {{$user['rist_nome']}}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{$user['email']}}</li>
                    <li class="list-group-item"><strong>Indirizzo:</strong> {{$user['rist_indirizzo']}}</li>
                    <li class="list-group-item"><strong>Descrizione:</strong> {{$user['rist_descrizione']}}</li>
                    <li class="list-group-item"><strong>Partita Iva:</strong> {{$user['rist_p_iva']}}</li>
                  </ul>
                  <div class="card-body">
                    <a href="{{ route('modifica-utente')}}" class="btn register-btn">Modifica</a>
                    <a href="{{ route('dashboard')}}" class="btn btn-warning">Indietro</a>
                  </div>
                </div>
          </div>
      </div>
  </div>

@endsection