@extends('templates.layout')
@section('content')
     <!-- End Header -->
         <!-- ======= Hero Section ======= -->
         <section id="hero">
            <div class="hero-container">
               <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active" style="background: url(img/slide/slide-1.jpg); background-size: cover;">
                        <div class="carousel-container">
                           <div class="carousel-content">
                              <h2 class="animate__animated animate__fadeInDown">Appets</h2>
                              <h2 class="animate__animated animate__fadeInDown"><span>I piatti</span> della tua città</h2>
                              <p class="animate__animated animate__fadeInUp">Solo a Milano, vicino a te.</p>
                              <a href="{{route('home')}}/#restaurants" class="btn btn-light" id="basic-addon2">Cerca ristorante</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End Hero -->
         <main id="main">
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch">
                        <div class="content">
                           <h3>A casa tua con <strong>Appets</strong></h3>
                           <br>
                           <p class="about-text">
                              Appets è l'app che ti permette di ricevere a domicilio i migliori piatti della tua città in pochi minuti. Mettiamo in contatto utenti, aziende e corrieri per renderlo possibile e operiamo esclusivamente a Milano. Il progetto nasce con l'obiettivo di trasformare il modo in cui i cittadini milanesi acquisiscono ciò di cui hanno bisogno rendendo le città più accessibili. In Appets vogliamo dare a tutti la possibilità di avere accesso a qualsiasi piatto cucinato dai migliori ristoranti della città, con un impatto sostenibile sull'economia, la società e l'ambiente: Siamo un'azienda tech-first responsabile.
                           </p>
                           <div class="about-image">
                              <img src="img/bomba.jpg" alt="">
                           </div>
                        </div>
                        <br>
                        <p class="about-text"><strong>Marco Zong detto "Il Bomba"<br>CEO & Fondatore</strong></p>
                     </div>
                  </div>
               </div>
            </section>
            <!-- End About Section -->
            <!-- ======= Restaurants Section ======= -->
            <section id="restaurants" class="restaurants">
               <div class="container">
                  <div class="section-title">
                     <h2 v-observe-visibility="{ callback: (isVisible, entry) => animation_visibility(isVisible, entry, 'restaurants') }" :class="{ 'visible animate__animated animate__fadeInDown': animateSection.restaurants, 'invisible': !animateSection.restaurants }">I tuoi piatti preferiti. <span>Consegnati da noi</span></h2>
                  </div>
                  <p class="text-center">I nostri ristoranti per categoria</p>
                  <br>
                  <div class="row">
                     <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="restaurants-flters">
                           <li :class="userChoice == 'italiano' ? 'filter-active' : ''" @click="userChoice = 'italiano'; ;searchRestaurants()">Italiano</li>
                           <li :class="userChoice == 'giapponese' ? 'filter-active' : ''" @click="userChoice = 'giapponese'; searchRestaurants()">Giapponese</li>
                           <li :class="userChoice == 'cinese' ? 'filter-active' : ''" @click="userChoice = 'cinese'; searchRestaurants()">Cinese</li>
                           <li :class="userChoice == 'libanese' ? 'filter-active' : ''" @click="userChoice = 'libanese'; searchRestaurants()">Libanese</li>
                           <li :class="userChoice == 'ungherese' ? 'filter-active' : ''" @click="userChoice = 'ungherese'; searchRestaurants()">Ungherese</li>
                           <li :class="userChoice == 'egiziano' ? 'filter-active' : ''" @click="userChoice = 'egiziano'; searchRestaurants()">Egiziano</li>
                           <li :class="userChoice == 'coreano' ? 'filter-active' : ''" @click="userChoice = 'coreano'; searchRestaurants()">Coreano</li>
                           <li :class="userChoice == 'thailandese' ? 'filter-active' : ''" @click="userChoice = 'thailandese'; searchRestaurants()">Thailandese</li>
                           <li :class="userChoice == 'indiano' ? 'filter-active' : ''" @click="userChoice = 'indiano'; searchRestaurants()">Indiano</li>
                           <li :class="userChoice == 'messicano' ? 'filter-active' : ''" @click="userChoice = 'messicano'; searchRestaurants()">Messicano</li>
                        </ul>
                     </div>
                  </div>
                  <br>
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <template v-for="type in filteredRestaurants">
                    <div style="margin: 30px 0;" v-for="el in filteredRestaurants[0].ristoranti" class="col">
                       <div class="card-header text-center" style="background-color:#444;">
                        <h5 style="color: #ffb03b; margin-bottom: 0em;">Appets!</h5>
                       </div>
                      <div class="card h-100" style="border-color:#444; border-radius: 0;">
                          <a style="margin-top: 10px;" class="card-title text-center" href="#"><span>@{{el.rist_nome}}</span></a>
                        <div class="card-body">
                          <div class="card-text"><strong>Tipologia: </strong>@{{type.nome}}</div>
                          <div class="card-text"><strong>Descrizione: </strong> @{{el.rist_descrizione}}</div >
                          <div class="card-text"><strong>Indirizzo: </strong> @{{el.rist_indirizzo}}</div >
                        </div>
                     </template>
                      </div>
                    </div>
                  </div>
            </section>
            <!-- End restaurants Section -->
            <!-- ======= Events Section ======= -->
            <section id="events" class="events">
               <div class="container">
                  <div class="section-title">
                     <h2 v-observe-visibility="{ callback: (isVisible, entry) => animation_visibility(isVisible, entry, 'events') }" :class="{ 'visible animate__animated animate__fadeInLeft': animateSection.events, 'invisible': !animateSection.events }">Organizza il Tuo <span>Evento</span> con Appets</h2>
                  </div>
                  <div class="row event-item">
                     <div class="col-lg-6">
                        <img src="{{asset('img/buffet.jpg')}}" class="img-fluid" alt="Immagine buffet">
                     </div>
                     <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Pacchetto Festa</h3>
                        <div class="price">
                           <p><span>A partire da 80 euro</span></p>
                        </div>
                        <p class="font-italic">
                           Vuoi organizzare un evento? Una festa di compleanno? Un buffet per festeggiare qualche ricorrenza?
                        </p>
                        <p>
                           Con Appets Catering ti mettiamo a disposizione un team di organizzatori che si occuperà per te di tutto. Il nostro staff ti porterà tutto il necessario, dall'aperitivo al dessert, e vi servirà comodamente nella vostra location proprio come se fossi al ristorante!
                        </p>
                        <p>
                           Con noi la tua festa renderà invidiosi i tuoi ospiti! Chiamaci per informazioni al numero 800505050!
                        </p>
                     </div>
                  </div>
               </div>
            </section>
            <!-- End Events Section -->
            <!-- ======= Jobs Section ======= -->
            <section id="jobs" class="jobs">
               <div class="container">
                  <div class="section-title">
                     <h2 v-observe-visibility="{ callback: (isVisible, entry) => animation_visibility(isVisible, entry, 'jobs') }" :class="{ 'visible animate__animated animate__fadeInUp': animateSection.jobs, 'invisible': !animateSection.jobs }" >Lavora con <span>Appets</span></h2>
                  </div>
                  <p class="text-center">Appets è un'azienda che offre moltissime opportunità lavorative. Facci un pensiero!</p>
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                        <div class="member">
                           <div class="pic"><img src="img/jobs/jobs-1.jpg" class="img-fluid" alt="rider"></div>
                           <div class="member-info">
                              <h4>Rider</h4>
                              <span>Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</span>
                              <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="member">
                           <div class="pic"><img src="img/jobs/jobs-2.jpg" class="img-fluid" alt=""></div>
                           <div class="member-info">
                              <h4>Ristoranti</h4>
                              <span>Diventa partner di Appets e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</span>
                              <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="member">
                           <div class="pic"><img src="img/jobs/jobs-3.jpg" class="img-fluid" alt=""></div>
                           <div class="member-info">
                              <h4>Personale in sede</h4>
                              <span>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</span>
                              <div class="social">
                                 <a href=""><i class="bi bi-twitter"></i></a>
                                 <a href=""><i class="bi bi-facebook"></i></a>
                                 <a href=""><i class="bi bi-instagram"></i></a>
                                 <a href=""><i class="bi bi-linkedin"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- End Jobs Section -->
            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
               <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="section-title">
                     <h2><span>Dicono di Noi</span></h2>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                      <img class="testimonial-image" src="img/testimonials/slide-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item text-center">
                      <img class="testimonial-image" src="img/testimonials/slide-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item text-center">
                      <img class="testimonial-image" src="img/testimonials/slide-3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item text-center">
                     <img class="testimonial-image" src="img/testimonials/slide-4.jpg" class="d-block w-100" alt="...">
                   </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </section>
            <!-- End testimonials Section -->
         </main>
         <!-- End #main -->
@endsection
