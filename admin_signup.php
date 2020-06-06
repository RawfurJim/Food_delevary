<?php
session_start(); 
include('connection.php');

if(isset($_POST['submit'])){
  $name = $_POST['name'];
   
    $password = $_POST['password'];
    if($name == null || $password ==null){
      echo "Fillup All";

   }
    
    
  elseif(! preg_match("/^([a-zA-Z' ]{4,30})$/",$name)){
        echo 'Enter Valid Name';
       }
   

     else{
      
           
           $sql= "INSERT INTO admin (name,  password ) VALUES (?,?) ";
 
#create prepare statement
           $stmt= mysqli_stmt_init($conn);

#prepare prepare statement
           if(!mysqli_stmt_prepare($stmt, $sql)){

              echo 'not connected';
          }

            else{
              
              mysqli_stmt_bind_param($stmt, "ss", $name, $password);
              mysqli_stmt_execute($stmt);
              header("location: admin.php");
          }


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
  <div class="sign">

      <form action="admin_signup.php" method="post">
        <input type="text" name="name" placeholder=" Enter Name">
        
        
        <input type="password" name="password" placeholder=" Enter password">
        <input type="submit" name="submit">
      </form>
  </div>
<?php } ?>
</body>
</html>