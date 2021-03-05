@extends('piatti.layouts.layoutPiatti')

@section('title', 'Dettaglio piatto')

@section('content')
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
                                <form onsubmit="return confirm('Vuoi davvero cancellare il piatto?');" action="{{ route("piatti.destroy",$piatto->piatto_id) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger" title="Rimuovi"><i class="bi bi-trash centering"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('piatti.index')}}" class="mt-3"><p>Torna alla lista piatti</p></a>
                </div>
            </div>
        </div>
    </section>
@endsection
