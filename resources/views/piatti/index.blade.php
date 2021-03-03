@extends('piatti.layouts.layoutPiatti')

@section('title', 'Lista piatti')

@section('content')
    <section id="order-list" class="order-list">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="input-group mb-3 w-50">
                                <input type="text" class="form-control" placeholder="Filtra piatti..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cerca</button>
                                <a class="btn btn-success" href="{{ route('piatti.create') }}">Aggiungi piatto</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @foreach ($piatti as $piatto)
                            <div class="card mb-3">
                                <div class="card-body d-flex">
                                    <div class="col-2">
                                        <img src="{{asset($piatto->piatto_img)}}" alt="..." class="thumbnail-img">
                                    </div>
                                    <div class="col-7">
                                        <h5 class="card-title">{{$piatto->piatto_nome}}</h5>
                                        <p class="card-text">{{$piatto->piatto_descrizione}}</p>
                                    </div>
                                    <div class="col-3 centering">
                                        <a href="{{ route('piatti.show', $piatto->piatto_id) }}" class="btn btn-warning" title="Dettagli"><i class="bi bi-three-dots centering"></i></a>
                                        <button type="button" class="btn btn-primary me-2 ms-2" title="Modifica"><i class="bi bi-pencil-square centering"></i></button>
                                        <form action="{{ route("piatti.destroy",$piatto->piatto_id) }}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger" title="Rimuovi"><i class="bi bi-trash centering"></i></button>
                                        </form>                               
                                    
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection('content')
