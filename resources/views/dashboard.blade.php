@extends('templates.layout')
@section('content')
<!-- ======= Dashboard Section ======= -->
<section id="hero" class="dashboard">
   <div class="hero-container">
      <div class="carousel-item active" style="background: url(img/slide/slide-3.jpg); background-size: cover;">
         <div class="carousel-container">
            <div class="carousel-content">
               <h5 class="card-title intro" style="color:white; font-size: 2.5rem; margin-bottom:25px;">Benvenuto nella tua area personale, {{$user->rist_nome}}!</h5>

               <div class="card" style="background-color:transparent; border:none">
                  <div class="card-body d-flex justify-content-space-around">
                     <div class="card singleCard">
                        <div class="card-body">
                           <h5 class="card-title">Menù</h5>
                           <img src="img/dash_menu.jpg" class="card-img-top" alt="Immagine menu">
                           <div class="card-text dashTitle">
                              Aggiungi o modifica i piatti del tuo ristorante.
                           </div>
                           <a href="{{route('piatti.index')}}"><div class="mytext">Gestisci il mio menù</div></a>
                        </div>
                     </div>
                     <div class="card singleCard">
                        <div class="card-body">
                           <h5 class="card-title">Ordini</h5>
                           <img src="img/dash_stat.jpg"class="card-img-top" alt="Immagine statistiche">
                           <div class="card-text dashTitle">
                              Visualizza le statistiche relative ai tuoi ordini.
                           </div>
                           <a href="{{route('ordini')}}"><div class="mytext">Visualizza ordini</div></a>
                        </div>
                     </div>
                     <div class="card singleCard">
                        <div class="card-body" >
                           <h5 class="card-title">Anagrafica</h5>
                           <img src="img/dash_anag.jpg"class="card-img-top" alt="Immagine anagrafica">
                           <div class="card-text dashTitle">
                              Visualizza e modifica i dati del tuo ristorante.
                           </div>
                           <a href="{{route('utente')}}"><div class="mytext">Gestione anagrafica</div></a>
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
