@extends('layout')

@section('content')
    

@foreach ($targets as $target)
<div> {{$target->goal}} </div> 

<a href="/targets/{{$target->id}}">クエストに詳細</a>

@endforeach
<a href="/targets/create">クエストを依頼する</a>


@endsection