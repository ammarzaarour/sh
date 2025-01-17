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
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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
		<?php
					
					$sql1 = "SELECT COUNT(*) AS count FROM cart WHERE userid =?";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->bind_param("s", $_SESSION['u_id']); // Bind the session variable
					$stmt1->execute();
					$result = $stmt1->get_result();
					 $row = $result->fetch_assoc();
						 ?>
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
										<span id="checkout_items" class="checkout_items"><?php echo $row['count'];?></span>
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
	<?php

$id= $_SESSION['u_id'];
  
 $sql1 = "SELECT * FROM `users` where id=$id";
 $stmt1 = $connection->prepare($sql1);
 $stmt1->execute();
  $result = $stmt1->get_result();
  $row = $result->fetch_assoc();
	  
	  
	  ?>
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

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="welcome.php">Home</a></li>
						<li class="active"><a href="cart.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>My Cart</h5>
						</div>
						
					</div>
				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

							

								<div class="product-grid">

									<!-- Product 1 -->
									<?php
					
					$sql1 = "SELECT 
					cart.id,
					cart.userid, 
					cart.quantity,
					cart.item_size,
					cart.price,
					items.id AS item_id, 
					items.name, 
					items.image
				FROM 
					cart 
				JOIN 
					items 
				ON 
					cart.productid = items.id 
				WHERE 
					cart.userid = ?";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->bind_param("s", $_SESSION['u_id']); // Bind the session variable
					$stmt1->execute();
					$result = $stmt1->get_result();
					 while($row = $result->fetch_assoc()) {
						 
						
						 ?>
									<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="Admin/images/<?php echo $row['image'];?>" alt="">
											</div>
											
										
											<div class="product_info">
												<h6 class="product_name"><a href="product.php?id=<?php echo $row['item_id'];?>"><?php echo $row['name'];?> (<?php echo $row['quantity'];?> pieces)</a></h6>
												<div class="product_price">$<?php echo $row['price'];?>.00</div>
												<?php
												if($row['item_size']!=""){
												?>
												<h5 class="product_name">size: <?php echo $row['item_size'];?></h5>
												<?php
					}
				   ?>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="php/delete-cart.php?c_id=<?php echo $row["id"];?>">Delete from cart</a></div>
									</div>

									
									<?php
					}
				   ?>



<?php
					
					$sql1 = "SELECT SUM(price) as total_price 
        FROM cart 
        WHERE userid = ?";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->bind_param("s", $_SESSION['u_id']); // Bind the session variable
					$stmt1->execute();
					$result = $stmt1->get_result();
					$row = $result->fetch_assoc();
						 
						
						 ?>

							</div>
							<?php
							if ($row['total_price'] !="") {
								?>
							<div class="red_button shop_now_button"><a href="proceed/proceed.html">Total: $<?php echo $row['total_price'];?>.00</a></div>
							<?php
					}
				   ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

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



	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="shop.php">Shop</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.php">Contact us</a></li>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>

</html>
