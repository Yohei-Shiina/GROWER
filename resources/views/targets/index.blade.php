@extends('layout')

@section('content')
    

@foreach ($targets as $target)
<div> {{$target->goal}} </div> 
<a href="/targets/{{$target->id}}">詳細</a>

@endforeach
<a href="/targets/create">目標を設定する</a>


@endsection