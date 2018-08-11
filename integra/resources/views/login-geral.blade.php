@extends('layouts.app')


@section('content')


<style type="text/css">

    .bloco-user{

        color: #333;

    }

    .far, .fas, .fa{

        color: #8d48d2;

    }

    @media (max-width: 400px){

  footer {
  bottom: -100px !important;
}

}

</style>

<div class="container text-center">

    <h1 style="padding-top: 2em; padding-bottom: 2em;">Acessar</h1>

    <div class="col-md-12">

        <a href="{{ route('login') }}">

        <div class="col-md-2 col-md-offset-2 col-xs-8 col-xs-offset-2 bloco-user">

          <i class="far fa-user fa-5x"></i>

          <h2>Aluno</h2>

        </div></a>



        <a href="{{ route('admin.login') }}">

        <div class="col-md-2  col-md-offset-1 col-xs-8 col-xs-offset-2 bloco-user">

          <i class="fa fa-graduation-cap fa-5x"></i>

          <h2>Universidade</h2>

        </div></a>

        

        <a href="{{ route('emp.login') }}">

        <div class="col-md-2  col-md-offset-1 col-xs-8 col-xs-offset-2 bloco-user">

          <i class="fas fa-briefcase fa-5x"></i>

          <h2>Empresa</h2>

        </div></a>

    </div>

</div>

@endsection
