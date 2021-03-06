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

    margin-top: 0em;

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

    margin-top: 0em;

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



    <nav class="navbar navbar-default navbar-fixed-top" id="header-completo">

      <div class="container-fluid">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ route('welcome') }}/icones-aplicacao/Logo.png" style="max-width: 2em; margin-top: -0.5em;"><img src="{{ route('welcome') }}/icones-aplicacao/Logo-name.png" style="max-width: 8em; margin-left: 2.5em;margin-top: -1.8em;"></a>

        </div>

        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav col-md-8">

            

            <li><a href="{{ route('user.home.perfil.index') }}">Perfil</a></li>

            

            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profissional<span class="caret"></span></a>

              <ul class="dropdown-menu">

                <li><a tabindex="-1" href="{{ route('user.home.cursos') }}">Cursos</a></li>

                <li><a tabindex="-1" href="{{ route('user.home.habilidades') }}">Habilidades</a></li>

                <li><a href="{{ route('user.home.conhecimentos') }}">Conhecimentos</a></li>

                <li><a href="{{ route('user.home.atuacao') }}">Atuação</a></li>

                </li>

              </ul>

            </li>

            <li class="nav-item"><a href="{{ route('user.match') }}">Matchs</a></li>

          </ul>

            <ul class="nav navbar-nav navbar-right col-md-2 nav-pills mb-3" id="pills-tab" role="tablist">

                        <!-- Authentication Links -->

                        @guest

                          <li><a href="{{ route('login') }}">Login</a></li>

                          <li><a href="{{ route('register') }}">Cadastro</a></li>

                        @else

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

                                    <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px;"></span>{{ Auth::user()->name }} <span class="caret" style="overflow: hidden;"></span>

                                </a>



                                <ul class="dropdown-menu">

                                    <li>

                                        <a href="{{ route('logout') }}"

                                            onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                            Sair

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

  