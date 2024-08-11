<?php

session_start();


//if (isset($_SESSION['cart'])){
 //  var_dump($_SESSION['cart']);
  //}

?>


  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Cart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


</head>
<body>


   <?php include("header.php");   ?>


  

  <div class="container">
    <div class="col-md-12">
     <table class="table table-bordered my-5">
       <tr>   
        <th>ITEM ID</th>
        <th>ITEM NAME</th>
        <th>ITEM PRICE</th>
        <th>ITEM QUANTITY</th>
        <th>ACTION</th>
      </tr>
      

        	<?php

        	$total_price = 0;
            $total_item = 0;

         if(!empty($_SESSION['cart'])) {
            
            foreach ($_SESSION['cart'] as $key => $value){ ?>

            	<tr>
            		<td><?php echo $value['id'];  ?></td>
            		<td><?php echo $value['name'];  ?></td>
            		<td><?php echo $value['price'];  ?></td>
                  <td><?php echo $value['quantity'];  ?></td>
                  <td>
                   <button class="btn btn-danger remove" id="<?php echo $value['id']; ?>">Remove</button>
                  </td>
                 
            	</tr>

            	<?php

            	$total_price = $total_price + ($value['quantity'] * $value['price']);

                $total_item = $total_item + 1;

            	?>

            



           <?php }

         }else{ ?>

         	<tr>
              <td class="text-center" colspan="5">NO  ITEM SELECTED</td>


         	</tr>

         <?php }


        	?>
        		<tr>
            		<td colspan="2"></td>
            		<td>Total Price</td>
            		<td><?php echo number_format($total_price,2) ;?></td>
            	    <td>
                   <button class="btn btn-warning clearall">Clear All</button>
                  </td>
            	</tr>



     </table>
    </div>
  </div>


<script type="text/javascript">
	$(document).ready(function(){

     
     $(".remove").click(function(){
     	
       var id = $(this).attr("id");
       var action = "remove";

        $.ajax({
        method:"POST",
        url:"action.php",
        data:{id:id,action:action},
        success:function(data){
        	alert("You have Removed item");

        }

      });



     });

     
     $(".clearall").click(function(){
        
        var action = "clear";

      $.ajax({
        method:"POST",
        url:"action.php",
        data:{action:action},
        success:function(data){
        	alert("You have cleared all item");

        }

      });

     });


	});


</script>




</body>
</html>