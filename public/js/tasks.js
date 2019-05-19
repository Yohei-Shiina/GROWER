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
