@extends('layout')

@section('content')
<div class="buckets-index">
  <h4 class="page">バケットリスト</h4>
  
  <div class="form-group">
      <div class="form">
        <div class="row col-5">
          <input type="text" class="wish input col-sm-8 col-md-7 col-lg-10 shadow">
          <input class="btn btn-primary shadow" id="add" type="submit" value="追加">
        </div>
      </div>
  </div>

  


  <div class="wishes">
    <ol class="row">
      @foreach($buckets as $bucket)
      
      <div class="lists row col-lg-6 col-sm-12">
        <li class="list-group-item shadow col-8">
          @if($bucket->status == true)
          <span class="badge badge-warning">達成!!</span>
          @endif
          {{ $bucket->wish }}
        </li>

        <form method="post" action="/buckets/{{$bucket->id }}/form" class="btns">
          {{ csrf_field() }}
          @if($bucket->status == false)
          <input type="submit" class="btn btn-primary shadow" name="change" value="達成">
          <input type="submit" class="btn btn-danger shadow" name="delete" value="削除">
          @else
          <input type="submit" class="btn btn-default shadow" name="change" value="未達">
          <input type="submit" class="btn btn-danger shadow" name="delete" value="削除">
          @endif
        </form>
      </div>
      @endforeach
    </ol>
  </div>
</div>
@endsection