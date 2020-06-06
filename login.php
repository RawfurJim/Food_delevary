<?php 

if(isset($_POST['name'])&&isset($_POST['password'])){

	$name=$_POST['name'];
	$password=$_POST['password'];
	
	include('connection.php');

	
	
	$sql= "SELECT * FROM signup WHERE name = '$name' ";

	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	echo $row['name'];
	echo $row['password'];
	$pass = $row['password'];
	$a = password_verify($password, $pass );
	if($a==1){
		session_start();
		$_SESSION['userid']=$row['id'];
		$_SESSION['username']=$row['name'];

		header("location:order.php");
	}
	
	else{
		echo '<script> alert("Invalid UserId Or Password ") </script> ';
    	echo '<script> window.location = "index.html" </script> ';
    	
	}
}

?>
    	




