<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

          
 	<table class="table">
 		<tr> <th colspan="5"> <h3> Order Details</h3></th> </tr>
 		<tr>
 			<th> Order ID</th>
 			<th> User Id</th>
 			<th> Product Name</th>
 			<th> Product Price</th>
 			<th> Total</th>
 			<th> Date & time</th>

 		</tr>
 		<?php

        include('connection.php');

        $sql = "select * from order_detail ";
        $result = mysqli_query($conn,$sql);
        //$row = mysqli_fetch_array($result);

        while($row = mysqli_fetch_array($result)) {
        	$id = $row['id'];
            
            $userid = $row['userid'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $total = $row['total'];
            $time = $row['date&time'];
        
      
 	
 		
 		 ?>
 		<tr>
 		 	<td> <?php echo $id ?> </td>
 		 	<td> <?php echo $userid ?> </td>
 		 	<td> <?php echo $name ?> </td>
 		 	<td> <?php echo $price ?> </td>
 		 	<td> <?php echo $total ?> </td>
 		 	<td> <?php echo $time ?> </td>
 		 	

 		</tr>	
 		<?php } ?>
 		<form action="admin_logout.php" method="post">
    	<input type="submit" name="logout" value="logout">
        </form>
 		 
 		
 		 
 	    </table>




</body>
</html>
