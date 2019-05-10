@extends('layout')

@section('content')

<div class="show-page">
  <h4 class="page">目標の詳細</h4>
  <div class="row"> 
    <div class="title col-lg-8 col-md-12">
      <h4 class="row">目標
        <div class="btns">
          <form action="/targets/{{ $target->id }}" method="post" >
            {{ csrf_field() }}
            {{ method_field('patch')}}
            @unless($target->status == true)
            <input type="submit" class="btn btn-primary shadow" name="achieve" value="達成">
            <a href="/targets/{{ $target->id }}/edit" class="btn btn-success">編集</a>
            @endunless
            <a href="/targets/{{ $target->id }}/delete" class="btn btn-danger">削除</a>
          </form>
        </div>
      </h4>
      <div class="goal breadcrumb bg-white">
        @unless($target->status == false)
        <p class="badge badge-warning">達成!!</p>
        @endunless{{ $target->goal }}
      </div>
    </div>

    <div class="due col-lg-3 col-md-12">
      <h6>期限</h6>
      <span class="due-time list-group-item rounded">{{ $target->due() }}</span>

      <h6>経過時間</h6>
    <span class=" passed-time list-group-item rounded">{{ $target->passedTime() }}</span>
    </div>
  
    <div class="task col-md-12">
      <h4>タスク</h4>
      <div class="tasks">
        <?php $i = 1; ?>
        @foreach($tasks as $task)
        <div class="list breadcrumb bg-white">
          <div>
            @unless($task->status == false)
              <p class="badge badge-warning">達成!!</p>
            @endunless
            {{ $i }}. {{ $task->task }}
          </div>
          <form action="/targets/{{$target->id}}/tasks/{{$task->id}}" method="POST">
            {{ csrf_field() }}
            @unless($task->status == true)
            <input type="submit" class="btn-primary shadow" name="change" value="達成?">
            @endunless
            <input type="submit" class="btn-danger shadow" name="delete" value="削除">
          </form>
        </div>
        <?php $i++ ?>
        @endforeach
      </div>
    </div>
    <div class="form-group col-9">
      {{ Form::open(['url' => "/targets/{$target->id}/tasks", 'method' => 'post', 'class' => 'form']) }}
        <div class="row shadow">
      {{ Form::text('task', null, ["placeholder" => 'タスクを入力してください', 'class' => 'input']) }}
      {{ Form::submit('追加', ['class' => "btn btn-primary"]) }}
      </div>{{ Form::close() }}
    </div>
  </div>
</div>

@endsection