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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <form action="{{ route('admin.home.cadastro.categorias.store') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <td>
                                            <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Nome" required="" autofocus="">
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