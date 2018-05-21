@extends('admin.layouts.partials.head')
@extends('admin.layouts.partials.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias - Cursos</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Matricula</th>
                              <th>Nome</th>
                              <th>Aceitar</th>
                              <th>Recusar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->matricula }}</th>
                                <td>{{ $user->name }}</td>        
                                <td>
                                <form action="{{route('admin.notificacoes.home.aluno.acept')}}" method="POST">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                </form>
                                </td>

                                <td>
                                <form action="{{route('admin.notificacoes.home.aluno.delete')}}" method="POST">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.partials.footer')
