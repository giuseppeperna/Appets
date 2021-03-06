@extends('templates.layout')
@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero">
    <div class="hero-container">
       <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner" role="listbox">
             <div class="carousel-item active" style="background: url(img/slide/slide-5.jpg); background-size: cover;">
                <div class="carousel-container">
                   <div class="carousel-content">
                      <h2 class="animate__animated animate__fadeInDown">Aiutaci a costruire <span>Appets</span></h2>
                      <h2 class="animate__animated animate__fadeInDown"><span>Sarà la</span> Food Company definitiva</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">
           <div class="row">
              <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch">
                 <div class="content">
                    <h3>In <strong>Appets</strong> trasformeremo il modo in cui la gente pensa al cibo</h3>
                    <br>
                    <p class="about-text">
                        Quando pensi ad Appets, probabilmente pensi alla possibilità di ricevere i piatti che ami a domicilio, in mezz'ora. Incredibile, vero? Eppure, le cose veramente incredibili succedono dietro le quinte: storie di grande crescita, immense sfide ed enormi opportunità. Storie che ci piacerebbe raccontare insieme a te.
                    </p>
                    <p class="about-text">
                        Vogliamo diventare la food company definitiva: l'app alla quale ti affidi quando la fame si fa sentire.
                    </p>
                    <p class="about-text">
                        Offriamo accesso illimitato a tantissimi ristoranti e tipi di cucina differenti, dando alla gente la libertà di mangiare quello che vuole, quando vuole, dove vuole.
                    </p>
                    <p class="about-text">
                        Oggi, dopo 6 anni, Deliveroo è disponibile in 13 mercati e vanta oltre 60.000 rider che consegnano ordini da 80.000 ristoranti in più di 500 città in tutto il mondo.
                    </p>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- End About Section -->
   <!-- ======= Requirements Section ======= -->
   <section id="requirements" class="requirements">
    <div class="container">
       <div class="section-title">
          <h2 v-observe-visibility="{ callback: (isVisible, entry) => animation_visibility(isVisible, entry, 'events') }" :class="{ 'visible animate__animated animate__fadeInLeft': animateSection.events, 'invisible': !animateSection.events }">Perchè lavorare <span>con noi?</span></h2>
       </div>
       <div class="row requirement-item">
          <div class="col-lg-6">
             <img src="img/operations-req.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
             <h3>Siamo alla ricerca di persone entusiaste che abbiano voglia di tuffarsi in una nuova e stimolante esperienza</h3>
             <div class="price">
                <p><span>Cinque buone ragioni</span></p>
             </div>
             <p class="font-italic">
                &#8226; Affronterai sfide stimolanti;
             </p>
             <p>
                &#8226; Hai un'idea? La realizzerai;
             </p>
             <p>
                &#8226; Puoi diventare un azionista;
             </p>
             <p>
                &#8226; Siamo un'azienda in forte crescita;
             </p>
             <p>
                &#8226; Il Bomba ha bisogno di te;
             </p>
          </div>
       </div>
    </div>
 </section>
  <!-- ======= End Requirements Section ======= -->
   <!-- =======  Apply now Section ======= -->
   <section id="apply-now" class="apply-now">
    <div class="container">

      <div class="section-title">
        <h2>Candidati <span>Subito</span></h2>
        <p>Non vediamo l'ora di averti nella nostra squadra! Abbiamo bisogno di te!</p>
      </div>

      <form action="" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="col-lg-4 col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Il tuo nome" data-rule="minlen:4" data-msg="Inserire almeno 4 caratteri">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="La tua email" data-rule="email" data-msg="Inserire una email valida">
            <div class="validate"></div>
          </div>
          <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Il tuo numero di telefono" data-rule="minlen:4" data-msg="Inserire almeno 4 caratteri">
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Il tuo messaggio"></textarea>
          <div class="validate"></div>
        </div>
        <div class="text-center"><br><button class="btn btn-appets" type="submit">Invia messaggio</button></div>
      </form>

    </div>
  </section><!-- End Apply Now Section -->
@endsection
