<?php
include "connection.php";
session_start();
$item_id=$_GET['id'];
$u_id = $_SESSION['u_id'];
$time= time();
$qty = $_POST['quantity'];

if(isset($_POST["selected_size"]) && $_POST["selected_size"] != ""){
    $item_size = $_POST['selected_size'];
}
else{
    $item_size="";
}

$sql4 = "INSERT INTO `cart` (`userid`, `productid`,`quantity`, `addedat`,`item_size`) VALUES (?,?,?,?,?);"; #add to the cart
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("sssss",$u_id,$item_id,$qty,$time,$item_size);
$stmt4->execute();
header('location: ../cart.php');
	


?>