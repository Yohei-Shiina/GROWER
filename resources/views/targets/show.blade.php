@extends('layout')

@section('content')

<div class="show-page">
  <h4 class="page">目標の詳細</h4>
  <div class="row"> 
    <div class="title col-lg-8 col-md-12">
      <h4 class="row">目標
        <div class="btns">
          <a href="/targets/{{$target->id}}/edit" class="btn btn-success">編集</a>
          <a href="/targets/{{$target->id}}/delete" class="btn btn-danger">削除</a>
        </div>
      </h4>
      <div class="goal breadcrumb bg-white"> {{$target->goal}} </div>
    </div>

    <div class="due col-lg-2 col-md-12">
      <h6>期限</h6>
      <span class="due-time list-group-item rounded">{{ $target->due()->days . "日"}}</span>
      <h6>経過時間</h6>
      <span class=" passed-time list-group-item rounded">15時間23分</span>
    </div>
    
    <div class="task col-md-12">
      <h4>タスク</h4>
      <div class="tasks">
      <?php $i = 1; ?>
      @foreach($tasks as $task)
      <div class="list breadcrumb bg-white">
        <span>{{ $i }}. {{$task->task}}</span>
        <form method="post" action="/targets/{{$target->id}}/tasks/{{$task->id}}">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-warning">完了</button>
          <button type="submit" class="btn btn-danger">削除</button>
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
      </div>{{ Form::close()}}
    </div>
  </div>
</div>

@endsection