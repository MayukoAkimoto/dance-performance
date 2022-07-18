$(function(){
    $(".commentmore").on("click", function() {
        ajaxComment();
      
        function ajaxComment(){
        var add_content = "";
        var count = $("#count").val();
        number = Number(count);
        console.log(number);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
            type: "get",
            url: "/comment/{performance}/detail/" + number,
            dataType: 'json',
        }).done(function(data){
              $.each(data,function(key, value){
                add_content += "<th scope='col' class='com7><div class='com-box'><div class=7com-icon-box'>"
                                +"<img src='http://127.0.0.1:8000/"+value.icon+"' id='com-icon' >"
                                +"<p class='com-name'>"+value.name+"</p></div><div>"
                                +"<p class='com-date7>"+value.created_at+"</p></div></div><div>"
                                +"<p class='com-com'>"+value.comment+"</p></div></th>"
              })
            $("#content").append(add_content);
            number += 5;
            $("#count").val(number);
        }).fail(function(e){
            console.log(e);
        })
      
      }
      
      })
      

})