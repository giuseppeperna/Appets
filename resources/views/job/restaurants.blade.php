@extends('templates.layout')
@section('content')
 <!-- ======= Hero Section ======= -->
 <section id="hero">
    <div class="hero-container">
       <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner" role="listbox">
             <div class="carousel-item active" style="background: url(img/slide/slide-4.jpg); background-size: cover;">
                <div class="carousel-container">
                   <div class="carousel-content">
                      <h2 class="animate__animated animate__fadeInDown">Diventa subito partner di <span>Appets</span></h2>
                      <h2 class="animate__animated animate__fadeInDown"><span>Aumenta le tue vendite del 30%</span> grazie alla nostre consegne</h2>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- End Hero -->
     <!-- ======= Whu Us Section ======= -->
     <section id="why-us" class="why-us">
        <div class="container">

          <div class="section-title">
            <h2>Perchè diventare un partner di <span>Appets?</span></h2>
            <p>Perchè siamo il partner per le consegne a domicilio più apprezzato a Milano. Tantissimi ristoranti si affidano a noi e vogliamo aiutarti a sviluppare il tuo business!</p>
          </div>

          <div class="row">

            <div class="col-lg-4">
              <div class="box">
                <span><i class="fab fa-sellsy"></i></span>
                <h4>Aumenta le vendite</h4>
                <p>Affidati a strumenti di marketing efficaci per ricevere più ordini.</p>
              </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box">
                <span><i class="fas fa-chart-line"></i></span>
                <h4>Espandi la tua clientela</h4>
                <p>Attrai nuovi clienti in zona e falli tornare a ordinare.</p>
              </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box">
                <span><i class="fas fa-truck"></i></span>
                <h4>Approfitta dei nostri servizi</h4>
                <p>Abbiamo gli strumenti di crescita, assistenza e risparmio giusti per la tua attività, piccola o grande.</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Whu Us Section -->
   <!-- ======= Requirements Section ======= -->
   <section id="requirements" class="requirements">
    <div class="container">
       <div class="section-title">
          <h2 v-observe-visibility="{ callback: (isVisible, entry) => animation_visibility(isVisible, entry, 'events') }" :class="{ 'visible animate__animated animate__fadeInLeft': animateSection.events, 'invisible': !animateSection.events }">Scegli i prodotti e fissa i prezzi <span>secondo le tue esigenze</span></h2>
       </div>
       <div class="row requirement-item">
          <div class="col-lg-6">
             <img src="img/restaurant-req.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
             <h3>Carica il menù e potrai ricevere ordini in soli 7 giorni</h3>
             <div class="price">
                <p><span>Ti invieremo tutto il necessario per cominciare</span></p>
             </div>
             <p class="font-italic">
                &check; Ti forniamo una stampante multifunzione, un tablet e materiali brandizzati Appets per promuovere la tua attività;
             </p>
             <p>
                &check; Assistenza per tablet 24 ore su 24;
             </p>
             <p>
                &check; Risparmia su foto, siti web e scorte;
             </p>
             <p>
                &check; Marketing e promozione per il tuo ristorante;
             </p>
             <p>
                &check; Usa la rete di rider Deliveroo o consegna autonomamente;
             </p>
             <p>
                &check; Sconti sul packaging: confezioni create su misura per ogni piatto o tipo di cucina;
             </p>
             <p>
                &check; Su <strong>Area Ristoranti</strong> trovi informazioni e dati utili a trovare nuovi clienti e fidelizzarli;
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
        <h2>Contattaci <span>Subito</span></h2>
        <p>E diventa nostro partner!</p>
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
