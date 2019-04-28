@extends('layout')

@section('content')
<h1>目標</h1>
<div> {{$target->goal}} </div> 
<h1>期限</h1>
<div>{{ $target->due()->days . "日"}}</div>
{{ Form::open(['url' => "/targets/{$target->id}/tasks", 'method' => 'post']) }}

<h1>タスク</h1>
<ol>
  @foreach($tasks as $task)
  <li>{{$task->task}}</li>
  @endforeach
</ol>
{{ Form::text('task', null, ["placeholder" => 'タスクを入力']) }}
{{ Form::submit('send') }}
{{ FOrm::close()}}

<a href="/targets/{{$target->id}}/edit">クエストの編集</a>
<a href="/targets/{{$target->id}}/delete">クエストの削除</a>

@endsection