@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('piatti.store')}}" enctype="multipart/form-data">
    <div class="form-group container-form">
        @csrf
        @method('Post')

        <label for="piatto_nome">Nome Piatto</label>
        <input type="text" name="piatto_nome" class="form-control" id="piatto_nome" placeholder="Nome Piatto" 
        value="{{ old('piatto_nome') }}">
        @error('piatto_nome')
            <p>{{ $message }}</p>
        @enderror

        <label for="piatto_img">Immagine</label>
        <input type="file" name="piatto_img" class="form-control" id="piatto_img">
        @error('piatto_img')
            <p>{{ $message }}</p>
        @enderror

        <label for="piatto_descrizione">Descrizione</label>
        <input type="text" name="piatto_descrizione" class="form-control" id="piatto_descrizione" placeholder="Descrizione"
        value="{{ old('piatto_descrizione') }}">
        @error('piatto_description')
            <p>{{ $message }}</p>
        @enderror

        <label for="piatto_prezzo">Prezzo</label>
        <input type="text" name="piatto_prezzo" class="form-control" id="piatto_prezzo" placeholder="Prezzo"
        value="{{ old('piatto_prezzo') }}">
        @error('piatto_prezzo')
            <p>{{ $message }}</p>
        @enderror

        <fieldset>
            <legend>Visibile</legend>
            <input type="radio" id="yes" name="piatto_visibile" value="1">
            <label for="yes">Si</label><br>
            <input type="radio" id="no" name="piatto_visibile" value="0">
            <label for="no">No</label><br>
        </fieldset>
        

    </div>
    <div class="submit-container">
        <button type="submit" class="btn btn-success">Crea</button>
    </div>
    <div class="go-back">
        <a href="{{ route('piatti.index')}}">Indietro</a>
    </div>
</form>

@endsection