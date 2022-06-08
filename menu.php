<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Web bán mũ</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item">
                                    <a href="index.php">Trang Chủ</a>
                                </li>
                                <li>
                                    <a href="about.php">Về Chúng Tôi</a>
                                </li>
                                <li><a href="about.php">Pages</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="404.php">404 page</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                    </ul> -->
                                </li>
                                <li>
                                    <a href="news.php">Tin Tức</a>
                                    <!-- <ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<li><a href="single-news.php">Single News</a></li>
									</ul> -->
                                </li>
                                <li><a href="contact.php">Liên Hệ</a></li>
                                <li><a href="shop.php">Shop</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                        <li><a href="single-product.php">Single Product</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                    </ul> -->
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <?php if(empty($_SESSION['account']) && empty($_SESSION['password']) && empty($_SESSION['id'])){ ?>

                                        <a href="./login.php">Đăng nhập</a>
                                        
                                        <?php }else{?>
                                        <a class="shopping-cart" href="cart.php"><i
                                                class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                                <?php 
                                                    require_once './admin/connect/query.php';

                                                    $query = new Database();

                                                    $result = $query->getAvatarByID($_SESSION['id']);
                                            ?>
                                        
                                        <img class="rounded-circle" height="30" width="30"  src="./admin/<?php echo $result[0]['avatar'] ?>">

                                        <a href="logout.php">Đăng xuất</a>
                                        <?php } ?>
                                        
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->