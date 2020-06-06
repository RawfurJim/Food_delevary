<?php 
session_start();
if(filter_input(INPUT_POST, 'delete')){
	include('connection.php');
	$id=$_POST['id'];
	echo $id;

    $sql= "DELETE FROM menu WHERE id=$id ";
    $result = mysqli_query($conn,$sql);

if ($result) {
    echo '<script> alert("Delete Item Successfully ") </script> ';
    echo '<script> window.location = "admin_delete.php" </script> ';
} else {
  //echo '<script> alert("Product Id Doesnot Match ") </script> ';
  echo '<script> window.location = "admin_delete.php" </script> ';
}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  
    if(!isset($_SESSION['admin_id'])){
    echo '<script> alert(" Login Before Enter AdminPanal  ") </script> ';
    echo '<script> window.location = "index.html" </script> ';
  }
  else{
    ?>

	<nav>

        <a href="admin_insert.php">Insert </a>
        <a href="admin_delete.php">Detete </a>
    
 
        <a  href="checkorder.php">Check Order</a>
         <a href="admin_signup.php">Signup </a>
    </nav>
    <h4> Enter Product Id To Delete The Product </h4>
    <div>
    	<form action="admin_delete.php" method="post">
    		<input type="text" name="id" placeholder="Enter ID">
    		<input type="submit" name="delete">

    	</form>
    	<form action="admin_logout.php" method="post">
    	<input type="submit" name="logout" value="logout">
    </form>
    	


    </div>
    <?php 
}

     ?>



</body>
</html>