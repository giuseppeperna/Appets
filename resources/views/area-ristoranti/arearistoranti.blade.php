@extends('templates.layout')

@section('content')
<!-- ======= Dashboard Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div class="carousel-item active" style="background: url({{asset('img/area-ristoranti-wp.png')}}); background-size: cover;">
            <div class="carousel-container">
                <div class="carousel-content container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="card mx-auto bg-card" style="width: 20rem;">
                                <div class="card-body register">
                                    <img src="{{asset('img/join.jpg')}}" class="card-img-top round" alt="...">
                                    <a href="{{route('sign-in')}}" class="btn btn-register">
                                        Registrati
                                    </a>
                                    <div class="card-text" style="color: white;">Entra a far parte di Appets</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="card mx-auto bg-card"  style="width: 20rem;">
                                <div class="card-body access">
                                    <img src="{{asset('img/private.jpg')}}" class="card-img-top round" alt="...">
                                    <a href="{{route('dashboard')}}" class="btn btn-register">
                                        Accedi
                                    </a>
                                    <div class="card-text" style="color: white;">Accedi alla tua area personale</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
