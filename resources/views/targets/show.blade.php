@extends('layout')

@section('content')

<div> {{$target->goal}} </div> 

<a href="/targets/{{$target->id}}/edit">クエストの編集</a>
<a href="/targets/{{$target->id}}/delete">クエストの削除</a>

@endsection