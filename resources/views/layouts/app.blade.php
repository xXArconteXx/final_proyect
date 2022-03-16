<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')

    {{-- Jquery date range links --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    {{-- calendar script --}}
    <script type="text/Javascript" src="{{ asset('js/calendar.js') }}"></script>

</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                        
                        @else
                            @if(@Auth::user()->hasRole('admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('itineraty.list')}}">Itineraties</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.list')}}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('ship.list')}}">Ships</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('bay.list')}}">Bays</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('penalty.list')}}">Penalties</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('client.itineraty')}}">Itineraties</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('client.ship')}}">Ship</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('client.penalty')}}">Penalties</a>
                                </li>
                            @endif
                        @endguest
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(@Auth::user()->hasRole('admin'))
                                    <span class="dropdown-header">Management</span>
                                    <a class="dropdown-item" href="{{route('itineraty.list')}}">Itineraties</a>
                                    <a class="dropdown-item" href="{{route('user.list')}}">Users</a>
                                    <a class="dropdown-item" href="{{route('ship.list')}}">Ships</a>
                                    <a class="dropdown-item" href="{{route('bay.list')}}">Bays</a>
                                    <a class="dropdown-item" href="">Penalties</a>
                                    <span><hr class="dropdown-divider"></span>
                                    <span class="dropdown-header">User Actions</span>
                                @else
                                    <a class="dropdown-item" href="">Itineraties</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        
        <main>
            @yield('content')
            @yield('footer')

        </main>

        @yield('js')
    </div>
</body>


</html>
