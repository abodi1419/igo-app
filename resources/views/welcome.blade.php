<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iGo restaurants</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                height: 100vh !important;
            }
            .bg1{
                background: url("{{asset('assets/img/bg1.png')}}");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: top;
            }
            .text-orange{
                color: #ee7031;
            }
            .bg-orange{
                background: #ee7031;
            }
            .start-div{
                position: absolute;
                top: 20%;
                left: 0;
                right: 0;
            }
            .end-div{
                position: absolute;
                top: 45%;
                left: 0;
                right: 0;
            }
            .phone-img{
                position: absolute;
                right: 5px;
                top: 5px;
                width: 40%;
                height: auto;
                max-width: 200px;

            }
            .bg-silver{
                background: #F2F2F2;
            }
        </style>
    </head>
    <body class="">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 bg1 position-relative" style="height: 100vw; max-height: 1080px">
                <div class="start-div">
                    <h3 class="text-white fw-bold text-center">{{__("Double your production and get order ready before customer arrive")}}</h3>
                </div>
                <div class="end-div text-center">

                        <a class="btn bg-white p-3 text-orange rounded-5" href="{{route('register')}}"> <h2 class="fw-bold">
                            {{__("Join us as partner")}} </h2>
                        </a>


                </div>
            </div>
            <div class="col-12 position-relative bg-silver" style="height: 30vw; min-height: 350px">
                <div class="text-end start-div" style="margin-right: 196px">
                    <h3>
                        {{__("Download iGO")}}
                    </h3>
                    <div class="text-center">
                        <button class="mb-2 btn btn-dark rounded-0" style="width: 160px">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-3 text-center">
                                    <img src="{{asset('assets/img/google-play.png')}}" height="30" width="30" alt="">
                                </div>
                                <div class="col-9 text-end">
                                    Google play

                                </div>
                            </div>
                        </button>
                        <br>
                        <button class="btn btn-dark rounded-0" style="width: 160px">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <img src="{{asset('assets/img/app-store.png')}}" height="30" width="30" alt="">
                                </div>
                                <div class="col-9 text-end">
                                    App store

                                </div>
                            </div>
                        </button>
                    </div>


                </div>
                <img src="{{asset('assets/img/phone.png')}}" class="phone-img" alt="">
            </div>
        </div>
    </div>
    </body>
</html>
