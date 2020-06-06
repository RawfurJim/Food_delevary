<?php
include('connection.php');
if(isset($_POST['submit'])){

$n = $_POST['name'];
$p = $_POST['password'];

$sql= "SELECT * FROM admin WHERE name = '$n' AND password = '$p' limit 1 ";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$pass = $row['password'];
	if(mysqli_num_rows($result)==1){
		session_start();
		$_SESSION['admin_id']=$row['id'];
		$_SESSION['admin_name']=$row['name'];

		header("location:admin.php");
	}
	
	else{
		echo '<script> alert("Invalid UserId Or Password ") </script> ';
    	echo '<script> window.location = "index.html" </script> ';
	}
}

 ?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


      <form action="admin_check.php" method="post">
        <input type="text" name="name" placeholder=" Enter Name">
        
        
        <input type="password" name="password" placeholder=" Enter password">
        <input type="submit" name="submit">
    </form>
    <form action="admin_logout.php" method="post">
    	<input type="submit" name="logout" value="logout">
    </form>
    
  
</body>
</html>

