  // 経過時間
function passedTime(){
  var target_id = $('#passedTime').attr('data-id');

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/time",
    data: {
      "id" : target_id,
    }
  }).done(function(reponseData){

    document.getElementById('passedTime').innerHTML = reponseData;
  }).fail(function(error){
    console.log(error);
  });
}
  // 期限
function dueTime(){
  var target_id = $('#dueTime').attr('data-id');

  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/duetime",
    data: {
      "id" : target_id,
    }
  }).done(function(reponseData){

    document.getElementById('dueTime').innerHTML = reponseData;
  }).fail(function(error){
    console.log(error);
  });
}

$passedTime = document.getElementById('passedTime');
$dueTime = document.getElementById('dueTime');
if($passedTime){
  setInterval('passedTime()', 1000);
}
if($dueTime){
  setInterval('dueTime()', 1000);
}