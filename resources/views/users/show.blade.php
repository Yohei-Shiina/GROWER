@extends('layout')

@section('content')

<div class="user-show">
<h4 class="page">マイページ</h4>
{{ Form::open(['url' =>'/upload', 'method' => 'post', 'files' => 'true']) }}
  {{-- 成功時のメッセージ --}}
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- エラーメッセージ --}}
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <div class="block1 row col-12">
    <div class="user-photo col-5">
      @if ($user->avatar_filename)
      <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar" />
      @endif
      <div class="file">{{ Form::file('file') }}</div>
      <div>{{ Form::submit('アップロード', ['class' => 'btn btn-primary shadow']) }}</div>
    </div>
    {{ Form::close()}}


    <div class="user-description col-5">
      <p class="list-group-item shadow">{{ $user->name}} さんのページ</p>
      <p class="list-group-item shadow">達成目標数　{{$user->targets()->where('status', true)->count()}}回</p>
    <p class="list-group-item shadow">やりたいことリスト　{{ $user->buckets()->count() }}個</p>
    </div>

  </div>

  <div class="block2">
    <h4>現在取り組んでいる目標</h4>
    <div class="lists">
      @foreach ($targets as $target)
      @unless($target->status == true)
      <div class="list">
        <div class="content list-group-item col-10 shadow">
          <div class="created-time">{{$target->created_at}}</div>
          <span class="goal">{{$target->goal}}</span>
          <a class="badge badge-primary" href="/targets/{{$target->id}}">詳細</a>
        </div>
      </div>
      @endunless
      @endforeach
    </div>
  </div>
  <div class="block3 row">
    <div class="card text-center col-sm-10 col-md-4 col-lg-3 shadow">
        <div class="card-body">
          <h5 class="card-title">目標を作成する</h5>
          <a href="/targets/create" class="btn btn-primary">Visit this page</a>
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