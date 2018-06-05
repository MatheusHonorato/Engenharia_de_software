@extends('layouts.partials-geral.head')
@extends('layouts.partials-geral.header')


@if(session()->has('message'))
    <div class="alert alert-danger" style="margin-top: 1.8%; margin-bottom: 0%;">
        {{ session()->get('message') }}
    </div>
@endif

<div class="jumbotron">
    <div class="col-md-offset-2 col-sm-offset-1">
        <h1>Conecte-se</h1>
        <p>Oportunidades para empresas, alunos e instituições de ensino</p>
        <p><a class="btn btn-default btn-lg" id="btn-banner" href="#" role="button">Mais</a></p>
    </div>
</div>

<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <h1 style="padding-left: 0.3em;">Oportunidades</h1>
        <div class="col-md-4">
          <h2>Desenvolvimento</h2>
          <h5>Salario R$</h5>
          <h5>Quantidade - Local</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Desenvolvimento</h2>
          <h5>Salario R$</h5>
          <h5>Quantidade - Local</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Desenvolvimento</h2>
          <h5>Salario R$</h5>
          <h5>Quantidade - Local</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

        <h2>Quem utiliza</h2>
        <h3 style="text-align: center;">Empresas</h3>  
        <div class="row">
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/sambatech.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/rock-content.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/sambatech.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/rock-content.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                <img src="img/sambatech.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/rock-content.png" alt="...">
                </a>
            </div>
        </div>
        <h3 style="text-align: center;">Instituições de ensino</h3>  
        <div class="row">
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/unimontes.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/ufmg.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/unimontes.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/femc.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/unimontes.png" alt="...">
                </a>
            </div>
            <div class="col-xs-6 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="img/ufmg.png" alt="...">
                </a>
            </div>
        </div>
</div>
@extends('layouts.partials-geral.footer')