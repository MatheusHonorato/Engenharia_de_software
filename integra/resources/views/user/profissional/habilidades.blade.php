@extends('layouts.partials-user.app')

@section('content')
<style type="text/css">
    @media only screen and (min-width: 700px) {
        #idiomas {
            margin-left: 82%;
        }
    }

    @media only screen and (max-width: 600px) {
        #idiomas {
            margin-left: 80%;
        }
    }

    .required {
        color: red;
    }
</style>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Habilidades</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Novo</button></span></button></a>
                            <tr>
                              <th>Nome</th>
                              <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userhabilidades as $userhabilidade)
                                @foreach ($habilidades as $habilidade)

                                    @if($userhabilidade->id_habilidade == $habilidade->id)

                                    <tr>
                                        <td>{{ $habilidade->name }}</td>
                                        <td>
                                            <form action="{{ route('admin.home.cadastro.habilidades.excluir') }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $habilidade->id }}">
                                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endif

                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    {{ $userhabilidades->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Escolha uma Habilidade</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.cadastro.user.habilidades.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                        <select class="form-control" name="id">
                        @foreach($habilidades as $habilidade)
                            <option value="{{ $habilidade->id }}">{{ $habilidade->name }}</option>
                        @endforeach
                        </select> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" onclick="update('save');">Salvar</button>
                </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

@endsection
