
@extends('layout')

@section('content')
<div> 
  <h1>クエストを依頼する</h1>

  {{ Form::open(['url' => '/targets', 'method' => 'post']) }}
  <div>依頼内容</div>
  {{ Form::text('goal', null, ["placeholder" => '入力必須']) }}
  <div>期限</div> 
  {{-- {{ Form::text('time') }} --}}
  <div>タスク</div>
  {{-- {{ Form::text('task', null, ["placeholder" => 'タスクを入力してください']) }} --}}
  <div>{{ Form::submit('依頼する') }}</div>

  {{ Form::close()}}
</div>

@endsection