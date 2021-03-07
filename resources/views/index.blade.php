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
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="member">
                           <div class="pic"><img src="img/jobs/jobs-2.jpg" class="img-fluid" alt=""></div>
                           <div class="member-info">
                              <h4>Ristoranti</h4>
                              <span>Diventa partner di Appets e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="member">
                           <div class="pic"><img src="img/jobs/jobs-3.jpg" class="img-fluid" alt=""></div>
                           <div class="member-info">
                              <h4>Personale in sede</h4>
                              <span>La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- End Jobs Section -->
         </main>
         <!-- End #main -->
@endsection
