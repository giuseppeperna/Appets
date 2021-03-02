@extends('layouts.app')

@section('content')
<h1>Piatto</h1>
<h3>{{ $piatto->piatto_nome}}</h3>
<a href="{{ route('piatti.index')}}">Indietro</a>
@endsection