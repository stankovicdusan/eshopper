$(document).ready(function(){
   $("#cart").click(function(){

       let id_p = $(this).data("id");
       let id_u = $(this).data("user");

       $.ajax({
           url: "models/cart/insert-cart.php",
           method: "post",
           dataType: "json",
           data: {
               id_p: id_p,
               id_u: id_u,
           },
           success: function(){
               console.log("USPESNO");
           },
           error: function(xhr,status,responseText){
               console.log(xhr);
           }
       })
   });

});