@extends('admin.layouts.partials.head')
@extends('admin.layouts.partials.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th>Área</th>
                              <th>Categoria</th>
                              <th>Editar</th>
                              <th>Remover</th>
                              <th><a href="{{ route('admin.home.cadastro.categorias.index') }}"><button type="submit" class="btn btn-primary pull-right">Categorias</button></a></th>
                              <th><button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->name }}</td>
                                @foreach ($areas as $area)
                                    @if($area->id == $curso->id_area)
                                        <td scope="row">{{ $area->name }}</td>
                                    @endif
                                @endforeach

                                @foreach ($tipos as $tipo)
                                    @if($tipo->id == $curso->id_tipo)
                                        <td scope="row">{{ $tipo->name }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <form action="{{ route('admin.home.cadastro.cursos.edit') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $curso->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.home.cadastro.cursos.excluir') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $curso->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
</div>
@endsection

<script type="text/javascript">
    function update($id)

    {

        document.getElementById($id).submit();

    }
</script>

@extends('admin.layouts.partials.footer')
