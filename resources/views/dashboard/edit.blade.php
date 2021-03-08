@extends('piatti.layouts.layoutPiatti')

@section('title', 'Modifica piatto')

@section('content')
<div class="carousel-item active" style="background: url(../../img/slide/slide-7.jpg); background-size: cover;">

<div class="container">
    <div class="row justify-content-center form-container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('aggiorna-utente')}}">
                        <div class="form-group container-form">
                            @csrf
                            @method('Put')
                    
                            <label for="rist_nome">Nome</label>
                            <input type="text" name="rist_nome" class="form-control" id="rist_nome" placeholder="Nome" 
                            value="{{ $user->rist_nome }}">
                            @error('rist_nome')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                    
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                            value="{{ $user->email }}">
                            @error('email')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <label for="rist_indirizzo">Indirizzo</label>
                            <input type="text" name="rist_indirizzo" class="form-control" id="rist_indirizzo" placeholder="Indirizzo"
                            value="{{ $user->rist_indirizzo }}">
                            @error('rist_indirizzo')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <label for="rist_descrizione">Descrizione</label>
                            <textarea name="rist_descrizione" id="rist_descrizione" cols="30" rows="10" class="form-control">{{ $user->rist_descrizione }}</textarea>
                            @error('rist_descrizione')
                            <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <label for="rist_p_iva">Partita Iva</label>
                            <input type="text" name="rist_p_iva" class="form-control" id="rist_p_iva" placeholder="Partita Iva"
                            value="{{ $user->rist_p_iva }}">
                            @error('rist_p_iva')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="submit-container">
                            <button type="submit" class="btn btn-success register-btn" style="margin-top: 10px;">Modifica</button>
                        </div>
                        <div class="go-back">
                            <a href="{{ route('utente')}}">Indietro</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection