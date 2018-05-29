@extends('admin.layouts.partials.head')
@extends('admin.layouts.partials.header')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Habilidades</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th style="text-align: right;">Remover</th>
                              <th><a href="{{ route('admin.home.cadastro.habilidades.criar') }}"><button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($habilidades as $habilidade)
                            <tr>
                                <th scope="row">{{ $habilidade->name }}</th>
                                <td>
                                    <form action="{{ route('admin.home.cadastro.habilidades.excluir') }}" method="POST">
                                        <input type="hidden" name="id" value="{{ $habilidade->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $habilidades->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.partials.footer')
