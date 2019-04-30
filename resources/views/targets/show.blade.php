@extends('layout')

@section('content')
<h1>目標</h1>
<div> {{$target->goal}} </div> 
<a href="/targets/{{$target->id}}/edit">目標の編集</a>
<a href="/targets/{{$target->id}}/delete">目標の削除</a>
<h1>期限</h1>
<div>{{ $target->due()->days . "日"}}</div>

<h1>タスク</h1>
<ol>
  @foreach($tasks as $task)
  <li>{{$task->task}}</li>
  <form method="post" action="/targets/{{$target->id}}/tasks/{{$task->id}}">
    {{ csrf_field() }}
    <button type="submit">削除</button>
  </form>
  @endforeach
</ol>
{{ Form::open(['url' => "/targets/{$target->id}/tasks", 'method' => 'post']) }}
{{ Form::text('task', null, ["placeholder" => 'タスクを入力']) }}
{{ Form::submit('send') }}
{{ Form::close()}}


@endsection