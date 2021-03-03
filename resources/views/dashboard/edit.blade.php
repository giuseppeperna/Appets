@extends('layouts.app')

@section('content')
<h1>I miei dati</h1>
<h1>{{$user['rist_nome']}}</h1>
<h1>{{$user['rist_email']}}</h1>
<h1>{{$user['rist_indirizzo']}}</h1>
<h1>{{$user['rist_descrizione']}}</h1>
<h1>{{$user['rist_p_iva']}}</h1>
@endsection