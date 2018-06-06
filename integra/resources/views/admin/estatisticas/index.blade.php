@extends('admin.layouts.partials.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio - Estatísticas</div>

                <div class="panel-body">
                    <div style="max-width: 300px;">
                    <canvas id="myChart"></canvas>
                </div>
        
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

                <script type="text/javascript">
                    new Chart(document.getElementById("myChart"), {
                        type: 'pie',
                        data: {
                          labels: ["mysql", "java", "jquery", "html", "comunicação"],
                          datasets: [{
                            label: "Skills",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: [2478,5267,734,784,433]
                          }]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Habilidades alunos universidade'
                          }
                        }
                    });
                </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection