@extends('layouts.app')

@section('content')
<h1>Lista piatti</h1>
<a class="btn btn-success" href="{{ route('piatti.create') }}">Aggiungi piatto</a>
@foreach ($piatti as $piatto)
    <h3>{{ $piatto->piatto_nome}}</h3>
    <img src="{{asset($piatto->piatto_img)}}" alt="">
    <p>{{ $piatto->piatto_descrizione}}</p>
    <span>{{$piatto->piatto_prezzo}} Euro</span>
    <a href="{{ route('piatti.show', $piatto->piatto_id) }}">Details</a>
@endforeach
@endsection