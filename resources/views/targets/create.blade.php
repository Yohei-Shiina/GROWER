
@extends('layout')

@section('content')
<div> 
  <h1>目標を掲げる</h1>

  {{ Form::open(['url' => '/targets', 'method' => 'post']) }}
  <div>依頼内容</div>
  {{ Form::text('goal', null, ["placeholder" => '入力必須']) }}
  <div>期限</div> 
  {{ Form::date('date', new DateTime())}}
  {{ Form::input('time','time')}}
  <div>タスク</div>
  {{-- {{ Form::text('task', null, ["placeholder" => 'タスクを入力してください']) }} --}}
  <div>{{ Form::submit('依頼する') }}</div>

  {{ Form::close()}}
</div>

@endsection