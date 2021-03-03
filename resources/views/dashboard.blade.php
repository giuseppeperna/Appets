@extends('templates.layout')
@section('content')
 <!-- ======= Dashboard Section ======= -->
 <section id="hero" class="dashboard">
    <div class="hero-container">
       <div>
          <div>
             <div class="carousel-item active" style="background: url(img/slide/slide-3.jpg); background-size: cover;">
                <div class="carousel-container">
                   <div class="carousel-content" >
                      <div class="card" style="width: 50rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="margin-bottom: 30px; font-size: 30px;">Benvenuto nella tua area personale NomeRistorante!</h5>
                          <p class="card-text" style="color: black; text-align: none;">In quest'area potrai modificare i dati del tuo ristorante, personalizzare il tuo menù aggiungendo i piatti che desideri e visualizzare le statistiche relative ai tuoi ordini.</p>
                          <a href="{{route('piatti.index')}}"style="background-color: #ffb03b;
                       	    border-color: #ffb03b" class="btn btn-primary">Gestisci il mio menù</a>
                          <a href="#" style="background-color: #ffb03b;
                       	    border-color: #ffb03b" class="btn btn-primary"class="btn btn-primary">Gestisci i miei ordini</a>
                          <a href="#" style="background-color: #ffb03b;
                         	    border-color: #ffb03b" class="btn btn-primary"class="btn btn-primary">Modifica la mia anagrafica</a>
                        </div>
                      </div>
                   </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- End Dashboard -->
@endsection
