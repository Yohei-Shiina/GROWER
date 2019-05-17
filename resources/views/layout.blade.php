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
                <p id="nowTime"></p>
                @yield('content')
            </div>
        </div>
        
        
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/js/buckets.js')}}"></script>
        <script src="{{asset('/js/clock.js')}}"></script>
        <script>
            // バケットリストの追加ボタン押下時
            $("#bucket-add").on("click", function() {
                postWish($(".input").val());
            });
            // やりたいことリストの達成、削除ボタン押下時
            $(document).on("click", "#bucket", function() {
                var id = $(this).parent().attr('class');
                controlBtn($(this), id)
            });
            // タスクの追加ボタン押下時
            $("#task-add").on("click", function() {
                var id = $('.form-group .hidden').val();
                var text = $("#task-add").prev().val();
                postTask(text, id)
            });
            // タスクの達成、削除ボタン押下時
            $(document).on("click", ".list input[type=submit]", function() {
                console.log($(this));
                var task = $(this).siblings()[0];
                var task_id = $(task).attr('data-taskId');
                var target = $(this).siblings()[1];
                var target_id = $(target).attr('data-targetId');
                taskButton($(this), target_id, task_id);
            });
        </script>
    </body>
</html>
