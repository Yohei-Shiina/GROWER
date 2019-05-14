
function postWish(text) {

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: "POST",
    dataType: "json",
    url: "/buckets",
    data: {
      "wish": text,
    }
  }).done(function(responseData) {
    var wish = responseData.wish;
    var status = responseData.status;
    var id;
    var ol = $('ol');
    var nesting = 
      '<div class="lists row col-lg-6 col-sm-12">'
      +'<li class="list-group-item shadow col-8">'
      + '<span class="badge badge-warning">達成!!</span>'
      + wish
      + '</li>'
    ;
    ol.append(nesting);

    // ol.append($('<li/>').append($('<div/>')));
    // ol.append($('<div class="lists row col-lg-6 col-sm-12"/>')
    // .append($('<li class="list-group-item shadow col-8">/')
    // .append($('<span class="badge badge-warning">達成!!</span>/')
    // )));
    // ($('.lists')).append($('<form method="post" action="/buckets/{{$bucket->id }}/form" class="btns">')
    // .append($('<input type="submit" class="btn btn-primary shadow" name="change" value="達成">'))
    // .append($('<input type="submit" class="btn btn-danger shadow" name="delete" value="削除">')
    // ));
    

  }).fail(function(error) {
    console.log(error);
  });
}