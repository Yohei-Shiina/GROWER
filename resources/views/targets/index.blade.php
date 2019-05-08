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
      <span class="badge badge-warning">未達</span>
      <span class="badge badge-danger">完了</span>
      <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細</a>
    </div>
    @endforeach
  </div>
  <div class="options row">
    <div class="card text-center col-sm-10 col-md-4 col-lg-3">
      <div class="card-body">
        <h5 class="card-title">目標を立てる</h5>
        <a href="/targets/create" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

    <div class="card text-center col-sm-10 col-md-4 col-lg-3">
      <div class="card-body">
        <h5 class="card-title">マイページを見る</h5>
        <a href="#" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

    <div class="card text-center col-sm-10 col-md-4 col-lg-3">
      <div class="card-body">
        <h5 class="card-title">やりたいことをみる</h5>
        <a href="#" class="btn btn-primary">Visit this page</a>
      </div>
    </div>

  </div>
</div>
@endsection