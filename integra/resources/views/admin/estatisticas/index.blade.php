@extends('admin.layouts.partials.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">



            <div class="panel panel-default col-md-2">

              <div class="panel-body">

                {{ $userAmount }}<br>

                alunos

              </div>

            </div>



            <div class="panel panel-default col-md-2 col-md-offset-1">

              <div class="panel-body">

                {{ $empAmount }}<br>

                empresas

              </div>

            </div>



            <div class="panel panel-default col-md-2 col-md-offset-1">

              <div class="panel-body">

                {{ $matchAmount }}<br>

                matchs

              </div>

            </div>



            <a href="#">

                <div class="panel panel-default col-md-3 col-md-offset-1">

                  <div class="panel-body">

                    Rankings

                    <br>

                  </div>

                </div>

            </a>



            <!--panel-->

            <div class="panel panel-default col-md-5">

                <div class="panel-heading">Habilidades alunos universidade</div>

                <div class="panel-body">

                    <!--<h4>Ranking Alunos Habilidades, Ranking avaliação empresas, Estatísticas Matchs(quantidade de matchs por mes)</h4>-->

                    <!--card atd alunos, empresas matchs-->

                    <div>

                        <canvas id="skills"></canvas>

                    </div>

                </div>

                   <script>

                var ctx = document.getElementById("skills").getContext('2d');

                var myChart = new Chart(ctx, {

                    type: 'bar',

                    data: {



                        labels: [



                        @foreach($habilidades as $habilidade)



                        "{{ $habilidade->name }}",



                        @endforeach



                        ],

                        datasets: [{

                            label: '',

                            data: [



                            @foreach($habilidades as $habilidade)



                            "{{ $habilidade->amount }}",



                            @endforeach



                            ],

                            backgroundColor: [



                            @for($i = 0; $i < $countHabilidades; $i++)

                                'rgba(54, 162, 235, 0.2)',

                            @endfor

                            ],

                            borderColor: [



                            @for($i = 0; $i < $countHabilidades; $i++)

                                'rgba(54, 162, 235, 1)',

                            @endfor



                            ],

                            borderWidth: 1

                        }]

                    },

                    options: {

                      legend: {

                          display: false

                      },

                        scales: {

                            yAxes: [{

                                ticks: {

                                    beginAtZero:true

                                }

                            }]

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

               <script>

                var ctx = document.getElementById("areas").getContext('2d');

                var myChart = new Chart(ctx, {

                    type: 'bar',

                    data: {



                        labels: [



                        @foreach($areas as $area)



                        "{{ $area->name }}",



                        @endforeach



                        ],

                        datasets: [{

                            label: '',

                            data: [



                            @foreach($areas as $area)



                            "{{ $area->amount }}",



                            @endforeach



                            ],

                            backgroundColor: [



                            @for($i = 0; $i < $countAreas; $i++)

                                'rgba(54, 162, 235, 0.2)',

                            @endfor

                            ],

                            borderColor: [



                            @for($i = 0; $i < $countAreas; $i++)

                                'rgba(54, 162, 235, 1)',

                            @endfor



                            ],

                            borderWidth: 1

                        }]

                    },

                    options: {

                      legend: {

                          display: false

                      },

                        scales: {

                            yAxes: [{

                                ticks: {

                                    beginAtZero:true

                                }

                            }]

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



