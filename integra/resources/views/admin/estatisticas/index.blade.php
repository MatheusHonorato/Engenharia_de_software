@extends('admin.layouts.partials.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default col-md-2">
              <div class="panel-body">
                {{ $userAmount }}<br>
                alunos
                icone
              </div>
            </div>

            <div class="panel panel-default col-md-2 col-md-offset-1">
              <div class="panel-body">
                {{ $empAmount }}<br>
                empresas
                icone
              </div>
            </div>

            <div class="panel panel-default col-md-2 col-md-offset-1">
              <div class="panel-body">
                {{ $matchAmount }}<br>
                matchs
                icone
              </div>
            </div>

            <div class="panel panel-default col-md-3 col-md-offset-1">
              <div class="panel-body">
                Rankings
                <br>
                icone
              </div>
            </div>

            <!--panel-->
            <div class="panel panel-default col-md-5">
                <div class="panel-heading">Habilidades alunos universidade</div>
                <div class="panel-body">
                    <!--<h4>Ranking Alunos Habilidades, Ranking avaliação empresas, Estatísticas Matchs(quantidade de matchs por mes)</h4>-->
                    card atd alunos, empresas matchs
                    <div>
                        <canvas id="skills"></canvas>
                    </div>
                </div>
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
                </div>
            <!-- panel -->

            <!-- panel -->
            <div class="panel panel-default col-md-5 col-md-offset-2">
                <div class="panel-heading">Áreas alunos universidade</div>
                <div class="panel-body">
                    <!--<h4>Ranking Alunos Habilidades, Ranking avaliação empresas, Estatísticas Matchs(quantidade de matchs por mes)</h4>-->
                    <div>
                        <canvas id="areas"></canvas>
                    </div>
                </div>
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
            <!--panel-->
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

