<?php
	
	include("connection.php");

	if(isset($_POST["name"]) && $_POST["name"] != ""){
		$name = $_POST["name"];
	}else{
		die("Full name is required");
	}
	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST['email'];
	}else{
		die("Email is required");
	}
	if(isset($_POST["password"]) && $_POST["password"] != ""){
		$password = $_POST['password'];
	}else{
		die("Password is required");
	}
	if(isset($_POST["confirmpassword"]) && $_POST["confirmpassword"] != ""){
		$confirmpassword = $_POST['confirmpassword'];
	}else{
		die("confirmpassword is required");
	}

	if ($_POST["password"] === $_POST["confirmpassword"]) {
		// success!
	 }
	 else {
		die("passwords didn't match");
	 }
	 $sql1="Select * from users where email=?"; #Check if the email already exists in the database
	 $stmt1 = $connection->prepare($sql1);
	 $stmt1->bind_param("s",$email);
	 $stmt1->execute();
	 $result = $stmt1->get_result();
	 $row = $result->fetch_assoc();
	 if(empty($row)){
		$x = $connection->prepare("INSERT INTO users (name,email, password) VALUES (?, ?, ?)");
	$x->bind_param("sss",$name, $email, $password);
	$x->execute();
	
	$x->close();
	$connection->close();
	header("Location:../login.php");

	 }
	 else{
		session_start();
		$_SESSION["up-flash"] = "Email already exists";
		header('location: ../signup.php');
	}
	
	

?>