<?php
include "connection.php";

print $_POST["password"];
if (isset($_POST["username"]) and $_POST["username"] !="")
	{
		$username = $_POST["username"];
	}else
	{
		die("Invalid Username");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}

$hash = hash('sha256', $password);
$sql1="Select * from admins where username=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please Check your Username or Password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION["a_id"] = $row["id"];
	header('location: ../admin.php');
}
?>