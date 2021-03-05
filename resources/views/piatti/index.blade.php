@extends('piatti.layouts.layoutPiatti')

@section('title', 'Lista piatti')

@section('content')
    <section id="order-list" class="order-list">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="input-group mb-3 w-50">
                                <form class="input-group" method="get" action="{{ route('piatti.index')}}">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Cerca piatti..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cerca</button>
                                    <a class="btn btn-danger clear-search" href="{{ route('piatti.index')}}">Cancella</a>
                                </form>
                            </div>
                            <a class="btn btn-success" href="{{ route('piatti.create') }}">Aggiungi piatto</a>
                            <a class="btn btn-success" href="{{ route('hidden') }}">Piatti nascosti</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if($piatti->count() > 0)

                            @foreach ($piatti as $piatto)
                            <div class="card mb-3">
                                <div class="card-body d-flex">
                                    <div class="col-2">
                                        <a href="{{ route('piatti.show', $piatto->piatto_id) }}"><img src="{{asset($piatto->piatto_img)}}" alt="..." class="thumbnail-img"></a>
                                    </div>
                                    <div class="col-7">
                                        <h5 class="card-title">{{$piatto->piatto_nome}}</h5>
                                        <p class="card-text">{{$piatto->piatto_descrizione}}</p>
                                    </div>
                                    <div class="col-3 centering">
                                        <a href="{{ route('piatti.show', $piatto->piatto_id) }}" class="btn btn-warning" title="Dettagli"><i class="bi bi-three-dots centering"></i></a>
                                        <a href="{{ route('piatti.edit', $piatto->piatto_id)}}" class="btn btn-primary me-2 ms-2" title="Modifica"><i class="bi bi-pencil-square centering"></i></a>
                                        <form onsubmit="return confirm('Vuoi davvero cancellare il piatto?');" action="{{ route("piatti.destroy",$piatto->piatto_id) }}" method="post">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger" title="Rimuovi"><i class="bi bi-trash centering"></i></button>
                                        </form>
                                        <div class="hidden-plates">
                                            <form onsubmit="return confirm('Vuoi davvero nascondere il piatto?');" action="{{ route("soft-destroy",$piatto->piatto_id) }}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-success" title="Nascondi"><i class="bi bi-eye-slash-fill centering"></i></button>
                                            </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        @if (isset($search))
                        <div class="col-12 centering empty-plates">
                            <h3>Nessun risultato!</h3>
                        </div> 
                        @else 
                        <div class="col-12 centering empty-plates">
                            <h3>La tua lista piatti è vuota!</h3>
                        </div>
                        @endif
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection('content')
