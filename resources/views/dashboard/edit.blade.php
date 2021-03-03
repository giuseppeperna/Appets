@extends('piatti.layouts.layoutPiatti')

@section('title', 'Informazioni utente')
@section('content')

{{-- <h1>{{$user['rist_nome']}}</h1>
<h1>{{$user['rist_email']}}</h1>
<h1>{{$user['rist_indirizzo']}}</h1>
<h1>{{$user['rist_descrizione']}}</h1>
<h1>{{$user['rist_p_iva']}}</h1> --}}
<div class="container">
    <div class="row justify-content-center form-container">
        <div class="col-md-8">
            <h1 class="text-center">I miei dati</h1>
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$user['rist_nome']}}</h5>
                    <h5 class="card-title">{{$user['email']}}</h5>
                    <h5 class="card-title">{{$user['rist_indirizzo']}}</h5>
                    <p class="card-text">{{$user['rist_descrizione']}}</p>
                    <h5 class="card-title">{{$user['rist_p_iva']}}</h5>
                    <a href="{{ route('dashboard')}}" class="btn btn-primary">Indietro</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection