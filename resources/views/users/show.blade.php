@extends('layout')

@section('content')

<div class="user-show">
  <h4 class="page">マイページ<span> あなたのページです。取り組み中の目標や達成数などが確認できるよ！</span></h4>

<div class="user row col-12">
  <div class="user-photo col-md-6 col-sm-12">
  <img src="{{ $image }}" alt=hoge">
    <form action="/upload" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="file" name="image">
      <input type="submit" value="アップロード" class="btn btn-primary">
    </form>
  </div>
  <div class="user-description col-6">
    <p class="list-group-item shadow">{{ $user->name }} さんのページ</p>
    <p class="list-group-item shadow">目標の達成数　{{$user->targets()->where('status', true)->count()}}回</p>
    <p class="list-group-item shadow">やりたいことリスト　{{ $user->buckets()->count() }}個</p>
  </div>
</div>      

  <div class="goals">
    <h5>現在取り組んでいる目標</h5>
    <div class="lists">
      @foreach ($targets as $target)
        @unless($target->status == true)
        <div class="list">
          <div class="content list-group-item col-12 shadow">
            <div class="created-time">{{$target->created_at}}</div>
            <span class="goal">{{$target->goal}}</span>
            <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細を見る</a>
          </div>
        </div>
        @endunless
      @endforeach
    </div>
  </div>
</div>
@endsection