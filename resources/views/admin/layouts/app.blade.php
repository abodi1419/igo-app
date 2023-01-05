<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="icon" href="{{asset('favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
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
{{--    <link href="{{ asset('css/all.css') }}" rel="stylesheet">--}}

    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap');
        body{
            overflow: hidden;
            font-family: 'Libre Baskerville', serif;
            font-weight: bold;
        }
        .main-menu .fa-2x {
            font-size: 2em !important;
        }
        .main-menu .fa {
            position: relative;
            display: table-cell;
            width: 60px !important;
            height: 36px !important;
            text-align: center;
            vertical-align: middle;
            font-size:20px !important;
        }
        .main-menu .fa-solid {
            position: relative;
            display: table-cell;
            width: 60px !important;
            height: 36px !important;
            text-align: center;
            vertical-align: middle;
            font-size:20px !important;
        }


        .main-menu:hover,nav.main-menu.expanded {
            width:250px;
            overflow:visible;
        }

        .main-menu {
            background: rgb(67,67,67);
            background: -moz-linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            background: -webkit-linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            background: linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#434343",endColorstr="#000000",GradientType=1);
            border-right:1px solid #e5e5e5;
            position:fixed;
            top:0;
            bottom:0;
            height:100%;
            right:0;
            width:60px;
            overflow:hidden;
            -webkit-transition:width .05s linear;
            transition:width .05s linear;
            -webkit-transform:translateZ(0) scale(1,1);
            z-index:1000;
        }

        .main-menu>ul {
            margin:auto 0 auto;

        }

        .main-menu li {
            position:relative;
            display:block;
            width:250px;
        }

        .main-menu li>a {
            position:relative;
            display:table;
            border-collapse:collapse;
            border-spacing:0;
            color:#fff;
            font-family: arial;
            font-size: 14px;
            text-decoration:none;
            -webkit-transform:translateZ(0) scale(1,1);
            -webkit-transition:all .1s linear;
            transition:all .1s linear;

        }

        .main-menu .nav-icon {
            position:relative;
            display:table-cell;
            width:60px;
            height:36px;
            text-align:center;
            vertical-align:middle;
            font-size:18px;
        }

        .main-menu .nav-text {
            position:relative;
            display:table-cell;
            vertical-align:middle;
            width:190px;
            font-family: 'Titillium Web', sans-serif;
        }

        .main-menu>ul.logout:dir(ltr) {
            position:absolute;
            left:0;
            bottom:0;
        }
        .main-menu>ul.logout:dir(rtl) {
            position:absolute;
            right:0;
            bottom:0;
        }

        .no-touch .scrollable.hover {
            overflow-y:hidden;
        }

        .no-touch .scrollable.hover:hover {
            overflow-y:auto;
            overflow:visible;
        }

        a:hover,a:focus {
            text-decoration:none;
        }

        nav {
            -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
            -o-user-select:none;
            user-select:none;
        }

        nav ul,nav li {
            outline:0;
            margin:0;
            padding:0;
        }
        .main-menu li:hover>a,nav.main-menu li.active>a,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus,.no-touch .dashboard-page nav.dashboard-menu ul li:hover a,.dashboard-page nav.dashboard-menu ul li.active a {
            color:#fff;
            background-color:#5fa2db;
        }
        .area {
            float: right;
            background: #e2e2e2;
            width: 100%;
            height: 100%;
        }
        @font-face {
            font-family: 'Titillium Web';
            font-style: normal;
            font-weight: 300;
            src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
        }
        .fixed{
            position: fixed;
            top: 110px;
            bottom: 10px;
            right: 65px;
            left: 5px;

            overflow-x: auto;
            overflow-y: visible;

        }
        .i {
            min-width: 60px !important;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .bg-gray{
            background-color: #f8f9fa;
        }
        .icon-bg{
            background: rgb(67,67,67);
            background: -moz-linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            background: -webkit-linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            background: linear-gradient(180deg, rgba(67,67,67,1) 0%, rgba(0,0,0,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#434343",endColorstr="#000000",GradientType=1);
            color: #ffffff;
        }
        input[type=number]{
            text-align: center;
        }
        .droid-arabic-kufi{font-family: 'Droid Arabic Kufi', serif;}

    </style>
    @php
        $notifications = auth()->user()->unreadNotifications;
    @endphp
</head>
<body @if(app()->getLocale()=='ar') dir="rtl" @endif lang="{{app()->getLocale()}}">
    <div id="app" class="bg-gray">
        <div class="area"></div>
        <nav class="main-menu bg-dark">
    {{--        <div class="text-center text-light">--}}
    {{--            --}}
    {{--            Admin panel--}}
    {{--        </div>--}}
    {{--        <div class="text-start text-light" style="padding-right: 60px">--}}
    {{--            {{__('Admin panel')}}--}}
    {{--        </div>--}}
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12">
                    <ul>
                        <li class="@if(Route::currentRouteName()=='home') bg-info @endif">
                            <a href="{{route('home')}}">
                                <i class="fa fa-home fa-2x i"></i>
                                <span class="nav-text">
                                {{__('Home')}}
                            </span>
                            </a>

                        </li>
                        <li class="has-subnav @if(str_contains(Route::currentRouteName(), 'admin.restaurant')) bg-info @endif">
                            <a href="{{route('admin.restaurant.index')}}">
                                <i class="fa fa-2x fa-spoon i"></i>
                                <span class="nav-text">
                                {{__('Restaurants')}}
                            </span>
                            </a>

                        </li>
                        li class="has-subnav @if(str_contains(Route::currentRouteName(), 'admin.categories')) bg-info @endif">
                            <a href="{{route('admin.categories.index')}}">
                                <i class="fa fa-2x fa-hashtag i"></i>
                                <span class="nav-text">
                                {{__('Restaurants categories')}}
                            </span>
                            </a>

                        </li>
                        {{--            <li class="has-subnav">--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-list fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Forms--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}

                        {{--            </li>--}}
                        {{--            <li class="has-subnav">--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-folder-open fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Pages--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}

                        {{--            </li>--}}
                        {{--            <li>--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-bar-chart-o fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Graphs and Statistics--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}
                        {{--            </li>--}}
                        {{--            <li>--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-font fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                           Quotes--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}
                        {{--            </li>--}}
                        {{--            <li>--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-table fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Tables--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}
                        {{--            </li>--}}
                        {{--            <li>--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-map-marker fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Maps--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}
                        {{--            </li>--}}
                        {{--            <li>--}}
                        {{--                <a href="#">--}}
                        {{--                    <i class="fa fa-info fa-2x"></i>--}}
                        {{--                    <span class="nav-text">--}}
                        {{--                            Documentation--}}
                        {{--                        </span>--}}
                        {{--                </a>--}}
                        {{--            </li>--}}
                    </ul>
                </div>
            </div>


        </nav>
        <nav class="navbar navbar-expand bg-gray" style="padding-right: 60px">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel').' '.__('Dashboard') }}</a>
                <ul class="navbar-nav">
                    <li>
                        @if(app()->getLocale()!='en')


                            <a class="nav-link badge text-bg-white text-dark" href="{{route('language.change','en')}}">
                                <h4>
                                    En
                                </h4>
                            </a>




                        @else

                            <a class="nav-link badge text-bg-white text-dark" href="{{route('language.change','ar')}}">
                                <h4>Ar</h4>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-bell">

                            </i>
                            @if(count($notifications))
                                <span id="new_notification" class="position-absolute top-10 start-10 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            @endif



                        </a>

                        <div class="dropdown-menu dropdown-menu-end" id="notify_div" style="overflow: auto; height: 300px; min-width: 200px" aria-labelledby="navbarDropdown">
                            <div style="position: absolute; top: 45%; width: 100%; text-align: center; display: none" id="nothing_new">
                                {{__('Nothing new')}}
                            </div>
                            @forelse($notifications as $notification)
                                @if(str_contains($notification->type, 'NewUser'))
                                    <div class="dropdown-item border-top bg-transparent border-bottom">
                                        <h5>{{__("New restaurant joined")}}</h5>
                                        <h6>{{__('Name')}}
                                            <a href="{{route('admin.restaurant.show',$notification->data['id'])}}">
                                                @if(app()->getLocale()=='ar')
                                                    {{$notification->data['name_ar']}}
                                                @else
                                                    {{$notification->data['name']}}
                                                @endif
                                            </a>
                                        </h6>


                                        <small class="text-secondary"> {{$notification->created_at->diffForHumans()}}</small>
                                        <br>
                                        <div class="text-end">
                                            <button class="btn btn-info mark-as-read mt-2 p-1" data-id="{{ $notification->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif

                            @empty
                                <script>$('#nothing_new').show()</script>

                            @endforelse

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            </a>

                            <a href="#" class="dropdown-item text-center" onclick="document.getElementById('logout-form').submit();">


                                <i class="fa fa-power-off fa-2x i"></i>
{{--                                <span class="nav-text">--}}
{{--                                {{ __('Logout') }}--}}
{{--                            </span>--}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </a>

                        </div>
                    </li>


                </ul>
            </div>
        </nav>

        <main class="py-4 pt-1 pr-5 me-1">
            @yield('title_bar')



            <div class="ms-0 bg-gray pe-4 ps-4 pt-5 fixed">
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
            </div>

        </main>
    </div>
    <script>
        function sendMarkRequest(id = null) {
            let csrf = document.querySelector('meta[name="csrf-token"]').content;
            return $.ajax("{{ route('notification.mark.read') }}", {
                method: 'POST',
                data: {
                    _token: csrf,
                    id
                }
            });
        }
        $(function() {

            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parent().parent().remove();
                    if($('.mark-as-read').length<1){
                        $('#nothing_new').show();
                        $('#new_notification').hide();
                    }
                });
            });
            // $('#mark-all').click(function() {
            //     let request = sendMarkRequest();
            //     request.done(() => {
            //         $('div.alert').remove();
            //     })
            // });
        });
    </script>
</body>
</html>
