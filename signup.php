
<?php 
include('connection.php');

if(isset($_POST['name'])&&isset($_POST['email'])){
	$name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    if($name == null || $email == null|| $mobile == null || $password ==null){
    	echo "Fillup All";

	 }
	 	
  	
	elseif(! preg_match("/^([a-zA-Z' ]{4,30})$/",$name)){
        echo 'Enter Valid Name';
    	 }
    elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Enter Valid Name';
    	
    }
    elseif(! preg_match('/^[0-9]{11}+$/', $mobile)){
        echo 'Enter Valid Mobile No';
    	 }

     else{
     	
           

           $sql= "INSERT INTO signup (name, email, mobile, password ) VALUES (?,?,?,?) ";
 
#create prepare statement
           $stmt= mysqli_stmt_init($conn);

#prepare prepare statement
           if(!mysqli_stmt_prepare($stmt, $sql)){

	            echo 'not connected';
	        }

            else{
            	$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
	            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $mobile, $hashed_pass);
	            mysqli_stmt_execute($stmt);
	            header("location: main1.php");
	        }


	}
 
}
?>







