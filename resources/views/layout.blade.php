<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.create.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/targets.show.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/users.show.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/buckets.index.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        
        <title>GROWER</title>
    </head>
    <body>
        <div class="wrap">
            <div class="sidebar">
                <ul>
                    <li class="title"><a href="/"><div>GROWER</div></a></li>
                    <li class="goal"><a href="/targets"><div>目標一覧</div></a></li>
                    <li><a href="/targets/create"><div>目標を作成する</div></a></li>
                    <li><a href="/buckets"><div>バケットリスト</div></a></li>
                    <li><a href="/users/{{Auth::user()->id}}"><div>マイページ</div></a></li>
                    <form action="/logout" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" class="logout" value="ログアウト">
                    </form>
                </ul>
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
        
        
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/js/buckets.js')}}"></script>
        <script src="{{asset('/js/tasks.js')}}"></script>
        <script src="{{asset('/js/clock.js')}}"></script>
        <script>
            // バケットリストの追加ボタン押下時
            $("#bucket-add").on("click", function() {
                postWish($(".input").val());
                $(".input").val("");
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
                $("#task-add").prev().val("");
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
