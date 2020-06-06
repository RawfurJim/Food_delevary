<?php 

$dataserver='localhost';
$dbr='root';
$dbpass='';
$dbname='food_site';

$conn = mysqli_connect($dataserver,$dbr,$dbpass,$dbname);

if(!$conn){
	echo 'Connection Failed';
	
}


 ?>