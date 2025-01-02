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

// Fetch item price from the database
$sql_price = "SELECT price FROM items WHERE id = ?";
$stmt_price = $connection->prepare($sql_price);
$stmt_price->bind_param("s", $item_id);
$stmt_price->execute();
$result_price = $stmt_price->get_result();
$row_price = $result_price->fetch_assoc();
$item_price = $row_price['price']; 


$item_pr = (int)$item_price; 
$qtyy = (int)$qty; 
$price = $item_pr * $qty;


$sql4 = "INSERT INTO `cart` (`userid`, `productid`,`quantity`, `addedat`,`item_size`,`price`) VALUES (?,?,?,?,?,?);"; #add to the cart
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ssssss",$u_id,$item_id,$qty,$time,$item_size,$price);
$stmt4->execute();
header('location: ../cart.php');
	


?>