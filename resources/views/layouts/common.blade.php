<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'リザルトシステム') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gana.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('/js/vue.js')}}"></script>
        <script src="{{asset('/js/bootstrap.js')}}"></script>
        <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
<!--    
    <nav class="navbar navbar-light shadow p-3 mb-2 bg-info" >
-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
        <div class="row" style="width:100%">
            <div class="col-4">
            @if (Route::has('login'))
                @auth
                <a class="btn btn-outline-light" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                </svg>
                </a>

                <a class="btn btn-outline-light" href="#" onclick="window.history.back(); return false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </a>
                <a class="navbar-brand" href="#">{{$title}}画面</a>
                @endauth
            @endif
            </div>
            <div class="col-4"><i class="bi bi-box-arrow-right"></i>
            @if (Route::has('login'))
                @auth
                <a class="navbar-brand" href="#">{{ $judge_order }}</a>
                @endauth
            @endif
            </div>
            <div class="col-4">
                <form class="container-fluid justify-content-end">
                    @if (Route::has('login'))
                        @auth
                        <a class="btn btn-outline-light" href="{{ route('logout') }}">
                            <!--
                            <i class="bi bi-box-arrow-right"></i>
                            -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </a>
                        @endauth
                    @endif
                </form>
            </div>
        </div>

    </nav>
        <header>
            @include('includes.header')
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>
