<?php 
session_start();


$product_id = array();
//session_destroy();

if(filter_input(INPUT_POST, 'add_to_cart')){
  if(isset($_SESSION['shopping_cart'])){

  	$count = count($_SESSION['shopping_cart']);
    $product_id = array_column($_SESSION['shopping_cart'],'id');

    if(!in_array(filter_input(INPUT_POST, 'id'), $product_id)){

    	$_SESSION['shopping_cart'][$count] = array(
    		  'id' => filter_input(INPUT_POST, 'id'),
              'name'=>filter_input(INPUT_POST, 'name'),
              'price'=>filter_input(INPUT_POST, 'price'),
              'quantity'=>filter_input(INPUT_POST, 'quantity')


    	);
    }

    else{
    	echo '<script> alert("item already added ") </script> ';
    	echo '<script> window.location = "order.php" </script> ';

    }
}

	
    
  else{

    $_SESSION['shopping_cart'][0] = array(
      'id' => filter_input(INPUT_POST, 'id'),
      'name'=>filter_input(INPUT_POST, 'name'),
      'price'=>filter_input(INPUT_POST, 'price'),
      'quantity'=>filter_input(INPUT_POST, 'quantity')

    );
  }
 

}
if ( isset($_GET["id"]) ){
  foreach($_SESSION["shopping_cart"] as $k => $v) {
			if($_GET["id"] == $k){
				unset($_SESSION["shopping_cart"][$k]);
			}
		}
	}
if(filter_input(INPUT_POST, 'checkout')){
	echo '<script> alert(" Thanks For Shopping With US ") </script> ';
    echo '<script> window.location = "index.html" </script> ';


	}


 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,       initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/order.css">
	
</head>
<body>
	<?php 
	 
	if(!isset($_SESSION['userid'])){
		echo '<script> alert(" Singup and Login Before Order ") </script> ';
    	echo '<script> window.location = "index.html" </script> ';
	}
	else{
		
 ?>

	<nav class="navbar navbar-expand-sm  nav">
  <li class="nav-item active">
      <a class="nav-link" href="index.html">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="menu.php">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="order.php">Order</a>
    </li>
    
    
    <li class="nav-item">
      <a class="nav-link" href="admin_insert.php">Admin </a>
    </li>
  

  </ul>
  <form class="form-inline ml-auto" action="login.php" method="post">
  	<input type="text" name="name">
  	<input type="password" name="password">
  	<button type="submit" name="login"> login</button>
  	

  </form>
  <form style="padding-left:5px; " action="logout.php" method="post">
  	
  	
  	<button type="submit" name="logout">logout</button>
  </form>

</nav>

<!-- Black with white text -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">...</nav>



	<div class="container">
		<?php

        include('connection.php');

        $sql = "select * from menu ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        while($row = mysqli_fetch_array($result)) {
 	 	$image_src = $row['image'];
        $name = $row['name'];
        $price = $row['price'];
        $id = $row['id'];
     
        ?>
        
        	<form method="post" action="order.php?action=add$id=<?php   echo $row['id']; ?> ">

     	   
     		
     		    <img src='<?php echo $image_src; ?>' >
                <h4> <?php echo $name ?></h4>
                <h4> <?php echo $price ?></h4>
               
                <input type="text" name="quantity" value="1">
                <input type="hidden" name="id" value=" <?php echo $id ?> ">
                <input type="hidden" name="name" value=" <?php echo $name ?> ">
                <input type="hidden" name="price" value="<?php echo $price ?>">
                <input type="submit" name="add_to_cart" >
     	
     	   
     	</form>
            <?php 
            }
            ?>
      
     
		
	</div>
	<div class="t">
 	<table class="table">
 		<tr> <th colspan="5"> <h3> Orser Details</h3></th> </tr>
 		<tr>
 			<th> Product Name</th>
 			<th> Product Quantity</th>
 			<th> Price</th>
 			<th> Total</th>
 			<th> Action</th>

 		</tr>
 		<?php 
 		if(!empty($_SESSION['shopping_cart'])){
 			$total = 0;

 			foreach ($_SESSION['shopping_cart'] as $key => $product){
 		
 		 ?>
 		<tr>
 		 	<td> <?php echo $product['name']; ?> </td>
 		 	<td> <?php echo $product['quantity']; ?> </td>
 		 	<td> <?php echo $product['price']; ?> </td>

 		 	<td> <?php echo number_format($product['quantity'] * $product['price'], 2 ); ?> </td>
 		 	<td>
 		 		<a href="order.php?id=<?php echo $product['id']; ?>"> Remove </a>

 		 	</td>
 		 
 		 </tr>
 		 <?php
 		 $total = $total + ($product['quantity'] * $product['price']); 
 		}



 		  ?>
 		 <tr>
 		 	<td colspan="3" align="right"> Total </td>
 		 	<td align="right"> <?php echo number_format($total, 2); ?></td>
 		 	<td></td>
 		 	

 		 </tr>
 		 <tr>
 		 	<td colspan="5">
 		 		<?php 
 		 		if (isset($_SESSION['shopping_cart'])):
 		 		if (count($_SESSION['shopping_cart'])>0):

 		 		?>

 		 	    <form action="checkout.php" method="post">
 		 	    	<input type="hidden" name="user_id" value=" <?php echo $_SESSION['userid'];  ?> ">
 		 	    	
 		 	    	<input type="hidden" name="price" value=" <?php echo $total  ?> ">
 		 	    	
 		 	    	<input type="submit" name="checkout" value="checkout">
 		 	    </form>
 		 	    <?php

 		 	    endif;
 		        endif;

 		 	     ?>
 		 
 		 	</td>


 		 </tr>
 		 <?php 

 		}
 		 ?>
 		 
 	    </table>

 
</div>




	<?php 
}

	 ?>


</body>
</html>