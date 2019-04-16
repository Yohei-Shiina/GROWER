@extends('layout')

@section('content')
    

@foreach ($targets as $target)
<div> {{$target->goal}} </div> 
@endforeach

@endsection