<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ダンス公演予約') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app2.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/book-top') }}">
                    DanceNavi
                </a>
            </div>
            <div class="my-navbar-control">
            @if(Auth::check())
                <span class="my-navbar-item"><a href="{{ route('profile',['user' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a></span>
                    /
                    <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" methed="POST" style="display: none;">
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click',function(event){
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                        });
                    </script>
            @else
                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                    /
                <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
            @endif
            /<a href="{{ url('/') }}">管理者画面</a>
        </div>
        </nav>
        @yield('content')
    </div>
    </body>
</html>