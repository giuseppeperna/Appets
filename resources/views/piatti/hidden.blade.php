@extends('piatti.layouts.layoutPiatti')

@section('title', 'Piatti nascosti')

@section('content')
    <section id="order-list" class="order-list">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="input-group mb-3 w-50">
                                <form class="input-group" method="get" action="{{ route('hidden')}}">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Cerca piatti nascosti..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cerca</button>
                                    <a class="btn btn-danger clear-search" href="{{ route('hidden')}}">Cancella</a>
                                </form>
                            </div>
                            <a class="btn btn-success" href="{{ route('piatti.index') }}">Lista Piatti</a>
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
                                        <a href="{{ route('restore', $piatto->piatto_id) }}" onclick="return confirm('Vuoi davvero rendere disponibile il piatto?');" class="btn btn-warning" title="Dettagli">Rendi disponibile</i></a>                              
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else 
                        <div class="col-12 centering empty-plates">
                            <h3>Non ci sono piatti nascosti!</h3>
                        </div> 
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection('content')



