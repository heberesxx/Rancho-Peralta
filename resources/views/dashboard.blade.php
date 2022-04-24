@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Bienvenido al Sistema</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop
@if (session('info'))
<div class="alert alert-success alert-dismissible mt-2 text-dark" role="alert">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    <strong>{{session('info')}}</strong>
</div>
@endif

@section('content')

@include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-md-6 col-lg-6 mt-2">
            <canvas id="chart_ganado" height="200"></canvas>


        </div>
        <div class="col-12 col-md-6 col-lg-6 mt-2">
            <canvas id="chart_ganado2" height="200"></canvas>


        </div>

    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    var machos = <?php echo $machos; ?>;
    var hembras = <?php echo $hembras; ?>;
    var vacas_paridas = <?php echo $vacas_paridas; ?>;
    var vacas_prenadas = <?php echo $vacas_prenadas; ?>;
    var vacas_sincronizadas = <?php echo $vacas_sincronizadas; ?>;
    var vacas_recienparidas = <?php echo $vacas_recienparidas; ?>;

    console.log(machos.lenght);
    const ctx = document.getElementById('chart_ganado').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Hembras', 'Machos'],
            datasets: [{
                label: '# of Votes',
                data: [hembras, machos],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Ganado por género",
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2 = document.getElementById('chart_ganado2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Paridas', 'Preñadas', 'Sincronizadas', 'Recien Paridas'],
            datasets: [{
                label: '# of Votes',
                data: [vacas_paridas, vacas_prenadas, vacas_sincronizadas, vacas_recienparidas],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Vacas según su estado",
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx3 = document.getElementById('chart_ganado3').getContext('2d');
    const myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Hembras', 'Machos'],
            datasets: [{
                label: '# of Votes',
                data: [hembras, machos],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                borderWidth: 1
            }],

        },
        options: {
            title: {
                display: true,
                text: "Ganado por género",
            },
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
</script>





@stop