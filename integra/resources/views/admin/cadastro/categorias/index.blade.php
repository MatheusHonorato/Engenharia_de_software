@extends('admin.layouts.partials.head')
@extends('admin.layouts.partials.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th>Editar</th>
                              <th>Remover</th>
                              <th><a href="{{ route('admin.home.cadastro.categorias.criar') }}"><button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipos as $tipo)
                            <tr>
                                <th>
                                    <form action="{{ route('admin.home.cadastro.categorias.update') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{ $tipo->id }}">
                                        <input type="text" class="form-control" name="name" value="{{ $tipo->name }}">
                                </th>
                                    
                                <th>
                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                                    </form>
                                </th>
                                <td>
                                    <form action="{{ route('admin.home.cadastro.categorias.excluir') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $tipo->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
</div>
@endsection

@extends('admin.layouts.partials.footer')
