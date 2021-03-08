@extends('piatti.layouts.layoutPiatti')

@section('title', 'Piatti nascosti')

@section('content')
<div class="carousel-item active" style="background: url(../../img/slide/slide-10.jpg); background-size: cover;">
    <section id="order-list" class="order-list">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12 plates-list-container">
                            <div class="input-group mb-3 w-50">
                                <form class="input-group" method="get" action="{{ route('hidden')}}">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Cerca piatti nascosti..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn register-btn" type="submit" id="button-addon2">Cerca</button>
                                    {{-- <a class="btn btn-danger clear-search" href="{{ route('hidden')}}">Cancella</a> --}}
                                </form>
                            </div>
                            <a class="btn register-btn" href="{{ route('piatti.index') }}">Lista Piatti</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if($piatti->count() > 0)

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
                                        <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#piatto{{$piatto->piatto_id}}restore">
                                        Rendi disponibile
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="piatto{{$piatto->piatto_id}}restore" tabindex="-1" aria-labelledby="piatto{{$piatto->piatto_id}}restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="piatto{{$piatto->piatto_id}}restoreLabel">{{$piatto->piatto_nome}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Vuoi davvero rendere disponibile il piatto?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <a href="{{ route('restore', $piatto->piatto_id) }}" class="btn btn-warning" title="Conferma">Conferma</a>
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
                            <h3>Non ci sono piatti fuori menù!</h3>
                        </div> 
                        @endif
                        @endif
                </div>
            </div>
        </div>
    </section>
    <div class="pagination d-flex justify-content-center">
        {{ $piatti->links() }}
    </div>
@endsection('content')



