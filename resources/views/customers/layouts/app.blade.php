<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="icon" href="{{asset('/favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(app()->getLocale()=='ar')
        <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @endif


    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
</head>
<body @if(app()->getLocale()=='ar') dir="rtl" @endif lang="{{app()->getLocale()}}">
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href=" @auth {{ url('/home') }} @else {{url('/')}} @endauth">
                    <h1 class="fst-italic fw-bold text-success">
                        {{ config('app.name', 'Laravel') }}
                    </h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        @auth

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Branches') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('branches.index') }}">--}}
{{--                                        {{ __('Branches') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('branches.create') }}">--}}
{{--                                        {{ __('Create branch') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Products') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('products.index') }}">--}}
{{--                                        {{ __('Products') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('products.create') }}">--}}
{{--                                        {{ __('Create product') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Menus') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('menus.index') }}">--}}
{{--                                        {{ __('Menus') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('menus.create') }}">--}}
{{--                                        {{ __('Create menu') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Categories') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('categories.index') }}">--}}
{{--                                        {{ __('Categories') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('categories.create') }}">--}}
{{--                                        {{ __('Create category') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Products options') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('options.index') }}">--}}
{{--                                        {{ __('Products options') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('options.create') }}">--}}
{{--                                        {{ __('Create product option') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ __('Coupons') }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('coupons.index') }}">--}}
{{--                                        {{ __('Coupons') }}--}}
{{--                                    </a>--}}
{{--                                    <a class="dropdown-item" href="{{ route('coupons.create') }}">--}}
{{--                                        {{ __('Create coupon') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        @endauth
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-success" href="{{ route('customer.login_form') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-success" href="{{ route('customer.register_form') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                                    @if(app()->getLocale()!='en')
                                        <a class="nav-link text-success" href="{{route('language.change','en')}}">
                                            English
                                        </a>
                                    @else
					<a class="nav-link text-success" href="{{route('language.change','ar')}}">
                                            عربي
                                        </a>
				    @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-gear fa-2x"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="#">
                                        {{ Auth::user()->name }}
                                    </a>
{{--                                    <a class="dropdown-item" href="{{ route('workdays.edit') }}">--}}
{{--                                        {{ __('Edit workdays') }}--}}
{{--                                    </a>--}}


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(app()->getLocale()!='ar')
                                        <a class="dropdown-item" href="{{route('language.change','ar')}}">
                                            عربي
                                        </a>
                                    @endif
                                    @if(app()->getLocale()!='en')
                                        <a class="dropdown-item" href="{{route('language.change','en')}}">
                                            English
                                        </a>
                                    @endif



                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 pt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <i class="fa fa-lg fa-check-circle d-inline"></i>
                     {{ session()->get('message') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
