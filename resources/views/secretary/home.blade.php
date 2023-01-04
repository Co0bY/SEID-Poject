@extends('layouts.app')



@section('content')
<div class=" d-flex">
    <div class=" row">
        <div class=" col ">
            @component('secretary._components.sidebar')
            @endcomponent
        </div>
        <input type="hidden" name="faltas" id="faltas" value="{{$presencas->faltas}}">
        <input type="hidden" name="presentes" id="presentes" value="{{$presencas->presentes}}">
        <input type="hidden" name="total" id="total" value="{{$presencas->total}}">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row ml-3">
                        <h5 class="card-title">SEJA BEM VINDO {{session()->get('name')}}</h5>
                    </div>
                    <div class="row ml-3">
                        <p class="card-text"> Seja Bem vindo ao programa SEID, aqui está uma relação das presenças dos alunos nos ultimos 7 dias</p>
                    </div>
                    <div class="row ml-1 mt-3">
                        <div id="barchart_material" style="width: 100%; height: 20%x;"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



    <script type="text/javascript">
        var Faltas = document.getElementById("faltas").value;
        var Presentes = document.getElementById("presentes").value;
        var Total = document.getElementById("total").value;
        console.log(Faltas);
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Total','Faltas', 'Presentes'],
            [Total, Faltas, Presentes],
          ]);

          var options = {
            chart: {
              title: 'Presenças',
            },
            bars: 'horizontal' // Required for Material Bar Charts.
          };

          var chart = new google.charts.Bar(document.getElementById('barchart_material'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>
@endsection
