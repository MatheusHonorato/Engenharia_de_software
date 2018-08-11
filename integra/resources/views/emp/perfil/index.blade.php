@extends('emp.layouts.partials.app')

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
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('emp.home.perfil.submit') }}" onsubmit="VerificaCPF();">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Telefone<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="telefone" value="{{ $perfilemp->telefone }}" placeholder="Telefone" onkeypress="mascara(this, '## #####-####')" maxlength="13" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">CNPJ<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="cnpj" value="{{ $perfilemp->cnpj }}" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" required>
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
                            <label  class="col-md-4 control-label">Cidade<span class="required">*</span></label>

                            <div class="col-md-6">
                              <select class="form-control" name="cidade" required>
                                <option value="1">Montes Claros</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bairro<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilemp->bairro }}" placeholder="Bairro" name="bairro" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logadouro<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilemp->logadouro }}" placeholder="Logadouro" name="logadouro" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Número<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilemp->numero }}" placeholder="Número" name="numero" pattern="[0-9]+$" oninvalid="setCustomValidity('Este campo aceita apenas números')" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Complemento</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ $perfilemp->complemento }}" placeholder="Complemento" name="complemento">
                            </div>
                        </div>                       

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilemp->facebook }}" name="facebook" placeholder="Facebook">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Linkedin</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilemp->linkedin }}" name="linkedin" placeholder="Linkedin">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Instagram</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilemp->instagram }}" name="instagram" placeholder="Instagram">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{ $perfilemp->twitter }}" name="twitter" placeholder="Twitter">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
