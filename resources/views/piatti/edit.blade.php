@extends('piatti.layouts.layoutPiatti')

@section('title', 'Modifica piatto')

@section('content')
<div class="container">
    <div class="row justify-content-center form-container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('piatti.update', $piatto['piatto_id'])}}" enctype="multipart/form-data">
                        <div class="form-group container-form">
                            @csrf
                            @method('Put')
                    
                            <label for="piatto_nome">Nome Piatto</label>
                            <input type="text" name="piatto_nome" class="form-control" id="piatto_nome" placeholder="Nome Piatto" 
                            value="{{ $piatto->piatto_nome }}">
                            @error('piatto_nome')
                                <p>{{ $message }}</p>
                            @enderror
                    
                            <label for="piatto_img">Immagine</label>
                            <div class="image-form-container">
                                <img src="{{asset($piatto->piatto_img)}}" alt="">
                            </div>
                            <input type="file" name="piatto_img" class="form-control" id="piatto_img">
                            @error('piatto_img')
                                <p>{{ $message }}</p>
                            @enderror
                    
                            <label>Tipologia</label>
                            <div class="categories">
                                <select name="tipologia" id="tipologia">
                                    <option>...</option>
                                    @foreach ($tipologie as $tipologia)
                                    <option value="{{ $tipologia->tipologia_id }}">{{$tipologia->tipologia_nome}}</option>
                                    @endforeach
                                </select>
                                @error('tipologia')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <label for="piatto_descrizione">Descrizione</label>
                            <input type="text" name="piatto_descrizione" class="form-control" id="piatto_descrizione" placeholder="Descrizione"
                            value="{{ $piatto->piatto_descrizione }}">
                            @error('piatto_description')
                                <p>{{ $message }}</p>
                            @enderror
                    
                            <label for="piatto_prezzo">Prezzo</label>
                            <input type="text" name="piatto_prezzo" class="form-control" id="piatto_prezzo" placeholder="Prezzo"
                            value="{{ $piatto->piatto_prezzo }}">
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
                            <button type="submit" class="btn btn-success">Modifica</button>
                        </div>
                        <div class="go-back">
                            <a href="{{ route('piatti.index')}}">Indietro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection