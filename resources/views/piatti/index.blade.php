@extends('piatti.layouts.layoutPiatti')

@section('title', 'Lista piatti')

@section('content')
<div class="carousel-item active" style="background: url(../img/slide/slide-8.jpg); background-size: cover;">

    <section id="order-list" class="order-list">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 plates-list-container">
                    <div class="input-group mb-3 w-50">
                        <form class="input-group" method="get" action="{{ route('piatti.index')}}">
                            @csrf
                            <input type="text" name="search" class="form-control" placeholder="Cerca piatti..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn register-btn" type="submit" id="button-addon2">Cerca</button>
                            {{-- <a class="btn btn-danger clear-search" href="{{ route('piatti.index')}}">Cancella</a> --}}
                        </form>
                    </div>
                    <a class="btn register-btn" href="{{ route('piatti.create') }}">Aggiungi piatto</a>
                    <a class="btn btn-warning" href="{{ route('hidden') }}">Fuori Menù</a>
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


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#piatto{{$piatto->piatto_id}}delete" title="Elimina">
                                    <i class="bi bi-trash centering"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="piatto{{$piatto->piatto_id}}delete" tabindex="-1" aria-labelledby="piatto{{$piatto->piatto_id}}deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="piatto{{$piatto->piatto_id}}deleteLabel">{{$piatto->piatto_nome}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vuoi davvero cancellare il piatto?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route("piatti.destroy",$piatto->piatto_id) }}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger" title="Cancella">Cancella</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success hidden-plates" data-bs-toggle="modal" 
                                data-bs-target="#piatto{{$piatto->piatto_id}}" title="Nascondi">
                                    <i class="bi bi-eye-slash-fill centering"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="piatto{{$piatto->piatto_id}}" tabindex="-1" aria-labelledby="piatto{{$piatto->piatto_id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="piatto{{$piatto->piatto_id}}Label">{{$piatto->piatto_nome}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vuoi davvero nascondere il piatto?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route("soft-destroy",$piatto->piatto_id) }}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-success" title="Nascondi">Nascondi</button>
                                            </form>  
                                        </div>
                                        </div>
                                    </div>
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

    <div class="pagination pagination-container d-flex justify-content-center">
        {{ $piatti->links() }}
    </div>
@endsection('content')
