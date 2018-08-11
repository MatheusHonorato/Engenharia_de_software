@extends('layouts.app')

@if(session()->has('message'))
    <div class="alert alert-danger" style="margin-top: 4.5%; margin-bottom: 0%;">
        {{ session()->get('message') }}
    </div>
@endif

<div class="jumbotron">
    <div class="col-md-offset-2 col-sm-offset-1" style="padding: 5%;">
        <h1>Conecte-se</h1>
        <p>Oportunidades para empresas, alunos e instituições de ensino</p>
        <p><a class="btn btn-default btn-lg" id="btn-banner" href="#" role="button">Mais</a></p>
    </div>
</div>
@section('content')


<div class="container">
      <!-- Example row of columns -->
      <div class="row text-center">
        <h1>O que você encontrará</h1>
        <div class="col-md-4">
          <h2>Perfis</h2>
          <img src="{{ route('welcome') }}/icones-aplicacao/type_msg_14379.png" width="50%" style="padding-bottom: 5%;">
          <p>Perfis de alunos, instituições de ensino e empresas.</p>
        </div>
        <div class="col-md-4">
          <h2>Oportunidades</h2>
          <img src="{{ route('welcome') }}/icones-aplicacao/favorite_14391.png" width="50%" style="padding-bottom: 5%;">
          <p>Anuncios de oportunidades acadêmicas e de mercado para alunos cadastrados.</p>
        </div>
        <div class="col-md-4">
          <h2>Matches</h2>
            <img src="{{ route('welcome') }}/icones-aplicacao/perfect_ok_14437.png" width="50%" style="padding-bottom: 5%;">

          <p>Se suas caracteristicas forem de encontro com alguma oportunidade ofertada, você receberá uma notificação de match com os dados da instituição que ofertou esta oportunidade.</p>

        </div>
      </div>

      
</div>

<style type="text/css">
  

  footer {
  bottom: -800px !important;
}

@media (min-width: 768px) and (max-width: 769px){

  footer {
  bottom: -1000px !important;
}

}


  @media (min-width: 770px){

  footer {
  bottom: -300px !important;
}

}
</style>


@endsection
