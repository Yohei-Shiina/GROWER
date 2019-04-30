<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GROWER</title>
    </head>
    <body>
            @if (Auth::check())
            <a href="logout">ログアウト</a>
            @else
            <a href="login">ログイン</a>
            <a href="register">新規登録</a>
            @endif
        @yield('content')
    </body>
</html>
