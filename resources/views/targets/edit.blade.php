@extends('layout')

@section('content')
<h1>編集画面</h1>
{{ Form::open(['url' => "/targets/$target->id", 'method' => 'patch']) }}
  <div>依頼内容</div>
  {{ Form::text('goal', $target->goal, ["placeholder" => '入力必須']) }}
  <div>期限</div> 
  {{ Form::date('date', new DateTime())}}
  {{ Form::input('time','time', '00:00')}}
  <div>タスク</div>
  {{-- {{ Form::text('task', null, ["placeholder" => 'タスクを入力してください']) }} --}}
  <div>{{ Form::submit('編集を完了する') }}</div>

  {{ Form::close() }}

@endsection