@extends('layout')

@section('content')
<div class="welcome-page">
  <h1>WELCOME&nbsp;
    TO&nbsp;
    GROWER</h1>
  <p>今度こそはたくさんのことにチャレンジして最高の１日、そして最高の１年にするぞ！
    <br>そう意気込んだものの、気づいたら忘れていたり、気分でつい他のことをしていたら、いつのまにか１日が終わりかけてた。明日こそは…。
    <br>そんな経験したことありませんか？
    <br>GROWERなら大丈夫。あなたの達成したい目標とタスクを「視覚化」、管理することで、目標達成まで迷わずにあなたを手助けしてくれるツールです。
    <br>
  </p>
  <div class="explanation clearfix">
    <span><a href="/targets" class="btn btn-primary">目標リスト</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;目標を確認！タスクを立てて、自分だけのロードマップを作ろう！</span>
    <span><a href="/buckets" class="btn btn-primary">バケットリスト</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;あなたが人生でやってみたいことを投稿しよう！</span>
    <span><a href="/users/{{Auth::user()->id}}" class="btn btn-primary">マイページ</a>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;現在の進行状況がわかるよ！（随時機能追加予定！）</span>
  </div>

</div>
@endsection