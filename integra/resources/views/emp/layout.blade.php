<!DOCTYPE html>
<html>
<head>
  <title>Integra 2.0</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ route('welcome') }}/icones-aplicacao/icon.ico">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

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
    padding-top: 15em;
    }
}

</style>

<body>

    @yield('content')

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
            <ul class="nav navbar-nav col-md-7">
              <li><a href="{{ route('welcome') }}">Início</a></li>
              <li><a href="#about">Sobre</a></li>
              <li><a href="#about">Oportunidades</a></li>
            </ul>
          
            <ul class="nav navbar-nav navbar-right col-md-1">
                        <!-- Authentication Links -->
                        @guest
                            
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="overflow: hidden;">
                                    {{ $name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('emp.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('emp.logout') }}" method="POST" style="display: none;">
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
    