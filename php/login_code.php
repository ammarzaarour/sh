<?php

require_once('connection.php');


if (isset($_POST["email"]) and $_POST["email"] !="")
	{
		$email = $_POST["email"];
	}else
	{
		die("Invalid email");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Invalid Password");
	}
$hash = hash('sha256', $password);

$x = $connection->prepare("SELECT * FROM users WHERE email=? AND password=?");
$x->bind_param("ss", $email, $hash);
$x->execute();
$result = $x->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your Email or Password";
	header('location: ../login.php');
}
else{
	if($row["role"]== "user"){
		session_start();
		$_SESSION["u_id"] = $row["id"];
		header('location: ../welcome.php');
	}
	else{
		session_start();
		$_SESSION["a_id"] = $row["id"];
		header('location: ../Admin/admin.php');
	}
	
	
}
?>

