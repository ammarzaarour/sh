<?php
include "connection.php";

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

if(isset($_POST["cat"]) && $_POST["cat"] != "") {
    $cat = $_POST["cat"];
}else{
    die ("Enter product Category");
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



	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../add.html?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				
				
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../add.html?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../add.html?error=$em");
	}
				
	



$sql1="Select * from items where id=?"; #Check if the item id already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$id);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){
		$sql4 = "INSERT INTO `items` (`id`, `name`,`description`,`category`,`price`,`quantity`,`image`) VALUES (?,?,?,?,?,?,?);"; #add the new item to the database
		$stmt4 = $connection->prepare($sql4);
		$stmt4->bind_param("sssssss",$id,$name,$des,$cat,$price,$quantity,$new_img_name);
		$stmt4->execute();

		// Handle sizes as an array in a separate table
		if(isset($_POST["options"]) && !empty($_POST["options"])) {
			$sizes = $_POST["options"]; // Assuming size is an array from the form
	
			foreach($sizes as $size) {
				$sql5 = "INSERT INTO `item_sizes` (`item_id`, `size`) VALUES (?, ?)";
				$stmt5 = $connection->prepare($sql5);
				$stmt5->bind_param("ss", $id, $size);
				$stmt5->execute();
			}
		header('location: ../add.php');
		}
		header('location: ../add.php');
}
else{
    session_start();
    $_SESSION["add-flash"] = "ID already exists";
    header('location: ../add.php');
}
?>