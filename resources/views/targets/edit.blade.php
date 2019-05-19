@extends('layout')

@section('content')
<div class="create-page"> 
  <h4 class="page">目標を編集<span> 目標を編集しよう！</span></h4>
    <div class="form-group">{{ Form::open(['url' => "/targets/$target->id", 'method' => 'patch']) }}
    
    <div class="goal">{{ Form::label('goal', '目標')}}</div>
    <div>{{ Form::text('goal', $target->goal, ["placeholder" => '目標を入力してください', "class" => "goal col-4"]) }}</div>
    
    <div class="date">{{ Form::label('date', '期限') }}</div>
    <div>{{ Form::date('date', $target->date, ["class" => "date"])}}</div>
    
    <div class="time">{{ Form::label('time', '時間') }}</div>
    <div class="time-input">{{ Form::input('time', 'time', $target->time)}}</div>
    
    <div>{{ Form::submit('編集する', ["class" => "btn btn-primary"]) }}</div>
    {{ Form::close()}}</div>
@endsection