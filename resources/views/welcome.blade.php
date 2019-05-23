@extends('layout')

@section('content')
<div class="welcome-page">
  <h1>WELCOME&nbsp;
    TO&nbsp;
    GROWER</h1>
  <p>
    <br><strong>こんにちは {{Auth::user()->name}} さん!&nbsp;&nbsp;&nbsp;GROWERへようこそ。</strong>
    <br>このアプリは自己管理 & 成長ツールです。
    <br>自分の達成したい目標やタスクを視覚化して管理し、あなたの目標や夢の達成をお手伝いします。
    <br>人生で一度はやってみたいことをバケットリストに残しましょう！意識をすれば人は自然とそこへ向かっていく生き物です。
    <br>まずは、思うがままにアプリで遊んでみましょう！
    <br>
  </p>
  <div class="explanation clearfix">
    <span><a href="/targets" class="btn btn-primary">目標リスト</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;目標を確認！タスクを立てて、自分だけのロードマップを作ろう！</span>
    <span><a href="/buckets" class="btn btn-primary">バケットリスト</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;あなたが人生でやってみたいことを投稿しよう！</span>
    <span><a href="/users/{{Auth::user()->id}}" class="btn btn-primary">マイページ</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;現在の進行状況がわかるよ！（随時機能追加予定！）</span>
  </div>

</div>
@endsection