@extends('layout')

@section('content')
<div class="user-show">
  <h4 class="page">マイページ</h4>
  <div class="block1 row">
    <img src="" alt="" class="col-3 border">
    <div class="border col-5">
      <p>ユーザーネーム</p>
      <p>目標達成数</p>
      <p>やりたいことリスト</p>
    </div>
  </div>
  <div class="bkock2 border">
    <div class="border">現在取り組んでいる目標</div>
    <div class="border lists">
      @foreach ($targets as $target)
      <div class="list">
        <div class="content list-group-item col-8 shadow">
          <div class="created-time">{{$target->created_at}}</div>
          <span class="goal">{{$target->goal}}</span>
        </div>
        <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細</a>
      </div>
      @endforeach
    </div>
  </div>
  <div class="block3 row">
    <div class="card text-center col-sm-10 col-md-4 col-lg-3">
        <div class="card-body">
          <h5 class="card-title">目標を作成する</h5>
          <a href="/targets/create" class="btn btn-primary">Visit this page</a>
        </div>
      </div>
  
      <div class="card text-center col-sm-10 col-md-4 col-lg-3">
        <div class="card-body">
          <h5 class="card-title">バケットリスト</h5>
          <a href="#" class="btn btn-primary">Visit this page</a>
        </div>
      </div>
  </div>
</div>
@endsection