@extends('layout')

@section('content')

<div class="show-page">
  <h4 class="page">目標の詳細</h4>
  <div class="row"> 
    <div class="title-unit col-lg-8 col-md-12">
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
        @endunless
        {{ $target->goal }}
      </div>
    </div>

    <div class="due-unit col-lg-3 col-md-12">
      <h6>制限時間</h6>
    <span class="due-time list-group-item rounded" id="dueTime" data-id="{{$target->id}}">{{ $target->dueTime() }}</span>

      <h6>経過時間</h6>
    <span class=" passed-time list-group-item rounded" id="passedTime" data-id="{{$target->id}}">{{$target->passedTime()}}</span>
    </div>
  
    <div class="task-unit col-md-12">
      <h4>タスク</h4>

      <div class="tasks">
        <?php $i = 1; ?>
        @foreach($tasks as $task)
        <div class="list breadcrumb bg-white">
          <div>
            @unless($task->status == false)
              <p class="badge badge-warning">達成!!</p>
            @endunless
            {{ $task->task }}
          </div>
          <div class="btns">
            <input type="hidden" data-taskId="{{$task->id}}" class="hidden">
            <input type="hidden" data-targetId="{{$task->target_id}}" class="hidden">
            @unless($task->status == true)
            <input type="submit" class="btn-primary shadow" name="change" value="達成?">
            @endunless
            <input type="submit" class="btn-danger shadow" name="delete" value="削除">
          </div>
        </div>
        <?php $i++ ?>
        @endforeach
      </div>

    </div>

    <div class="form-group col-9">
      {{-- <form action="/targets/{{$target->id}}/tasks" method="POST" class="form"> --}}
        {{ csrf_field() }}
        <div class="row shadow">
          <input type="hidden" value="{{$target->id}}" class="hidden">
          <input placeholder="タスクを入力してください" class="input" name="task" type="text">
          <input type="submit" class="btn btn-primary" id="task-add" value="追加">
        </div>
      {{-- </form> --}}
    </div>
  </div>
</div>

@endsection
