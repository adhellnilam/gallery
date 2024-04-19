<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>orgGallery.</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/script.js'])

    <!-- Scripts untuk jQuery, Popper.js, dan Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- magnific popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand">
                    {{-- href="{{ url('/login') }}" --}}
                    orgGallery<span style="color: #B67352">.</span>
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
                            <li class="nav-item dropdown" style="margin-right: 10px">
                                <a href="{{ route('home') }}" class="buat">Home</a>

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff">
                                    Create
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="profile">
                                        <a class="dropdown-item" href="{{ route('posts') }}">
                                            {{ __('Create Post') }}
                                        </a>  
                                        {{-- <span class="material-symbols-outlined icon">person</span>
                                        <a href="{{ route('profile') }}" class="dropdown-item profilenav">Profile</a> --}}
                                    </div>

                                    <div class="profile1">
                                        <a class="dropdown-item" href="{{ route('index') }}">
                                            {{ __('Create Album') }}
                                        </a> 
                                    </div>

                                    {{-- <div class="profile1">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}
                                        </a>     
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                                </div>
                            </li>

                            <li class="nav-item dropdown" style="margin-right: 10px">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff">
                                    Export
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="profile">
                                        <a class="dropdown-item" href="{{ route('exportPost') }}">
                                            {{ __('Export Post') }}
                                        </a>  
                                        {{-- <span class="material-symbols-outlined icon">person</span>
                                        <a href="{{ route('profile') }}" class="dropdown-item profilenav">Profile</a> --}}
                                    </div>

                                    <div class="profile1">
                                        <a class="dropdown-item" href="{{ route('exportAlbum') }}">
                                            {{ __('Export Album') }}
                                        </a> 
                                    </div>

                                    {{-- <div class="profile1">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}
                                        </a>     
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                                </div>
                            </li>

                            <li class="nav-item dropdown">

                                {{-- <div class="create">
                                    <a href="{{ route('posts') }}" class="buat">Create</a>
                                </div> --}}

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="profile">
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <span class="material-symbols-outlined">person</span> {{ __('Profile') }}
                                         </a>  
                                        {{-- <span class="material-symbols-outlined icon">person</span>
                                        <a href="{{ route('profile') }}" class="dropdown-item profilenav">Profile</a> --}}
                                    </div>

                                    <div class="profile">
                                        <a class="dropdown-item" href="{{ route('report') }}">
                                            <span class="material-symbols-outlined">fact_check</span> {{ __('Report Data') }}
                                         </a>  
                                        {{-- <span class="material-symbols-outlined icon">person</span>
                                        <a href="{{ route('profile') }}" class="dropdown-item profilenav">Profile</a> --}}
                                    </div>

                                    {{-- <div class="profile">
                                        <a class="dropdown-item" href="{{ route('export') }}">
                                            <span class="material-symbols-outlined">ios_share</span> {{ __('Export Data') }}
                                         </a>  
                                    </div> --}}

                                    <div class="profile1">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="material-symbols-outlined">logout</span> {{ __('Logout') }}
                                         </a>     
                                    </div>

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
                @include('inc.message')
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jquery cdn link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <!-- magnific popup js cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

   <script>
      $(document).ready(function(){
         $('.buttons').click(function(){
            $(this).addClass('active').siblings().removeClass('active');

            var filter = $(this).attr('data-filter')

            if(filter== 'all'){
               $('.image').show(400);
            }else {
               $('.image').not('.'+filter).hide(200);
               $('.image').filter('.'+filter).show(400);
            }
         });

         $('.gallery').magnificPopup({
            delegate:'a',
            type:'image',
            gallery:{
               enabled:true
            }
         });
      });
   </script>

   @yield('js')
</body>
</html>
