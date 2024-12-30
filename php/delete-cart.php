<?php
require_once 'connection.php';
$c_id=$_GET['c_id'];
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