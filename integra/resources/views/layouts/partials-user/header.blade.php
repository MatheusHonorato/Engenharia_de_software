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
          <a class="navbar-brand" href="{{ route('welcome') }}"><img src="/trabengv2/public/icones-aplicacao/Logo.png" style="max-width: 2em; margin-top: -0.5em;"><img src="/trabengv2/public/icones-aplicacao/Logo-name.png" style="max-width: 8em; margin-left: 2.5em;margin-top: -1.8em;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav col-md-8">
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>
            
            <li><a href="{{ route('user.home.perfil.index') }}">Perfil</a></li>
            
            <li class="nav-item"><a class="nav-link active" id="pills-notificacoes-tab" data-toggle="pill" href="#pills-notificacoes" role="tab" aria-controls="pills-notificacoes" aria-selected="true">Notificações</a></li>
            
            <li class="nav-item"><a class="nav-link active" id="pills-oportunidades-tab" data-toggle="pill" href="#pills-oportunidades" role="tab" aria-controls="pills-oportunidades" aria-selected="true">Oportunidades</a></li>
            <li class="nav-item"><a href="#about">Matchs</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right col-md-2 nav-pills mb-3" id="pills-tab" role="tablist">
                        <!-- Authentication Links -->
                        @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Cadastro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret" style="overflow: hidden;"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        </div>
      </div>
    </nav>
  