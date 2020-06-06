

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,       initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	
</head>
<body>
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
     
        ?>
        
        	<a href="order.php">

            <img src='<?php echo $image_src; ?>' >
        
            <h4 style="text-align: center;"> <?php echo $name ?></h4>
            <h4 style="text-align: center;"> <?php echo $price ?></h4>
            </a>
            <?php 
            }
            ?>
        
        	
        
        
        
        
     
		
	</div>


</body>
</html>