@extends('emp.layouts.partials.app')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2 col-xs-12">

                <div class="panel panel-default">

                <div class="panel-heading">Oportunidades

                </div>

                <div class="panel-body">

                    <table class="table table-hover">

                        <thead>

                            <button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nova</button>

                            <tr>

                                <th>Nome</th>

                                <th>Mais(matches)</th>

                                

                                <th></th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse ($oportunidades as $oportunidade)

                            <tr>

                                <td>{{ $oportunidade->title }}</td>

                                

                                <td>

                                    <form action="{{ route('emp.home.match.index') }}" method="POST">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="hidden" name="id" value="{{ $oportunidade->id }}">

                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                                    </form>

                                </td>

                                <td></td>

                            </tr>

                            @empty



                            @endforelse

                        </tbody>

                    </table>

                    {{ $oportunidades->links() }}

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                    <h4 class="modal-title">Nova Oportunidade</h4>

                </div>

                <div class="modal-body">

                    <form action="{{ route('emp.home.oportunidades.store') }}" method="POST" id="save">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            

                        <div class="form-group">

                            <input  class="form-control" name="title" placeholder="Titulo Oportunidade" type="text" required>

                        </div>



                        <div class="form-group">

                            <!--<select name="curso" class="form-control" required>-->

                            <div class="dropdown">

                                <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Cursos<span class="caret" id="cursos"></span>

                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                    @forelse($cursos as $curso)

                                        @if($curso->status == 1)

                                            <li><input type="checkbox" name="{{ $curso->id }}" value="1">{{ $curso->name }}</li>

                                        @endif

                                    @empty



                                    @endforelse

                                    <!--</select>-->

                                </ul>

                            </div>

                        </div>



                        <label></label>



                        <div class="form-group">

                            <!--<select name="curso" class="form-control" required>-->

                            <div class="dropdown">

                                <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Habilidades<span class="caret" id="habilidades"></span>

                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                    @forelse($habilidades as $habilidade)

                                        @if($habilidade->status == 1)

                                            <li><input type="checkbox" name="{{ $habilidade->id }}" value="1">{{ $habilidade->name }}</li>

                                        @endif

                                    @empty



                                    @endforelse

                                    <!--</select>-->

                                </ul>

                            </div>

                        </div>



                        <label></label>



                        <div class="form-group">

                            <!--<select name="curso" class="form-control" required>-->

                            <div class="dropdown">

                                <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Atuação<span class="caret" id="atuacoes"></span>

                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">

                                    @forelse($atuacoes as $atuacao)

                                        @if($atuacao->status == 1)

                                            <li><input type="checkbox" name="{{ $atuacao->id }}" value="1">{{ $atuacao->name }}</li>

                                        @endif

                                    @empty



                                    @endforelse

                                    <!--</select>-->

                                </ul>

                            </div>

                        </div>



                        <label></label>



                        <div class="form-group">

                            <!--<select name="curso" class="form-control" required>-->

                            <div class="dropdown">

                                <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Conhecimentos<span class="caret" id="conhecimentos"></span>

                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">

                                    @forelse($conhecimentos as $conhecimento)

                                        @if($conhecimento->status == 1)

                                            <li><input type="checkbox" name="{{ $conhecimento->id }}" value="1">{{ $conhecimento->name }}</li>

                                        @endif

                                    @empty



                                    @endforelse

                                    <!--</select>-->

                                </ul>

                            </div>

                        </div>



                        <label></label>



                        <div class="form-group">

                            <!--<select name="curso" class="form-control" required>-->

                            <div class="dropdown">

                                <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Periodo<span class="caret" id="periodos"></span>

                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu5">

                                    <li><input type="checkbox" name="matutino" value="1">Matutino</li>

                                    <li><input type="checkbox" name="vespertino" value="1">Vespertino</li>

                                    <li><input type="checkbox" name="noturno" value="1">Noturno</li>

                                    <!--</select>-->

                                </ul>

                            </div>

                        </div>



                        <label></label>



                        <div class="form-group">

                          <label for="comment">Descrição:</label>

                          <textarea class="form-control" rows="5" name="desc" id="comment" placeholder="Escreva um pouco mais sobre a oportunidade"></textarea>

                        </div>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>

                    <button type="button" class="btn btn-primary" onclick="update('save');">Salvar</button>

                </div>

                    </form>

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

@endsection







