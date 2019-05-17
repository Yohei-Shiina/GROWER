@extends('layout')

@section('content')
<div class="welcome-page">
  <h1>WELCOME&nbsp;
    TO&nbsp;
    GROWER</h1>
  <div class="explanation clearfix">
    <div>・目標リスト&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;&nbsp;&nbsp; 目標を確認。タスクを立てて、自分だけのロードマップを作ろう！</div>
    <div>・バケットリスト -&nbsp;&nbsp;&nbsp; あなたが人生でやってみたいことを投稿しよう</div>
    <div>・マイページ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;&nbsp;&nbsp; 自分を見える化しよう！（随時機能追加予定！）</div>
  </div>
  <div class="buttons row">
    <div class="card text-center col-sm-10 col-md-4 col-lg-3 ml-md-5 shadow">
      <div class="card-body">
        <a href="/targets" class="btn btn-primary">目標リスト</a>
      </div>
    </div>

    <div class="card text-center col-sm-10 col-md-4 col-lg-3 ml-md-5 shadow">
      <div class="card-body">
        <a href="/buckets" class="btn btn-primary">バケットリスト</a>
      </div>
    </div>
    
    <div class="card text-center col-sm-10 col-md-4 col-lg-3 ml-md-5 shadow">
      <div class="card-body">
        <a href="/user/{{Auth::user()->id}}" class="btn btn-primary">マイページ</a>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

</div>
@endsection