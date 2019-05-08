@extends('layout')

@section('content')
<div class="create-page"> 
  <h4 class="page">目標を作成</h4>

  <div class="form-group">{{ Form::open(['url' => '/targets', 'method' => 'post']) }}
  
  <div class="goal">{{ Form::label('goal', '目標')}}</div>
  <div>{{ Form::text('goal', null, ["placeholder" => '目標を入力してください', "class" => "goal col-4"]) }}</div>
  
  <div class="date">{{ Form::label('date', '期限') }}</div>
  <div>{{ Form::date('date', new DateTime(), ["class" => "date"])}}</div>
  
  <div class="time">{{ Form::label('time', '時間') }}</div>
  <div class="time-input">{{ Form::input('time','time', "00:00")}}</div>
  
  <div>{{ Form::submit('作成する', ["class" => "btn btn-primary"]) }}</div>
  {{ Form::close()}}</div>
</div>

@endsection