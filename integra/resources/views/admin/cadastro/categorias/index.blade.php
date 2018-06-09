@extends('admin.layouts.partials.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>
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
                            @foreach ($tipos as $tipo)
                            <tr>
                                <td>{{ $tipo->name }}</td>
                                <th>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $tipo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar Categoria</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.cadastro.categorias.update') }}" method="POST" id="{{ $tipo->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $tipo->id }}">
                                                        <input type="text" class="form-control" name="name" value="{{ $tipo->name }}" placeholder="Nome Categoria">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $tipo->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <button href="#myModal{{ $tipo->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </th>
                                    
                                <td>
                                    <form action="{{ route('admin.home.cadastro.categorias.excluir') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $tipo->id }}">
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tipos->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Nova Categoria</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.home.cadastro.categorias.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                        <input  class="form-control" name="name" placeholder="Nome Categoria" type="text" required="required">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" onclick="update('save');">Salvar</button>
                </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
@endsection
