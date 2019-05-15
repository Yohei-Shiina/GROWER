

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
    var ol = $('ol');
    var list = 
      `<div class="lists row col-lg-6 col-sm-12">
          <li class="list-group-item shadow col-8">${wish}</li>
          <div class="${responseData.id}">
            <input type="submit" class="change btn btn-primary shadow" name="change" value="達成">
            <input type="submit" class="change btn btn-danger shadow" name="delete" value="削除">
          </div>
        </div>`;
    
    ol.append(list);
  }).fail(function(error) {
    console.log(error);
  });
}
function controlBtn(btn, id) {
  if(btn.attr('name') == "change"){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "PUT",
      dataType: "json",
      url: "/buckets/" + id,
    }).done(function(){
      var budge = '<span class="badge badge-warning">達成!!</span>';
      var list = $(btn.parent().siblings()[0]);
      if(btn.attr('class') == "change btn btn-primary shadow"){
        btn.removeClass().addClass("change btn btn-default shadow");
        list.prepend(budge);
        btn.val('未達');
      }else{
        btn.removeClass().addClass("change btn btn-primary shadow");
        list.children('span').remove();
        btn.val('達成');

      }
    });
  }
  else{
    console.log('delete');
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "DELETE",
      dataType: "json",
      url: "/buckets/" + id,
    }).done(function(){
      btn.parent().parent().remove();
    });
  }
}