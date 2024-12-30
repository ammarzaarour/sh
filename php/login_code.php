<?php

require_once('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];
$x = $connection->prepare("SELECT * FROM users WHERE email=? AND password=?");
$x->bind_param("ss", $email, $password);
$x->execute();
$result = $x->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your Email or Password";
	header('location: ../login.php');
}
else{
	session_start();
	$_SESSION["u_id"] = $row["id"];
	header('location: ../welcome.php');
	
}
?>

