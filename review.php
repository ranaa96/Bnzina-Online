<?php 
 ob_start();
 session_start();
 $pageTitle="Review";
 if((isset($_SESSION['id']))&&($_SESSION['id']==$_GET['id'])){
     include_once "includes/pagesHeaderAfter.php";
 }else{
     header('location:404.php');
 }
include_once "includes/rating.php";
include_once "includes/cart.php";
include_once "includes/services.php";

$rate=new rating();
$cart=new cart();
$service=new services();
?>

   <!--Page Title-->
   <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Rate & Review</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Rate & Review</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

                        <!--Product Info Tabs-->
                        <div class="product-info-tabs container pt-5">

                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box" id="product-tabs">

                              

                                <!--Tabs Content-->
                                <div class="tabs-container tabs-content">


                                    <!--Tab-->
                                    <div class="tab active-tab" id="prod-reviews">

                                     

                                        <!-- Comment Form -->
                                        <div class="shop-comment-form">
                                            <h2>ADD A REVIEW</h2>
                                            <div class="mail-text"><span class="theme_color">Your email address will not be published.</span> Required fields are marked*</div>
                                            <div class="services-needed">

                                            <div class="title"><h2 style="font-size:20px !important">Services ordered</h2></div>
                        <div class="row clearfix">
                            <?php 
                             $cart->setOrderId($_GET['orderId']);
                             $result=$cart->getOrderDetails();
                             $stationId;
                             while($rows=mysqli_fetch_assoc($result)){
                                $stationId=$rows['stationId'];
                                 $r=$service->getserviceById($rows['serviceId']);
                                 if($roww=mysqli_fetch_assoc($r))
                            
                            
                            ?>
                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="check-box">
                                    <input type="checkbox" name="shipping-option" id="service-1" checked disabled>
                                    <label for="service-1"><?php echo($roww['serviceName']); ?> </label>
                                </div>
                            </div>

<?php } ?>
                    

                   
                        </div>
                    </div>
                    <form method="post" action="">

                                            <div class="rating-box">
                                                <div class="text"> Your Rating:</div>
                                                <section class='rating-widget'>
  
                                                        <!-- Rating Stars Box -->
                                                        <div class='rating-stars '>
                                                            <ul id='stars' class="float-left" >
                                                            <li class='star' title='Poor' data-value='1' >
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Fair' data-value='2' >
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Good' data-value='3' >
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Excellent' data-value='4' >
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='WOW!!!' data-value='5'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                        
                                                            </ul>

                                                            <div class='success-box pt-2 '>
                                                        <div class='text-message ml-2'></div>
                                                        </div>
                                                        </div>
                                                        
                                                </section>
                                            </div>
                                                <div class="form-group">
                                                    <label>Your Review*</label>
                                                    <textarea name="message" placeholder=""></textarea>
                                                </div>
                                                <div id="rateValue"></div>
                                                <div class="form-group">
                                                    <button class="theme-btn btn-style-two mr-3" type="submit" name="submit-form">Submit now</button>
                                                    <?php 
                                                if(isset($_POST['submit-form'])){
                                                    $rate->setOrderId($_GET['orderId']);
                                                    $rate->setRateValue($_POST['rate']);
                                                    $rate->setRateComment($_POST['message']);
                                                    $result=$rate->add();
                                                    if($result=="success"){
                                                        $av=$rate->avgRate($stationId);
                                                        if($r=mysqli_fetch_assoc($av))
                                                        $rate->setAverage($r['avgRate']);
                                                        $rate->setStationId($stationId);
                                                        $update=$rate->update();
                                                        if($update=="success"){}
                                                        else echo ($update);
                                                        header("location:review-completed.php");
                                                        
                                                    }
                                                    else echo("Sorry you have already rated this order before");
                                                }
                                                
                                                
                                                ?>
                                                </div>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- End product info tabs -->

                    </div>
                </div>
       

<?php 

include_once "includes/footer.php";

?>