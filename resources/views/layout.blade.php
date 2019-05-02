<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <title>GROWER</title>
    </head>
    <body>
            @if (Auth::check())
            <a href="logout" class="hoge">ログアウト</a>
            @else
            <a href="login">ログイン</a>
            <a href="register">新規登録</a>
            @endif
        @yield('content')

        <script src="./js/jquery-3.3.1.min.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>
