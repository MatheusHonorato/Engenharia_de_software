@extends('admin.layouts.partials.app')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">Habilidades</div>

                <div class="panel-body">

                    <table class="table table-hover">

                        <thead>

                            <button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></span></button></a>

                            <tr>

                              <th>Nome</th>

                              <th>Editar</th>

                              <th>Remover</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($habilidades as $habilidade)

                            <tr>

                                <td>{{ $habilidade->name }}</td>

                                <th>

                                <!-- Modal -->

                                    <div class="modal fade" id="myModal{{ $habilidade->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                                                    <h4 class="modal-title">Editar Habilidade</h4>

                                                </div>

                                                <div class="modal-body">

                                                    <form action="{{ route('admin.home.cadastro.habilidades.update') }}" method="POST" id="{{ $habilidade->id }}">

                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <input type="hidden" name="id" value="{{ $habilidade->id }}">

                                                        <input type="text" placeholder="Nome Habilidade" class="form-control" name="name" value="{{ $habilidade->name }}">

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>

                                                    <button type="button" class="btn btn-primary" onclick="update({{ $habilidade->id }});">Salvar</button>

                                                </div>

                                                    </form>

                                            </div><!-- /.modal-content -->

                                        </div><!-- /.modal-dialog -->

                                    </div><!-- /.modal -->

                                    <button href="#myModal{{ $habilidade->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>

                                </th>

                                    

                                <td>

                                    <form action="{{ route('admin.home.cadastro.habilidades.excluir') }}" method="POST">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="hidden" name="id" value="{{ $habilidade->id }}">

                                        <button type="submit" onclick="return confirm('Deseja realmente executar esta ação?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>

                                    </form>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                    {{ $habilidades->links() }}

                </div>

            </div>

        </div>

    </div>

</div>



<div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

                    <h4 class="modal-title">Nova Habilidade</h4>

                </div>

                <div class="modal-body">

                    <form action="{{ route('admin.home.cadastro.habilidades.store') }}" method="POST" id="save">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                        <label>Nome da Habilidade</label>
                        <input  class="form-control" placeholder="Nome da Habilidade" name="name" type="text" required="required">

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>

                    <button type="button" class="btn btn-primary" onclick="update('save');">Salvar</button>

                </div>

                    </form>

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

@endsection

