@extends('layout')

@section('content')
<div class="buckets-index">
  <h4 class="page">バケットリスト</h4>

  <div class="form-group">
    {{ Form::open(['url' => "/buckets", 'method' => 'post']) }}
      <div class="form">
        <div class="row col-5">
          {{ Form::text('wish', null, ["placeholder" => '何したい？', 'class' => 'input col-sm-8 col-md-7 col-lg-10 shadow']) }}
          {{ Form::submit('追加', ['class' => "btn btn-primary shadow"]) }}
        </div>
      </div>
    {{ Form::close() }}
  </div>

  <div class="wishes">
    <ol class="row">
      @foreach($buckets as $bucket)
      <div class="list row col-lg-6 col-sm-12">
        <li class="list-group-item shadow col-8">
          @if($bucket->status == true)
          <span class="badge badge-warning">達成!!</span>
          @else
          @endif
          {{ $bucket->wish }}
        </li>
        <div class="btns">
          @if($bucket->status == false)
          <a class="btn btn-primary shadow" href="/">達成</a>
          <a class="btn btn-danger shadow" href="/">削除</a>
          @else
          <a class="btn btn-danger shadow" href="/">削除</a>
          @endif
        </div>
      </div>
      @endforeach
    </ol>
  </div>
</div>
@endsection