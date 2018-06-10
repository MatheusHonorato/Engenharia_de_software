@extends('layouts.partials-user.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.home.perfil.index.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Período</label>

                            <div class="col-md-6">
                              <select class="form-control" name="periodo">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="phone" placeholder="Telefone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Idade</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="idade" placeholder="Idade">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nacionalidade</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="nacionalidade" placeholder="Nacionalidade">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                              <select class="form-control" name="state">
                                <option value="1">Minas Gerais</option>
                                <option value="2">São Paulo</option>
                                <option value="3">Rio de Janeiro</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                              <select class="form-control" name="state">
                                <option value="1">Montes Claros</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Idiomas</label>

                            <div class="col-md-6">
                              <select class="form-control" name="idioma">
                                <option value="1">Português</option>
                                <option value="2">Inglês</option>
                                <option value="3">Espanhol</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Lattes</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lattes" placeholder="Lattes">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Facebook</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="facebook" placeholder="Facebook">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Linkedin</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="linkedin" placeholder="Linkedin">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Instagram</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="instagram" placeholder="Instagram">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Twitter</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="twitter" placeholder="Twitter">
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
@endsection
