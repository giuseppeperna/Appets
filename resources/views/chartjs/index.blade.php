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
      <script src="https://unpkg.com/vue-observe-visibility/dist/vue-observe-visibility.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   </head>
   <body>
      <div id="root">
        @include('../templates._header')

        <div class="container statistiche">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>
                        <div>
                            <h1>Totale ordini {{$this_year-1}}: {{$prevYearSum}}</h1>
                            <h1>Incasso ordini {{$this_year-1}}: {{$prevYearTotalOrder}} Euro</h1>
                        </div>
                        <div>
                            <h1>Totale ordini {{$this_year}}: {{$currentYearSum}}</h1>
                            <h1>Incasso ordini {{$this_year}}: {{$currentYearTotalOrder}} Euro</h1>
                        </div>
                        <a class="btn register-btn" href="{{ route('ordini') }}">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
        @include('../templates._footer')

         <!-- Libreries/Frameworks JS Files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        {{-- Script statistiche --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            var year = <?php echo $year; ?>;
            var $prev_year = <?php echo $prev_year; ?>;
            var current_year = <?php echo $current_year; ?>;

            var month = <?php echo $month; ?>;
            var barChartData = {
                labels: month,
                datasets: [{
                    label: 'Ordini ricevuti 2020',
                    backgroundColor: "#44813e",
                    data: $prev_year,
                },
                {
                    label: 'Ordini ricevuti 2021',
                    backgroundColor: "#92c24c",
                    data: current_year,
                }]
            };

            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderColor: '#c1c1c1',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Statistiche ordini mese/anno',
                            fontSize: 30
                        }
                    }
                });
            };
        </script>
      </div>
   </body>
</html>