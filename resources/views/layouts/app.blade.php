<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PFE ISET-Bizerte') }}</title>

    {{--  Animate.css  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'PFE ISET-Bizerte') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::user())
                            @if(Auth::user()->userPrivilege === 2)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etudiants <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/students">Liste des étudiants</a></li>
                                        <li><a href="/students/create">Ajouter un étudiant</a></li> 
                                        <li><a href="/uploadstudents">Inscrire plusieurs étudiants</a></li>                                        
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/classes">Les classes</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="/sections">Les sections</a></li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enseignants <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/teachers">Liste des enseignants</a></li>
                                        <li><a href="/teachers/create">Ajouter un enseignant</a></li> 
                                        <li><a href="/uploadteachers">Inscrire plusieurs enseignants</a></li>                                                                                
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Encadrement <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Les sujets</a></li>                                                                                
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Les encadrants</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Voeux encadrements</a></li>
                                        <li><a href="#">Souhaits des étudiants</a></li>
                                    </ul>
                                </li>                                
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            {{--  <li><a href="{{ route('register') }}">Register</a></li>  --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('layouts.messages')
        </div>        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
