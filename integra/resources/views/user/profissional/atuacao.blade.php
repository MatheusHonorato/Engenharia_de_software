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
                <div class="panel-heading">Atuações</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <button href="#myModalsave" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nova</button></span></button></a>
                            <tr>
                              <th>Nome</th>
                              <th></th>
                              <th>Editar</th>
                              <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($useratuacoes as $useratuacao)
                                @foreach ($atuacoes as $atuacao)

                                    @if($useratuacao->id_atuacao == $atuacao->id)

                                    <tr>
                                        <td>{{ $atuacao->name }}</td>
                                        
                                        <th scope="row">
                                <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $useratuacao->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Editar Atuação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.home.atuacao.update') }}" method="POST" id="{{ $useratuacao->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="id" value="{{ $useratuacao->id }}">
                                                        <label>Atuação:</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $atuacao->name }}" placeholder="Nome Área" disabled>
                                                        <label>Descrição:</label>
                                                        <textarea class="form-control" name="desc">{{ $useratuacao->desc }}
                                                        </textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                                                    <button type="button" class="btn btn-primary" onclick="update({{ $useratuacao->id }});">Salvar</button>
                                                </div>
                                                    </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </th>
                                <td>
                                    <button href="#myModal{{ $useratuacao->id }}" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                </td>

                                        <td>
                                            <form action="{{ route('home.cadastro.atuacao.excluir') }}" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $useratuacao->id }}">
                                                <button onclick="return confirm('Deseja realmente executar esta ação?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                            </form>
                                        </td>

                                    </tr>

                                    @endif

                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    {{ $useratuacoes->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalsave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title">Escolha uma Atuação</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.cadastro.user.atuacao.store') }}" method="POST" id="save">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                        <select class="form-control" name="id">
                        @foreach($atuacoes as $atuacao)
                            <option value="{{ $atuacao->id }}">{{ $atuacao->name }}</option>
                        @endforeach
                        </select> 
                Após escolher a atuação atualize sua respectiva descrição em editar
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" onclick="update('save');">Salvar</button>
                </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

@endsection
