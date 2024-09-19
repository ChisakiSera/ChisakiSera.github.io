<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css\app-D-sv12UV.css') }}">
    <script src="{{ asset('css\app-BkDPDVeP.js') }}"></script>

    <!-- Scripts -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="h5 mb-0">{{ config('app.name') }}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- [SOON] Search bar here. Show it when user logs in --}}

                    {{-- this is only available for logged in users --}}
                    @auth
                        {{-- this will not show up in the admin side --}}
                        @if (!request()->is('admin/*'))
                            <ul class="navbar-nab ms-auto">
                                <form action="{{ route('search') }}" style="width: 300px" method="get">
                                    <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Search...">
                                </form>
                            </ul>
                        @endif
                        {{-- this will show up in the admin side --}}
                        @if (request()->is('admin/users*'))
                            <ul class="navbar-nab ms-auto">
                                <form action="{{ route('admin.users.search') }}" style="width: 300px" method="get">
                                    <input type="search" name="search" id="search" class="form-control form-control-sm" value="{{ isset($search) ? $search : '' }}" placeholder="Search...">
                                </form>
                            </ul>
                        @endif
                    @endauth

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
                            {{-- HOME --}}
                            <li class="nav-item" title="Home">
                                <a href="{{ route('index') }}" class="nav-link">
                                    <i class="fas fa-house text-dark icon-sm"></i>
                                </a>
                            </li>

                            {{-- Create Post --}}
                            <li class="nav-item" title="Create Post">
                                <a href="{{ route('post.create') }}" class="nav-link">
                                    <i class="fas fa-circle-plus text-dark icon-sm"></i>
                                </a>
                            </li>

                            {{-- Account --}}
                            <li class="nav-item dropdown">
                                <button id="account-dropdown" class="btn shadow-none nav-link" data-bs-toggle="dropdown">
                                    @if (Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fas fa-circle-user text-dark icon-sm"></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    {{-- [SOON] ADMIN CONTROLS --}}
                                    @can('admin')
                                        <a href="{{ route('admin.users') }}" class="dropdown-item">
                                            <i class="fas fa-user-gear"></i> Admin
                                        </a>

                                        <hr class="dropdown-divider">
                                    @endcan
                                    
                                    {{-- Profile --}}
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fas fa-circle-user"></i> Profile
                                    </a>

                                    {{-- Password --}}
                                    <a href="{{ route('password.edit', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fas fa-key"></i> Change Password
                                    </a>
                                    <hr class="dropdown-divider">

                                    {{-- Logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-right-from-bracket"></i> {{ __('Logout') }}
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- [SOON] Admin Menu --}}

                    @if (request()->is('admin/*'))
                        <div class="col-3">
                            <div class="list-group">
                                <a href="{{ route('admin.users') }}" class="list-group-item {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="fas fa-users"></i> Users
                                </a>

                                <a href="{{ route('admin.posts') }}" class="list-group-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                                    <i class="fas fa-newspaper"></i> Posts
                                </a>

                                <a href="{{ route('admin.categories') }}" class="list-group-item {{ request()->is('admin/categories') ? 'active' : '' }}">
                                    <i class="fas fa-tags"></i> Categories
                                </a>
                            </div>
                        </div>  
                    @endif
                    
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
