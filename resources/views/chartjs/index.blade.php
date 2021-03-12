@extends('templates.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
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
            backgroundColor: "lightblue",
            data: $prev_year,
        },
        {
            label: 'Ordini ricevuti 2021',
            backgroundColor: "blue",
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
@endsection