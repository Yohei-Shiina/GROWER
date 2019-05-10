@extends('layout')

@section('content')
<div class="index-page">
  <h4 class="page">目標リスト</h4>
  <div class="lists">
    @foreach ($targets as $target)
    <div class="list">
      <div class="content list-group-item col-12 shadow">
        <div class="created-time">{{$target->created_at}}</div>
        <span class="goal">{{$target->goal}}</span>
      </div>
      @if ($target->status == false)
      <span class="badge badge-warning">未達</span>
      @else
      <span class="badge badge-danger">完了</span>
      @endif
      <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細</a>
    </div>
    @endforeach
  </div>
  <div class="options row">
    <div class="card text-center col-sm-10 col-md-4 col-lg-3 shadow">
      <div class="card-body">
        <h5 class="card-title">目標を作成する</h5>
        <a href="/targets/create" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

    <div class="card text-center col-sm-10 col-md-4 col-lg-3 shadow">
      <div class="card-body">
        <h5 class="card-title">マイページ</h5>
      <a href="/users/{{Auth::user()->id}}" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

    <div class="card text-center col-sm-10 col-md-4 col-lg-3 shadow">
      <div class="card-body">
        <h5 class="card-title">バケットリスト</h5>
        <a href="/buckets" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

  </div>
</div>
@endsection