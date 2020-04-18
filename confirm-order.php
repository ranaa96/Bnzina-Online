<?php 
 ob_start();
 session_start();
 $pageTitle="confirm";
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
            <!--Order Box-->
            <div class="order-box">
                <div class="sec-title">
                    <h2>Thanks for your concern</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="title-box clearfix">
                            <div class="col">Products</div>
                            <div class="col">Price</div>
                        </div>
                        <ul>
                            <li class="clearfix">Patient Ninja 1<span>$35.00</span></li>
                            <li class="clearfix"><strong>Total</strong><span>$35.00</span></li>
                        </ul>
                        <div class="title-box clearfix">
                            <div class="col">Services</div>
                            <div class="col">Price</div>
                        </div>
                        <ul>
                            <li class="clearfix">Car wash<span>$35.00</span></li>
                            <li class="clearfix">Shipping<span>$10.00</span></li>
                            <li class="clearfix"><strong>Total</strong><span>$45.00</span></li>
                        </ul>
                        <div class="title-box clearfix">
                            <div class="col">Total</div>
                        </div>
                        <ul>
                            <li class="clearfix"><strong>$80.00</strong><li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div id="qrbox" style="text-align: center;">
                            <img src="generateQR.php?qr=<?php echo $_GET['qr']?>" alt="">
                        </div>
                        <br>

                        <div class="lower-box text-center ">
                            <a href="#" class="theme-btn btn-style-three w-100">Delivary will scan your code</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Order Box-->
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