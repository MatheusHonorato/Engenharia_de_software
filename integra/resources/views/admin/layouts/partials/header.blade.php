<style type="text/css">
  #top-header{
    background-color: #f5f5f5;
    height: 2em;
    padding-left: 2em;
    margin-top: 0em;
  }
  .navbar-nav>li>a{
        color: #666;
  }
  #header-completo{
    margin-top: 3em;
    background-color: white;
    border: none;
    padding-left: 3em;
    padding-right: 3em;
  }
  #teste{
    margin-top: 10em;
  }
  body{
    padding-top: 10em;
  }

  .navbar-inverse .navbar-toggle{
    border: none;
  }

  .navbar-inverse .navbar-toggle .icon-bar{
    background-color: #666 !important;
  }

  .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form{
    border: none;
  }

  .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover{
    background-color:  #666 !important;
  }

  .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover{
    background-color: white !important;
  }

  .navbar-nav>li>a{
    color: #666 !important;
  }


  @media (max-width: 750px) 
{
  #header-completo 
   {
    margin-top: 10em;
    padding-left: 0em;
    padding-right: 0em;
   }
   #top-header{
    height: 10em;
    padding-left: 0em;
   }
   body{
    padding-top: 10em;
    }
}

</style>

<!-- menu - sub-dropdowns -->
 <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

<body>

    @yield('content')

    <nav class="navbar navbar navbar-fixed-top" id="top-header">
      <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav col-md-12">
              <li><a>Alunos</a></li>
              <li><a>Empresas</a></li>
              <li><a>Instituições</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="header-completo">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('welcome') }}"><img src="/icones-aplicacao/Logo.png" style="max-width: 2em; margin-top: -0.5em;"><img src="/icones-aplicacao/Logo-name.png" style="max-width: 8em; margin-left: 2.5em;margin-top: -1.8em;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav col-md-9">

            <!--teste-->


<li class="col-md-3" style="margin-top: 0.5em;">
  <div>
    <div class="input-group">
      <input type="text" class="form-control" aria-label="...">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">Aluno</a></li>
          <li><a href="#">Empresa</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
  </div>
</li>

            <!--fim teste -->
          <!--
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>
          -->

            <!--<li><a href="{{ route('admin.home.perfil.index') }}">Perfil</a></li>-->
            


      <li class="dropdown">
    
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="{{ route('admin.home.cadastro.areas.index') }}">Áreas</a></li>
          <li><a tabindex="-1" href="{{ route('admin.home.cadastro.cursos.index') }}">Cursos</a></li>
          <li><a tabindex="-1" href="{{ route('admin.home.cadastro.habilidades.index') }}">Habilidades</a></li>
          </li>
        </ul>
      </li>


            <li><a href="#about">Noticias</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notificações <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('admin.home.notificacoes.aluno') }}">Aluno</a></li>
                  <li><a href="{{ route('admin.home.notificacoes.emp') }}">Empresa</a></li>
                </ul>
            </li>
            <li><a href="#about">Estatísticas</a></li>
            <li><a href="#about">Matchs</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guard('web_admin')->guest())

                            <!--Admin Login and registration Links -->

                            <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px;"></span>{{ Auth::guard('web_admin')->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
        </div>
      </div>
    </nav>
    