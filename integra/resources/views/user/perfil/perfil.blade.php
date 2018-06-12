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
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('user.home.perfil.submit') }}" onsubmit="VerificaCPF();">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Período <span class="required">*</span></label>

                            <div class="col-md-6">
                              <select class="form-control" name="periodo" required>
                                @for($i=1; $i<=12 ;$i++)
                                    @if($i==$perfilaluno->periodo)
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                    @endif
                                    @if($i!=$perfilaluno->periodo)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                @endfor
                              </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Telefone<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="telefone" value="{{ $perfilaluno->telefone }}" placeholder="Telefone" onkeypress="mascara(this, '## #####-####')" maxlength="13" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Data de Nascimento<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="date" name="nascimento" value="{{ $perfilaluno->nascimento }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">CPF<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="cpf" value="{{ $perfilaluno->cpf }}" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">RG<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="rg" value="{{ $perfilaluno->rg }}" onkeypress="mascara(this, '##-##.###.###')" maxlength="13" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Sexo<span class="required">*</span></label>

                            <div class="col-md-6">

                                <select class="form-control" name="sexo" required>
                                    @if($perfilaluno->sexo == 0)
                                        <option value="0" selected>Masculino</option>
                                        <option value="1">Feminino</option>
                                    @endif
                                    @if($perfilaluno->sexo == 1)
                                        <option value="0">Masculino</option>
                                        <option value="1" selected>Feminino</option>
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nacionalidade</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="nacionalidade" value="{{ $perfilaluno->nacionalidade }}" placeholder="Nacionalidade">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Estado<span class="required">*</span></label>

                            <div class="col-md-6">
                              <select class="form-control" name="estado" required>
                                <option value="1">Minas Gerais</option>
                                <option value="2">São Paulo</option>
                                <option value="3">Rio de Janeiro</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Cidade<span class="required">*</span></label>

                            <div class="col-md-6">
                              <select class="form-control" name="cidade" required>
                                <option value="1">Montes Claros</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Bairro<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilaluno->bairro }}" placeholder="Bairro" name="bairro" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Rua<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilaluno->rua }}" placeholder="Rua" name="rua" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Numero<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilaluno->numero }}" placeholder="Numero" name="numero" pattern="[0-9]+$" oninvalid="setCustomValidity('Este campo aceita apenas números')" required>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Idiomas</label>

                            <div class="col-md-6">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle col-md-12 col-xs-12" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Idiomas<span class="caret" id="idiomas"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><input type="checkbox" name="idiomaptbr" value="1">Português</li>
                                        <li><input type="checkbox" name="idiomaingles" value="1">Inglês</li>
                                        <li><input type="checkbox" name="idiomaespanhol" value="1">Espanhol</li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Lattes</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lattes" value="{{ $perfilaluno->lattes }}" placeholder="Lattes">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilaluno->facebook }}" name="facebook" placeholder="Facebook">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Linkedin</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilaluno->linkedin }}" name="linkedin" placeholder="Linkedin">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Instagram</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilaluno->instagram }}" name="instagram" placeholder="Instagram">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilaluno->twitter }}" name="twitter" placeholder="Twitter">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
        }
    }
</script>
@endsection
