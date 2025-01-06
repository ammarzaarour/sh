<?php
include "connection.php";
$old_id= $_GET['id'];

if(isset($_POST["id"]) && $_POST["id"] != "") {
    $id = $_POST["id"];
}else{
    die ("Enter Product ID");
}

if(isset($_POST["name"]) && $_POST["name"] != "") {
    $name = $_POST["name"];
}else{
    die ("Enter Product name");
}

if(isset($_POST["des"]) && $_POST["des"] != "") {
    $des = $_POST["des"];
}else{
    die ("Enter Product description");
}

if(isset($_POST["price"]) && $_POST["price"] != "") {
    $price = $_POST["price"];
}else{
    die ("Enter Item price");
}
if(isset($_POST["quantity"]) && $_POST["quantity"] != "") {
    $quantity = $_POST["quantity"];
}else{
    die ("Enter Item quantity");
}






if($old_id == $id){
		$sql4 = "UPDATE `items` SET id='$id', name='$name',description='$des',price='$price',quantity='$quantity' where id=$old_id;";#add the new item to the database
		$stmt4 = $connection->prepare($sql4);
        $stmt4->execute();
		header('location: ../admin.php');
}
else{
    $sql1="Select * from items where id=?"; #Check if the item id already exists in the database
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("s",$id);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();
    if(empty($row)){
        $sql4 = "UPDATE `items` SET id='$id', name='$name',description='$des',price='$price',quantity='$quantity' where id=$old_id;";#add the new item to the database
		$stmt4 = $connection->prepare($sql4);
        $stmt4->execute();
		header('location: ../admin.php');
    }
    else{
        session_start();
        $_SESSION["add-flash"] = "ID already exists";
        header("location: ../edit.php?i_id=$old_id");
    }
    
}
?>