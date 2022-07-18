// スクロールされた時に実行
$(function(){
  $(".more").on("click", function() {
    ajaxManegertop();
//スクロール
  /*$(window).on('scroll', function(){
    var docHeight = $(document).innerHeight(), 
        windowHeight = $(window).innerHeight(), 
        pageBottom = docHeight - windowHeight; 
    if(pageBottom <= $(window).scrollTop()) {
      ajaxManegertop();
    }*/


function ajaxManegertop() {
  var add_content = "";
  var add_id = "";
  var count = $("#count").val();
  number = Number(count)
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
      type: "get",
      url: "/" + number,
      dataType: 'json',
  }).done(function(data){
        $.each(data,function(key, value){
          add_content += "<tr><th scope='col'>"+value.date1+"/"+value.date2+"</th>"
                        +"<th scope='col'>"+value.title+"</th>"
                        +"<th scope='col'><a href='http://127.0.0.1:8000/performance/"+value.id+"/detail'>詳細</a></th>"
                        +"<th scope='col'><a href='http://127.0.0.1:8000/edit_performance/"+value.id+"'>更新</a></th></tr>";
          add_id += "<p>"+value.id+"</p>";

      })
      $("#content").append(add_content);
      number += 10;
      $("#count").val(number);
  }).fail(function(e){
      console.log(e);
  })
}
})
})
