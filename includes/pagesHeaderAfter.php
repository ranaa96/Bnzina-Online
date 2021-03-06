<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from expert-themes.com/html/motor-expert/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Mar 2020 12:47:44 GMT -->
<head>
<meta charset="utf-8">
<title>Bnzinz online |<?php echo " ".$pageTitle; ?></title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="css/color-themes/default-theme.css" rel="stylesheet">

<!--Favicon-->
<link rel="icon" href="images/icons/favicon.png"alt="" >
<head>
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='css/jquery.growl.css' rel='stylesheet' type='text/css'>



<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>
<body>
<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- Main Header-->
    <header class="main-header header-style-four">
        <!-- Header Lower -->
        <div class="header-lower">
            <div class="auto-container">
               <div class="main-box clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="index.php"><img src="images/logoo.png" alt=""></a></div>
                    </div>
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
                                    <li class="current"><a href="index.php">Home</a></li>
                                    <li><a href="stations.php">stations</a></li>
                                    <li><a href="myorders.php">My orders</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="about.php">about</a></li>
                                    <li><a href="myProfile.php">my profile</a></li>
                                    <li><a href="logout.php">logout</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        <!--outer Box-->
                        <div class="outer-box">
                            <!-- Cart Btn -->
                            <div class="cart-btn">
                                <?php 
                                    include_once "includes/cart.php";
                                    $ob = new cart();
                                    $ob->setCustomerId($_SESSION['id']);
                                    $c=$ob->getCount();
                                    if($count=mysqli_fetch_assoc($c)){
                                        $cartCss = 'display: none';
                                        $emptyCss = 'display: block';
                                        if (count($count) > 0) {
                                            $cartCss = 'display: block';
                                            $emptyCss = 'display: none';
                                        }
                                ?>
                                <a href="cart.php" title="">
                                    <i class="flaticon-shopping-bag-1"></i>
                                    <span class="count" id="itemCount"><?php echo $count['count'] ?></span>
                                </a><?php }?>
                            </div>
                            <!--Search Box-->
                            <div class="dropdown dropdown-outer">
                                <ul >
                                    <li >
                                      
                                                <a href="search.php" class="search-box-btn"><span class="fa fa-search"></span></a>

                                    </li>
                                </ul>
                            </div>
                        </div><!--End outer Box-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Lower -->
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
                <!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.php" class="img-responsive"><img src="images/small.png" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu  navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <li class="dropdown"><a href="index.php">Home</a></li>
                                <li><a href="stations.php">stations</a></li>
                                <li><a href="myorders.php">My orders</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="myProfile.php">my profile</a></li>
                                <li><a href="logout.php">logout</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
        <!--End Sticky Header-->
    </header>
    <!--End Main Header -->
