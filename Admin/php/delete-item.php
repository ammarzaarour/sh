<?php
require_once 'connection.php';
$i_id=$_GET['i_id'];
$query="delete from items where id=$i_id";
if(mysqli_query($connection, $query))
{
    $query="delete from item_sizes where item_id=$i_id";
    if(mysqli_query($connection, $query))
    {
        header("location: ../admin.php");
    }
    header("location: ../admin.php");
}
else
{
echo "deletion error";
}
?>