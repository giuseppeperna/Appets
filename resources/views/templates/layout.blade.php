<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Appets</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons -->
      <link href="{{asset('img/favicon-appets.png')}}" rel="icon">
      <!-- Ricordarsi di cambiare le favicon -->
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Lobster&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
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
      <script type="application/javascript" src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>
      <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script type="application/javascript" src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>

   </head>
   <body>
      <div id="root">
         @include('templates._header')

         @yield('content')

         @include('templates._footer')

         <!-- Libreries/Frameworks JS Files -->
      </div>
      <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script type="application/javascript" src="{{ asset('/js/main.js') }}" charset="utf-8"></script>
      <!-- Script per la gestione nel pagamento -->
   </body>
</html>
