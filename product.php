<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->
	<?php

$id= $_SESSION['u_id'];
  
 $sql1 = "SELECT * FROM `users` where id=$id";
 $stmt1 = $connection->prepare($sql1);
 $stmt1->execute();
  $result = $stmt1->get_result();
  $row = $result->fetch_assoc();
	  
	  
	  ?>
	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Free shipping, 45-day return or refund guarantee.</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- My Account -->

							
								<li class="account">
									<a href="#">
									<?php echo $row["name"];?>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="php/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
										
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">SHa<span>Ray</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="welcome.php">home</a></li>
								<li><a href="shop.php">shop</a></li>
								<li><a href="contact.php">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="cart.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
					<?php echo $row["name"];?>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="php/logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="welcome.php">home</a></li>
				<li class="menu_item"><a href="shop.php">shop</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
			</ul>
		</div>
	</div>

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="welcome.php">Home</a></li>
						<li><a href="shop.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Shop</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
					</ul>
				</div>
			</div>



		</div>
		<?php
					$id=$_GET['id'];
					$sql1 = "Select * from items where id=$id";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 
						 
						 ?>
		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(Admin/images/<?php echo $row['image'];?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?php echo $row['name'];?></h2>
						<p><?php echo $row['description'];?></p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					<br>
					<div class="product_price">$<?php echo $row['price'];?>.00</div>
					
					<?php
                // Fetch available sizes
                $sql = "SELECT size FROM item_sizes WHERE item_id = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
				?>
					<form action="php/add-cart.php?id=<?php echo $row['id'];?>" method="POST">
					<div class="product_color">
					<?php
					if ($result->num_rows > 0) {
						?>

						<span>Select Size:</span>
						<?php
                }
                ?>

						<ul >
					
				<?php
                while ($sizeRow = $result->fetch_assoc()) {
                    ?>
							<li>
							<input type="radio" name="selected_size" value="<?php echo $sizeRow['size']; ?>" required> 
							<span><?php echo $sizeRow['size']; ?></span>
							</li>
							<?php
                }
                ?>
						</ul>
						
					</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<i class="fa fa-minus" onclick="updateQuantity(-1)" aria-hidden="true"></i>
							<span name="quantity_value" id="quantity_value">1</span>
							<span class="plus" onclick="updateQuantity(1)"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<input type="hidden" name="quantity" id="hidden_quantity" value="1">
						<button type="submit" class="red_button add_to_cart_button">Add to Cart</button>
						
					</div>
			</form>
				</div>
			</div>
			


		</div>

	</div>

	<!-- Tabs -->

	

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>free shipping</h6>
							<p>Suffered Alteration in Some Form</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cach on delivery</h6>
							<p>The Internet Tend To Repeat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 days return</h6>
							<p>Making it Look Like Readable</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all week</h6>
							<p>8AM - 09PM</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="shop.php">Shop</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			
		</div>
	</footer>

</div>

<script>
    function updateQuantity(change) {
        let quantityElement = document.getElementById('quantity_value');
        let hiddenInput = document.getElementById('hidden_quantity');
        let currentQuantity = parseInt(quantityElement.textContent);

        let newQuantity = currentQuantity + change;
        if (newQuantity < 1) newQuantity = 1; // Prevent quantity less than 1

        quantityElement.textContent = newQuantity;
        hiddenInput.value = newQuantity;
    }
</script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/single_custom.js"></script>
</body>

</html>
