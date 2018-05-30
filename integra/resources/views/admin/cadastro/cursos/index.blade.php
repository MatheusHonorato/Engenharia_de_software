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
                              <th><a href="{{ route('admin.home.cadastro.cursos.criar') }}"><button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                            <tr>
                                <th scope="row">{{ $curso->name }}</th>
                                <th scope="row">{{ $curso->area }}</th>
                                <th scope="row">{{ $curso->tipo }}</th>

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
</div>
@endsection

@extends('admin.layouts.partials.footer')
