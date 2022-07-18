$(function(){
    /*$(".mmm").on("click", function() {
        ajaxTop();*/
        $(window).on('scroll', function(){
          var docHeight = $(document).innerHeight(), 
              windowHeight = $(window).innerHeight(), 
              pageBottom = docHeight - windowHeight; 
          if(pageBottom <= $(window).scrollTop()) {
            var a = $(window).scrollTop();
            console.log(a);
            ajaxTop();
          }
      
        function ajaxTop(){
        var add_content = "";
        var count = $("#count").val();
        number = Number(count);
        console.log(number);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
            type: "get",
            url: "/book-top/" + number,
            dataType: 'json',
        }).done(function(data){
              $.each(data,function(key, value){
                if(value.image === null){
                  add_content += "<th scope='col' class='pfmmore'><div id='photo' class='image'>"
                  +"<img src='http://127.0.0.1:8000/storage/img/noimage.jpg' id='img' ></div>"
                  +"<div class='text'><p class='title'>"+value.title+"</p>"
                  +"<p class='date'>"+value.date1+"</p>"
                  +"<p class='date'>"+value.date2+"</p>"
                  +"<a href='http://127.0.0.1:8000/book/"+value.id+"/detail'>"
                  +"<button class='book-btn'>詳細</button></a></div></th>"

                }else{
                  add_content += "<th scope='col' class='pfmmore'><div id='photo' class='image'>"
                  +"<img src='http://127.0.0.1:8000/"+value.image+"' id='img' ></div>"
                  +"<div class='text'><p class='title'>"+value.title+"</p>"
                  +"<p class='date'>"+value.date1+"</p>"
                  +"<p class='date'>"+value.date2+"</p>"
                  +"<a href='http://127.0.0.1:8000/book/"+value.id+"/detail'>"
                  +"<button class='book-btn'>詳細</button></a></div></th>"
                }
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