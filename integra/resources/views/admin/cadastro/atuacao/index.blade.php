@extends('admin.layouts.partials.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Atuações</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button>
                            <tr>
                              <th>Nome</th>
                              <th>Editar</th>
                              <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atuacoes as $atuacao)
                            <tr>
                                <td>{{ $atuacao->name }}</td>
                                <th>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $atuacao->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar Atuação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.cadastro.atuacoes.update') }}" method="POST" id="{{ $atuacao->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $atuacao->id }}">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name" value="{{ $atuacao->name }}" placeholder="Nome da Atuação">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea  class="form-control" name="descricao" placeholder="Descrição da Atuacao" required="required">{{ $atuacao->descricao }}</textarea>
                                                        </div>
                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $atuacao->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <button href="#myModal{{ $atuacao->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </th>
                                    
                                <td>
                                    <form action="{{ route('admin.home.cadastro.atuacoes.excluir') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $atuacao->id }}">
                                        <button type="submit" onclick="return confirm('Deseja realmente executar esta ação?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $atuacoes->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Nova Atuação</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.home.cadastro.atuacoes.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">           
                        <div class="form-group">
                            <input  class="form-control" name="name" placeholder="Nome da Atuacao" type="text" required="required">
                        </div>                 
                        <div class="form-group">
                            <textarea  class="form-control" name="desc" placeholder="Descrição da Atuacao" required="required"></textarea>
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
