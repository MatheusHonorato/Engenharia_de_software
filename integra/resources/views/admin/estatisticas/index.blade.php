@extends('admin.layouts.partials.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio - Estatísticas</div>

                <div class="panel-body">
                    <h4>Ranking Alunos Habilidades, Ranking avaliação empresas, Estatísticas Matchs(quantidade de matchs por mes)</h4>
                    <div style="max-width: 500px;" class="col-md-5 left">
                        <canvas id="skills"></canvas>
                    </div>

                    <div style="max-width: 500px;" class="col-md-5 col-md-offset-2 right">
                        <canvas id="areas"></canvas>
                    </div>
                </div>
        
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

                <script type="text/javascript">
                    new Chart(document.getElementById("skills"), {
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

                <script type="text/javascript">
                    new Chart(document.getElementById("areas"), {
                        type: 'pie',
                        data: {
                          labels: ["Ciencia da computação", "Engenharia", "Letras", "Licenciatura", "Comunicação"],
                          datasets: [{
                            label: "Skills",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                            data: [2478,5267,734,784,433]
                          }]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Áreas alunos universidade'
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