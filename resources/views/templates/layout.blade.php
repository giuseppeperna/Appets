<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Appets</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons -->
      <link href="{{asset('img/favicon.png')}}" rel="icon">
      <!-- Ricordarsi di cambiare le favicon -->
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
      <!-- Libraries/Frameworks CSS Files -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
      <!-- Main CSS File -->
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
      <!-- Libreria animazioni -->
      <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <!-- Vue.js -->
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
      <script src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>
   </head>
   <body>
      <div id="root">
         <!-- ======= Header ======= -->
         <header id="header" class="fixed-top d-flex align-items-center header-transparent">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
               <div class="logo me-auto">
                  <h1><a href="{{route('home')}}">Appets</a></h1>
               </div>
               <nav id="navbar" class="navbar order-last order-lg-0">
                  <ul>
                     <li><a class="nav-link scrollto" href="#about">Chi siamo</a></li>
                     <li><a class="nav-link scrollto" href="#restaurants">Ristoranti</a></li>
                     <li><a class="nav-link scrollto" href="#events">Pacchetto Festa</a></li>
                     <li><a class="nav-link scrollto" href="#jobs">Lavora con Appets</a></li>
                     <li><a class="nav-link" href="{{route('dashboard')}}">Area ristoranti</a></li>
                  </ul>
                  <i class="bi bi-list mobile-nav-toggle"></i>
               </nav>
               <!-- .navbar -->
            </div>
         </header>
           <!-- End Header -->
        {{--  <!-- ======= Hero Section ======= -->
         <section id="hero">
            <div class="hero-container">
               <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg); background-size: cover;">
                        <div class="carousel-container">
                           <div class="carousel-content">
                              <h2 class="animate__animated animate__fadeInDown">Appets</h2>
                              <h2 class="animate__animated animate__fadeInDown"><span>I piatti</span> della tua città</h2>
                              <p class="animate__animated animate__fadeInUp">Solo a Milano, vicino a te.</p>
                              <form action="">
                                 <div class="input-group input-group-sm mb-3 px-2">
                                    <input type="text" class="form-control bg-dark border-light text-white" placeholder="Che tipo di cucina cerchi?" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-append">
                                       <button class="btn btn-light" id="basic-addon2">Cerca ristorante</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End Hero --> --}}
         @yield('content')
          <!-- ======= Footer ======= -->
          <footer id="footer">
            <div class="container">
               <h3>Appets</h3>
               <p>Solo a Milano, vicino a te</p>
               <div class="social-links">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
               </div>
               <div class="copyright">
                  &copy; Copyright <strong><span>Appets</span></strong>. All Rights Reserved
               </div>
               <div class="credits">
                  Designed Boolean Team 2
               </div>
            </div>
         </footer>
         <!-- End Footer -->
         <!-- Libreries/Frameworks JS Files -->
         <script  type="application/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      </div>
      <script type="application/javascript" src="{{ asset('/js/main.js') }}" charset="utf-8"></script>
   </body>
</html>