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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form action="{{ route('admin.home.cadastro.cursos.store') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <td>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nome" required="" autofocus="">
                                        </td>

                                        <td>
                                            <select name="area" class="form-control">
                                                @foreach($areas as $area)
                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select name="tipo" class="form-control">
                                                @foreach($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <button type="submit" class="btn btn-success pull-right"><span aria-hidden="true">Adicionar</span></button>
                                        </td>

                                    </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.partials.footer')
