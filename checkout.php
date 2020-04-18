<?php 
ob_start();
session_start();
$pageTitle="checkout";
if(isset($_SESSION['id'])){
    include_once "includes/pagesHeaderAfter.php";
}else{
    header('location:404.php');
}
include_once "includes/orders.php";
include_once "includes/cart.php";
$cart = new cart();
$order =new orders();
?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>checkout</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--CheckOut Page-->
    <div class="checkout-page">
        <div class="auto-container">
            <!--Default Links-->
            <ul class="default-links">

                <li><span class="fa fa-inbox"></span>Have a coupone? <a href="cart.php">Click here to enter your code</a></li>
            </ul>

            <!--Checkout Details-->
            <div class="checkout-form pb-3">
                <form method="post" action="">
                    <div class="row clearfix">
                        <!--Column-->
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="sec-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="row clearfix">
                                <!--Form Group-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-label">Address</div>
                                    <input type="text" name="address" value="" placeholder="Street address" required>
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-label">Car details</div>
                                    <input type="text" name="brand" value="" placeholder="Car brand" required> <br>
                                    <input type="text" name="number" value="" placeholder="Car number" required>
                                </div>
                            </div>
                        </div>
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="sec-title">
                                <h3>ENTER YOUR CURRENT LOCATION</h3>
                            </div>
                            <div id="currentLocation"></div>



                    <!-- start map section-->
                            <div id="map"></div>

                            <?php include_once "includes/selectMap.php" ?>


                    <!-- end map section-->                             

                        </div>
                    </div>
                <!-- </form> -->
            </div>
            <!--End Checkout Details-->

            <!--Payment Box-->
            <div class="payment-box ">
                <div class="upper-box">

                    <!--Payment Options-->
                    <div class="payment-options">
                    <?php 
            if(isset($_POST['order'])){


                    $cart->setCustomer($_SESSION['id']);
                    $get=$cart->customerAll();
                    $i=0;
                    $current_row[$i]=0;
                    $added="";
                    while($rows=mysqli_fetch_assoc($get))
                        {
                           
                            
                            $ss=$cart->getSS($rows['ssId']);    
                            if($rr=mysqli_fetch_assoc($ss))
                            {
                            if($rr['stationId']==$current_row[$i]){
                                //sameorder
                            $r=$order->getMaxOrder($_SESSION['id']);
                            if($row=mysqli_fetch_assoc($r))
                                $cart->setOrderId($row['maxOrder']);
                            $cart->setQuantity($rows['quantity']);
                            $cart->setStationId($rr['stationId']);
                            $cart->setServiceId($rr['serviceId']);
                            $cart->setPrice($rr['servicePrice']);
                            $cart->setDelivary($rr['deliveryFees']);
                            $added=$cart->addOrderDetails();
                            }
                             else{
                                //neworder
                                $order->setLocation($_POST['address']);
                                $order->setPayment($_POST['payment-group']);
                                $order->setlong($_POST['lngg']);
                                $order->setLat($_POST['latt']);
                                $order->setBrand($_POST['brand']);
                                $order->setPlate($_POST['number']);
                                $order->setCustomer("6");
                                $order->setTotal("100");
                                $order->setCustomer($_SESSION['id']);
                                $order->setTotal($_SESSION['total']);
                                $result=$order->add();
                               
                                $r=$order->getMaxOrder($_SESSION['id']);
                                if($row=mysqli_fetch_assoc($r))
                                    $cart->setOrderId($row['maxOrder']);
                                $cart->setQuantity($rows['quantity']);
                                $cart->setStationId($rr['stationId']);
                                $cart->setServiceId($rr['serviceId']);
                                $cart->setPrice($rr['servicePrice']);
                                $cart->setDelivary($rr['deliveryFees']);
                                $added=$cart->addOrderDetails();
                             }
                             $i++;
                             $current_row[$i]=$rr['stationId'];  
                            }
                                
                        }
                        if($added=="success"){
                            $delete=$cart->delete();
                            if($delete=="success"){
                                header('location:order-completed.php');
                            }
                            else echo ($delete);
                         // header('location:confirm-order.php?qr='.base64_encode($_POST['qr']).'');}

                        }
                       else echo("<p>YOU HAVE NOTHING IN YOUR CART</p>");
                         

               

            }
            
            ?>

                        <ul >
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment-group" id="payment-3" value="Cash on delivery" required >
                                    <label for="payment-3"><strong>Cash on Delivery</strong><span class="small-text">Make your payment directly by cash to delivery man.</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment-group" id="payment-4" value="Paypal">
                                    <label for="payment-4"><strong>PayPal</strong><span class="image"><img src="images/resource/paypal.jpg" alt="" /></span></label>
                                    <a href="#" class="what-paypall">What is PayPal?</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
              

                    <div class="lower-box text-right">
                    <button type="submit" class="theme-btn btn-style-three" name="order">Confirm order</a>
                </div>
                

            </div>
            <!--End Payment Box-->
         

        </div>
    </div>
    <!--End CheckOut Page-->
    <!-- Subscribe Section -->
    <!-- <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>Check out our repair service for your car and get a free clean</h3>
                <a href="stations.php" class="call-btn">Order Now</a>
            </div>
        </div>
    </section> -->
    <!-- End Subscribe Section -->

    <?php 

include_once "includes/footer.php";


?>