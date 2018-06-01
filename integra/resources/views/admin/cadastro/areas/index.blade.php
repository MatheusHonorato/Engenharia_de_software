@extends('admin.layouts.partials.head')
@extends('admin.layouts.partials.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Áreas</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th></th>
                              <th></th>
                              <th>Editar</th>
                              <th>Remover</th>
                              <th><a href="{{ route('admin.home.cadastro.areas.criar') }}"><button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)

                            <tr>
                                <td>{{ $area->name }}</td>

                                <th scope="row">
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $area->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.cadastro.areas.update') }}" method="POST" id="{{ $area->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $area->id }}">
                                                        <input type="text" class="form-control" name="name" value="{{ $area->name }}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $area->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </th>
                                <td></td>
                                <td>
                                    <button href="#myModal{{ $area->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </td>
                                <td>
                                    <form action="{{ route('admin.home.cadastro.areas.excluir') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $area->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $areas->links() }}
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

<script type="text/javascript">

                                function update($id)

                                {

                                document.getElementById($id).submit();

                                }

                            </script>

@extends('admin.layouts.partials.footer')
