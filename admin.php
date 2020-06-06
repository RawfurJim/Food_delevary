<?php session_start(); ?>

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


  
    <a href="admin_insert.php">Insert </a>
    <a href="admin_delete.php">Detete </a>
    
 
    <a  href="checkorder.php">Check Order</a>
    <a href="admin_signup.php">Signup </a>
  <?php } ?>
  <form action="admin_logout.php" method="post">
      <input type="submit" name="logout" value="logout">
    </form>

  
 

</body>
</html>