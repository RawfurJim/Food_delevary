<?php
session_start();
include("connection.php");

if(isset($_POST['submit'])){
 
  $image = $_FILES['image']['name'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query =" INSERT INTO menu (image, name, price) VALUES ('$image','$name','$price')";
     mysqli_query($conn,$query);
  
     // Upload file
     move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);

  }
 
}
?>


<html>
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
  </nav>
		
<form method="POST" action="admin_insert.php" enctype="multipart/form-data">
 <input type="file" name="image">
 <input type="text" name="name">
 <input type="text" name="price">

 <input type="submit" name="submit">
</form>
<?php  
 }
 ?>

</body>
</html