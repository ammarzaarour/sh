<?php
include "php/connection.php";
session_start();
if(empty($_SESSION['a_id'])){
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                       <h1>SHaRay</h1>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="add.php">
                                <i class="far fa-check-square"></i>Add Item</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h1>SHaRay</h1>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="add.php">
                                <i class="far fa-check-square"></i>Add Item</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        
                                        <div class="mess-dropdown js-dropdown">
   
                                        </div>
                                    </div>
                                </div>

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Sharay Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Sharay Admin</a>
                                                    </h5>
                                                    <span class="email">sharay@gmail.com</span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="php/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                            <?php
                                                
                                                // Prepare and execute the SQL query
                                                $sql = "SELECT COUNT(*) as user_count FROM users"; 
                                                $stmt = $connection->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $row = $result->fetch_assoc();

                                                ?>
                                                <h2><?php echo $row['user_count'];?></h2>
                                                <span>members </span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                            <?php
                                                
                                                // Prepare and execute the SQL query
                                                $sql = "SELECT COUNT(*) as items_count FROM items"; 
                                                $stmt = $connection->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $row = $result->fetch_assoc();

                                                ?>
                                                <h2><?php echo $row['items_count'];?></h2>
                                                <span>items</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                                
                                                // Prepare and execute the SQL query
                                                $sql = "SELECT COUNT(*) as cart_count FROM cart"; 
                                                $stmt = $connection->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $row = $result->fetch_assoc();

                                                ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $row['cart_count'];?></h2>
                                                <span>products sold</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                                
                                                // Prepare and execute the SQL query
                                                $sql = "SELECT COUNT(*) as mess_count FROM messages"; 
                                                $stmt = $connection->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                $row = $result->fetch_assoc();

                                                ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            <div class="text">
                                                <h2><?php echo $row['mess_count'];?></h2>
                                                <span>message from users</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                         
                                <h2 class="title-1 m-b-25">Users Cart</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>User name</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th class="text-right">Size</th>
                                                <th class="text-right">Price</th>
                                                <th class="text-right">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
					
					$sql1 = "SELECT 
                                c.id, 
                                c.quantity, 
                                c.item_size, 
                                u.name, 
                                p.name AS product_name, 
                                c.price 
                            FROM 
                                cart c
                            JOIN 
                                users u ON c.userid = u.id
                            JOIN 
                                items p ON c.productid = p.id
                            ORDER BY 
                                c.userid;";
					$stmt1 = $connection->prepare($sql1);
					$stmt1->execute();
					 $result = $stmt1->get_result();
					 while($row = $result->fetch_assoc()) {
						 
						
						 ?>
                                            <tr>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['product_name'];?></td>
                                                <td><?php echo $row['quantity'];?></td>
                                                <td class="text-right"><?php echo $row['item_size'];?></td>
                                                <td class="text-right">$<?php echo $row['price'];?>.00</td>
                                                <td class="text-right"><a href="php/delete-cart.php?c_id=<?php echo $row["id"];?>">Delete</a></td>
                                            </tr>

                                            <?php
					}
				   ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>



                        <div class="row">
                         
                         <h2 class="title-1 m-b-25">Our items</h2>
                         <div class="table-responsive table--no-card m-b-40">
                             <table class="table table-borderless table-striped table-earning">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Name</th>
                                         <th>Category</th>
                                         <th class="text-right">Price</th>
                                         <th class="text-right">Quantity</th>
                                         <th class="text-right">Delete</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                 <?php
             
             $sql1 = "SELECT * from items";
             $stmt1 = $connection->prepare($sql1);
             $stmt1->execute();
              $result = $stmt1->get_result();
              while($row = $result->fetch_assoc()) {
                  
                 
                  ?>
                                     <tr>
                                         <td><?php echo $row['id'];?></td>
                                         <td><?php echo $row['name'];?></td>
                                         <td><?php echo $row['category'];?></td>
                                         <td class="text-right">$<?php echo $row['price'];?>.00</td>
                                         <td class="text-right"><?php echo $row['quantity'];?></td>
                                         <td class="text-right"><a href="php/delete-item.php?i_id=<?php echo $row["id"];?>">Delete</a></td>
                                     </tr>

                                     <?php
             }
            ?>
                                 </tbody>
                             </table>
                         </div>
                 </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                       
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            
                                        <?php
             
             $sql1 = "SELECT 
                    m.message,  
                    u.email
                FROM 
                    messages m
                JOIN 
                    users u ON m.userid = u.id;";
             $stmt1 = $connection->prepare($sql1);
             $stmt1->execute();
              $result = $stmt1->get_result();
              while($row = $result->fetch_assoc()) {
                  
                 
                  ?>
                                                <div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            
                                                            <div class="text">
                                                                <h5 class="name"><?php echo $row['email'];?></h5>
                                                                <p><?php echo $row['message'];?></p>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>

                                                <?php
             }
            ?>
                                                
                                              
                                            </div>
                                           
                                        </div>
                                       
                                            
                                              
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
