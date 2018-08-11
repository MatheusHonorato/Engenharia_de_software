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

    margin-top: 0;

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

          <ul class="nav navbar-nav col-md-9">

            <li><a href="{{ route('emp.home.perfil.index') }}">Perfil</a></li>

            <li><a href="{{ route('emp.home.oportunidades.index') }}">Oportunidades</a></li><!-- cursos,oportunidades.. -->

          </ul>

            <ul class="nav navbar-nav navbar-right">

                        <!-- Authentication Links -->

                        @if (Auth::guard('web_emp')->guest())



                            <!--Admin Login and registration Links -->



                            <li><a href="{{ route('emp.login') }}">Emp Login</a></li>

                        @else

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                    <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px;"></span>{{ Auth::guard('web_emp')->user()->name }} <span class="caret"></span>

                                </a>



                                <ul class="dropdown-menu" role="menu">

                                    <li>

                                        <a href="{{ route('emp.logout') }}"

                                            onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                            Sair

                                        </a>



                                        <form id="logout-form" action="{{ route('emp.logout') }}" method="POST" style="display: none;">

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

    