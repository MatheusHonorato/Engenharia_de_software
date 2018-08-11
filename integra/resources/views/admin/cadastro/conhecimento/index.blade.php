@extends('admin.layouts.partials.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Conhecimentos</div>
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
                            @foreach ($conhecimentos as $conhecimento)
                            <tr>
                                <td>{{ $conhecimento->name }}</td>
                                <th>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $conhecimento->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar Conhecimento</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.cadastro.conhecimentos.update') }}" method="POST" id="{{ $conhecimento->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $conhecimento->id }}">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name" value="{{ $conhecimento->name }}" placeholder="Nome do Conhecimento">
                                                        </div>
                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $conhecimento->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <button href="#myModal{{ $conhecimento->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </th>
                                    
                                <td>
                                    <form action="{{ route('admin.home.cadastro.conhecimentos.excluir') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $conhecimento->id }}">
                                        <button type="submit" onclick="return confirm('Deseja realmente executar esta ação?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $conhecimentos->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Novo Conhecimento</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.home.cadastro.conhecimentos.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">           
                        <div class="form-group">
                            <input  class="form-control" name="name" placeholder="Nome do Conhecimento" type="text" required="required">
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
