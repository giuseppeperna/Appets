@extends('piatti.layouts.layoutPiatti')

@section('title', 'Dettaglio piatto')

@section('content')
<div class="carousel-item active" style="background: url(../../img/slide/slide-8.jpg); background-size: cover;">

    <section id="single-order" class="single-order">
        <div class="container">
            <div class="row">
                <div class="col-12 centering flex-column">
                    <div class="card mb-3 w-50 ">
                        <img src="{{asset($piatto->piatto_img)}}" class="card-img-top detail-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$piatto->piatto_nome}}</h5>
                            <p class="card-text">{{$piatto->piatto_descrizione}}</p>
                            <p class="card-text"><small class="text-muted">{{$piatto->piatto_prezzo}} €</small></p>
                            @if($piatto->piatto_visibile)
                            <p class="text-success">DISPONIBILE</p>
                            @else
                            <p class="text-danger">ESAURITO</p>
                            @endif
                            <div class="d-flex justify-content-end">
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
                                            <h5 class="modal-title" id="piatto{{$piatto->piatto_id}}deleteLabel">Elimina</h5>
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
                            </div>
                        </div>
                        <a href="{{route('piatti.index')}}" class="mt-3 text-center"><p>Torna alla lista piatti</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
