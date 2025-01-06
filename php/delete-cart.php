<?php
require_once 'connection.php';
$c_id=$_GET['c_id'];

$sql_price = "SELECT productid, quantity FROM cart WHERE id = ?";
$stmt_price = $connection->prepare($sql_price);
$stmt_price->bind_param("s", $c_id);
$stmt_price->execute();
$result_price = $stmt_price->get_result();
$row_price = $result_price->fetch_assoc();
$item_qty = $row_price['quantity']; 
$item_id = $row_price['productid']; 


$sql4 = "UPDATE `items` SET quantity=quantity + '$item_qty' where id=$item_id;";#add the new item to the database
$stmt4 = $connection->prepare($sql4);
$stmt4->execute();

$query="delete from cart where id=$c_id";
if(mysqli_query($connection, $query))
{
header("location: ../cart.php");
}
else
{
echo "deletion error";
}
?>