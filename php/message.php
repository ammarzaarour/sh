<?php
include "connection.php";
session_start();
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
}
$u_id = $_SESSION['u_id'];
$message = $_POST['message'];


$sql4 = "INSERT INTO `messages` (`userid`, `message`) VALUES (?,?);"; #add the message to the database
$stmt4 = $connection->prepare($sql4);
$stmt4->bind_param("ss",$u_id,$message);
$stmt4->execute();

session_start();
$_SESSION["message"] = "Message sent successfully";
header('location: ../contact.php');

?>