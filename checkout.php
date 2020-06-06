<?php 
session_start();

 include('connection.php');
 $userid = $_POST['user_id'];
 $price = $_POST['price'];
 //echo $price;
    foreach ($_SESSION['shopping_cart'] as $key => $product){
        $k[] = $key;
        $v[] =$product['name'];
        $p[] =$product['price'];

        //echo $n;
    }
    $v = implode(",", $v);
    $p = implode(",", $p);
    
   $sql = "INSERT INTO order_detail (userid , product_name , product_price , total) Values ('$userid','$v','$p','$price')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script> alert(" Thank you For Order From US ") </script> ';
        echo '<script> window.location = "index.html" </script> ';
    }
 
?>
   
  

