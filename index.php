<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shopping Cart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
 </head>
<body>

  <?php include("header.php"); ?>

      <div class="container">
      <div class="col-md-12">
      <div class="row show_cart">


        </div>
        </div>
      </div>












<script type="text/javascript">
       
    $(document).ready(function(){    
           show_cart();
   function show_cart(){
    $.ajax({
      method:"POST",
      url:"show_cart.php",
      success:function(data){
        $(".show_cart").html(data);

      } 

    });
  }

  $(document).on("click",".add",function(){

    var id = $(this).attr("id");
    var name = $("#name"+id+"").val();
    var price = $("#price"+id+"").val();
    var quantity = $("#quantity"+id+"").val();

    $.ajax({
      method: "POST",
      url: "ajax_add_to_cart.php",
      data:{id:id,name:name,price:price,quantity:quantity},
      success:function(data){
        alert("You have added new item");
      }





    });

  });

});

   


</script>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>