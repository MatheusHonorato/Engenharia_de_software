@extends('admin.layouts.partials.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notificações - Empresas</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th>Email</th>
                              <th>Aceitar</th>
                              <th>Recusar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emps as $emp)
                            <tr>
                                <th scope="row">{{ $emp->name }}</th>
                                <td>{{ $emp->email }}</td>        
                                <td>
                                <form action="{{route('admin.notificacoes.home.emp.acept')}}" method="POST">
                                    <input type="hidden" name="id" value="{{ $emp->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                </form>
                                </td>

                                <td>
                                <form action="{{route('admin.notificacoes.home.emp.delete')}}" method="POST">
                                    <input type="hidden" name="id" value="{{ $emp->id }}">
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
@endsection

