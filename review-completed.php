<?php 
ob_start();
session_start();
$pageTitle="complete";
if(isset($_SESSION['id'])){
    include_once "includes/pagesHeaderAfter.php";
}else{
    header('location:404.php');
}

?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Your order</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>your order</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <div class="checkout-page">
        <div class="auto-container">
        <div class="sec-title text-center">
                    <h2></h2>
        </div>
        <div class="pricing-table tagged col-lg-12 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="title">
                            <h3>Thanks for your concern</h3>
                            <div class="line"></div>
                        </div>
     
                        <div class="price">
                            <h2>We 've received your review</h2>
                            <span style="color:#36404b">Waiting for you again</span>
                        </div>
                        <div class="table-footer">
                            <a href="myorders.php" class="theme-btn btn-style-two">My Orders</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

     <!-- Subscribe Section -->
     <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>Check out our repair service for your car and get a free clean</h3>
                <a href="stations.php" class="call-btn">Order Now</a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
    <?php 

include_once "includes/footer.php";


?>