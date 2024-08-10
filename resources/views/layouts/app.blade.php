<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UNE Blog</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Modified Styles -->
    <style>
        h1, h2, h3, h4, p {
            text-align: center;
        }
        h1, h2 {
            margin: 1rem;
            margin-bottom: 2rem;
        }
        h4 {
            font-size: 1.2rem;
        }
        .btn {
            margin: 5px;
        }
        [data-bs-theme="dark"] {
                a, .nav-link{
                    color: #7ea9f2;
                }
                a:hover, .nav-link:hover, .navbar-brand:hover, .nav-link:hover, .dropdown-item:hover{
                    color: #efe98f;
                }
        }

        [data-bs-theme="light"] {
                .link, .nav-link, .navbar-brand{
                    color: #0243b3;
                }
                .link:hover, .nav-link:hover, .navbar-brand:hover, .nav-link:hover, .dropdown-item:hover{
                    color: #4287fa;
                }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::check() && Auth::user()->user_role == 'admin')
                                        <a class="dropdown-item link" href="{{ route('admin.dashboard') }}">
                                            Admin Dashboard
                                        </a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->user_role == 'author' || Auth::user()->user_role == 'admin')
                                        <a class="dropdown-item link" href="{{ route('author.dashboard') }}">
                                            Author Dashboard
                                        </a>
                                    @endif
                                    <a class="dropdown-item link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 m-2">
            @yield('content')
        </main>
    </div>
</body>

</html>
