<?php
include "connection.php";
session_start();
$item_id=$_GET['id'];
$u_id = $_SESSION['u_id'];
$time= time();
$qty = "1";





$sql4 = "INSERT INTO `cart` (`userid`, `productid`,`quantity`, `addedat`) VALUES (?,?,?,?);"; #add the new user to the database
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ssss",$u_id,$item_id,$qty,$time);
$stmt4->execute();
header('location: ../cart.php');
	


?>