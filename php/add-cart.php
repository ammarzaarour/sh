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
$sql_price = "SELECT price,quantity FROM items WHERE id = ?";
$stmt_price = $connection->prepare($sql_price);
$stmt_price->bind_param("s", $item_id);
$stmt_price->execute();
$result_price = $stmt_price->get_result();
$row_price = $result_price->fetch_assoc();
$item_price = $row_price['price']; 

$init_qty= $row_price['quantity'];

$item_pr = (int)$item_price; 
$qtyy = (int)$qty; 
$price = $item_pr * $qty;
$remain_qty = $init_qty-$qtyy;

// Update the quantity in the items table
$sql5 = "UPDATE `items` SET `quantity` = ? WHERE `id` = ?;";
$stmt5 = $connection->prepare($sql5);
$stmt5->bind_param("ss", $remain_qty, $item_id);
$stmt5->execute();

$sql4 = "INSERT INTO `cart` (`userid`, `productid`,`quantity`, `addedat`,`item_size`,`price`) VALUES (?,?,?,?,?,?);"; #add to the cart
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ssssss",$u_id,$item_id,$qty,$time,$item_size,$price);
$stmt4->execute();
header('location: ../cart.php');
	


?>