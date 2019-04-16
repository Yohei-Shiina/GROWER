@extends('layout')

@section('content')
    
@foreach ($targets as $target)
{{$target->goal}}    
@endforeach

@endsection