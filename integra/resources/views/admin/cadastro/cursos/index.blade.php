@extends('admin.layouts.partials.app')
@section('content')
    <div class="row">
        <div class="col-md-8  col-md-offset-2 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <a href="{{ route('admin.home.cadastro.categorias.index') }}" class="pull-right"><button type="submit" class="btn btn-primary ">Categorias</button></a>
                                
                            <button href="#myModalsave" style="margin-right: 15px; !important" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button>
                            <tr>
                              <th>Nome</th>
                              <th>Editar</th>
                              <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->name }}</td>
                                <th>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $curso->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.cadastro.cursos.update') }}" method="POST" id="{{ $curso->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $curso->id }}">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name" value="{{ $curso->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="area" class="form-control">
                                                            @foreach($areas as $area)
                                                                @if($area->id == $curso->id_area)
                                                                    <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
                                                                @endif
                                                                @if($area->id != $curso->id_area)
                                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="tipo" class="form-control">
                                                            @foreach($tipos as $tipo)
                                                                @if($tipo->id == $curso->id_tipo)
                                                                    <option value="{{ $tipo->id }}" selected>{{ $tipo->name }}</option>
                                                                @endif
                                                                @if($tipo->id != $curso->id_tipo)
                                                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                                                @endif
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $curso->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <button href="#myModal{{ $curso->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </th>

                                <td>
                                    <form action="{{ route('admin.home.cadastro.cursos.excluir') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $curso->id }}">
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cursos->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Novo</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.home.cadastro.cursos.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nome" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <select name="area" class="form-control">
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tipo" class="form-control">
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                            @endforeach
                            </select>
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
