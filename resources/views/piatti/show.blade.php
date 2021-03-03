@extends('layouts.app')

@section('content')
<h1>Piatto</h1>
<h3>{{ $piatto->piatto_nome}}</h3>
<a href="{{ route('piatti.index')}}">Indietro</a>
<a class="btn btn-success" href="{{ route('piatti.edit', $piatto->piatto_id)}}">Modifica</a>
<form action="{{ route("piatti.destroy",$piatto->piatto_id) }}" method="post">
    @csrf
    @method("delete")
    <button type="submit" class="btn btn-danger">Elimina</button>
</form>
@endsection