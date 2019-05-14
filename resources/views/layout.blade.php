<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.create.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.show.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/users.show.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/buckets.index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        
        <title>GROWER</title>
    </head>
    <body>
        <div class="wrap">
            <div class="sidebar">
                <ul>
                    <li class="title"><a href="/">GROWER</a></li>
                    <li class="goal"><a href="/targets">目標リスト</a></li>
                    <li><a href="/buckets">バケットリスト</a></li>
                    <li><a href="/users/{{Auth::user()->id}}">マイページ</a></li>
                    <li class="logout"><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
        
        
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/js/buckets.js')}}"></script>
        <script>
            $("#add").on("click", function() {
                postWish($(".input").val());
            });
        </script>
    </body>
</html>
