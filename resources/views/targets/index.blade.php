@extends('layout')

@section('content')
<div class="index-page">
  <h4 class="page">目標一覧<span> あなたの目標一覧です。"詳細"を確認しよう！</span></h4>
  <div class="lists">
    @foreach ($targets as $target)
    <div class="list">
      <div class="content col-12">
        <div class="created-time">{{$target->created_at->format("Y年m月d日 H:m")}}</div>
        <span class="goal">{{$target->goal}}</span>
      </div>
      <div class="badges">
        @if ($target->status == false)
        <span class="badge badge-warning">未達</span>
        @else
        <span class="badge badge-danger">完了</span>
        @endif
        <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細を見る</a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="explanation clearfix">
    <span><a href="/targets/create" class="btn btn-success">目標を作成する</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;目標を作成して、タスクをこなそう！</span>
  </div>
</div>
@endsection