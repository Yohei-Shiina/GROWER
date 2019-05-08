<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.show.css') }}">


        <title>GROWER</title>
    </head>
    <body>
        <div class="wrap">
            <div class="sidebar">
                <ul>
                    <li class="title"><a href="/">GROWER</a></li>
                    <li class="goal"><a href="/">目標リスト</a></li>
                    <li><a href="">バケットリスト</a></li>
                    <li><a href="">マイページ</a></li>
                    <li class="logout"><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
        
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
