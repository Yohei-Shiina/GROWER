
// やりたいとリストの投稿
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
            <input type="submit" class="btn btn-primary shadow" id="bucket" name="change" value="達成">
            <input type="submit" class="btn btn-danger shadow" id="bucket" name="delete" value="削除">
          </div>
        </div>`;
    
    ol.append(list);
  }).fail(function(error) {
    console.log(error);
  });
}
// やりたいことリストの達成、削除ボタン押下時
function controlBtn(btn, id) {
  if(btn.attr('name') == "change"){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "PUT",
      dataType: "json",
      url: "/buckets/" + id,
    }).done(function(){
      // console.log('Y');
      var budge = '<span class="badge badge-warning">達成!!</span>';
      var list = $(btn.parent().siblings()[0]);
      if(btn.attr('class') == "btn btn-primary shadow"){
        btn.removeClass().addClass("btn btn-default shadow");
        list.prepend(budge);
        btn.val('未達');
      }else{
        btn.removeClass().addClass("btn btn-primary shadow");
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
//  タスクの投稿
function postTask(text, id) {
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    type: "POST",
    dataType: "json",
    url: `/targets/${id}/tasks`,
    data: {
      "task": text,
    }
  }).done(function(task) {
    var html =
    `<div class="list breadcrumb bg-white">
      <div>
        ${ task.task }
      </div>
      <div class="btns">
        <input type="hidden" data-taskId="${task.id}" class="hidden">
        <input type="hidden" data-targetId="${task.target_id}" class="hidden">
        <input type="submit" class="btn-primary shadow" name="change" value="達成?">
        <input type="submit" class="btn-danger shadow" name="delete" value="削除">
      </div>
    </div>
    `; 
    $('.tasks').append(html);
  }).fail(function(error) {
    console.log(error);
  });
}
//  タスクの達成、削除ボタン押下時
function taskButton(btn, target_id, task_id) {
  if(btn.attr('name') == "change"){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "PUT",
      dataType: "json",
      url: "/targets/" + target_id + "/tasks/" + task_id,
    }).done(function(){
      var budgePos = btn.parent().siblings()[0];
      var budge = `<p class="badge badge-warning">達成!!</p>`
      $(budgePos).prepend(budge);
      btn.remove();
    }).fail(function(error) {
      console.log(error);
    });
  }
  else{
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: "DELETE",
      dataType: "json",
      url: "/targets/" + target_id + "/tasks/" + task_id,
    }).done(function(){
      btn.parent().parent().remove();
    }).fail(function(error) {
      console.log(error);
    });
  }
}
