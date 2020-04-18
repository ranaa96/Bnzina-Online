<?php 
ob_start();
session_start();
$pageTitle="order details";
if(isset($_SESSION['id'])){
    include_once "includes/pagesHeaderAfter.php";
}else{
    header('location:404.php');
}
include_once "includes/cart.php";
include_once "includes/orders.php";
$order=new orders();
$cart=new cart();
$cart->setCustomer($_SESSION['id']);
$order->setCustomer($_SESSION['id']);
require_once "src/PHPMailer.php";
require_once "src/Exception.php";
require_once "src/SMTP.php";
require_once "vendor/autoload.php";

?>

   <!--Page Title-->
   <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Order Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Order Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="sec-title text-center pt-5">
					<h2> Track your order</h2>
					<div class="separator"><span class="flaticon-settings-2"></span></div>
				</div>
    <div class="container-fluid my-5 d-sm-flex justify-content-center"  > 
    <div class="card px-2" >
        <div class="card-header bg-white">
            <div class="row justify-content-between">
                <div class="col">
                    <?php 
                    $result=$order->getOneOrder($_GET['orderId']);
                    $row;
                    if($row=mysqli_fetch_assoc($result)){
                    ?>
                    <p class="text-muted"> Order ID :<span class="font-weight-bold " style="color: #1c63b8;"><?php echo($row['orderId']); ?></span></p>
                    <p class="text-muted"> Place On :<span class="font-weight-bold  " style="color: #1c63b8;">
                    <?php 
                    $timestamp = $row['orderDate'];
                    $splitTimeStamp = explode(" ",$timestamp);
                    $date = $splitTimeStamp[0];
                    $date = explode('-', $date);
                    $year = $date[0];
                    $month   = $date[1];
                    $month_name = date("F", mktime(0, 0, 0, $month, 10)); 
                    $day  = $date[2];
                    $time = date('g:ia', strtotime($splitTimeStamp[1]));
                    echo($month_name." ".$day.",".$year." at ".$time); ?>
                </span> </p>
                    <?php }?>
                </div>
              
            </div>
        </div>
  

        <table class="table table-hover">
                    <thead>
                        <tr style="color:#36404b ">
                            <th>Product</th>
                            <th>Qty</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
        $cart->setOrderId($_GET['orderId']);
        $result=$cart->getOrderDetails();
        $stationId;
        $itemsTotal=0;
        $delivaryFees=0;
        while($rows=mysqli_fetch_assoc($result)){
            $stationId=$rows['stationId'];
            $delivaryFees+=$rows['deliveryFees'];
            $r=$order->getNames($rows['serviceId'],$rows['stationId']);
            if($roww=mysqli_fetch_assoc($r)){
                
        ?>
            <tr>
                <td class="col-md-9"><em><?php echo($roww['serviceName']);?></em></h4></td>
                <td class="col-md-1" style="text-align: center"> <?php echo($rows['quantity']);?> </td>
                <td class="col-md-1 text-center"><?php echo($rows['unitPrice']);?></td>
                <td class="col-md-1 text-center"><?php $subTotal= $rows['quantity']*$rows['unitPrice'] ; $itemsTotal+=$subTotal; echo($subTotal);?></td>
            </tr>
    
            <?php }}?>
                        <tr>
                            <?php
                            include_once "includes/stations.php";
                            $ob = new stations();
                            $r = $ob->getStationById($stationId);
                            if($roww = mysqli_fetch_assoc($r)){?>
                            <td >Station Name : <Strong> <?php echo($roww['stationName']);?></strong></td>
                            <td class="text-center text-danger" colspan="3">
                            <a  href="singleStation.php?id=<?php echo($roww['stationId']);?>" type="button" class="btn btn-outline-primary d-flex">Location : <?php echo($roww['stationAddress']);?></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

           
        <?php 
        if($row['orderStatus']=='delivered')
        {

        }
        else if ($row['orderStatus']=='shipped'){ 
            echo(' <form method="post" action="">
            <div id="qrbox" style="text-align: center;">
                            <img src="generateQR.php?qr=http://localhost/BnzinaOnline/scanner/'.$row['orderId'].'/'.$row['deliveryId'].'" alt="">
            </div>
            <br>            
        </form>
        <div class="lower-box text-center ">
            <button class="theme-btn btn-style-three w-50 mb-3" >Delivary will scan this code</button>
        </div>');
        }
       
   ?>

        <div class="row " >
        
            <div class="col-lg-6 col-12">
                <div class="card px-2 h-100" >
                    <div class="card-header bg-white">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="text-muted text-center"> PAYMENT INFORMATION</p>
                            </div>               
                        </div>
                    </div>
             <div class="card-body">
             <article><h3 >Payment Method</h3><p class="mb-3" ><?php echo($row['paymentMethod']); ?></p></article>
             <article ><h3 >Payment Details</h3>
             <p >Items total: <span>EGP <?php echo($itemsTotal); ?></span></p>
             <p>Shipping Fees: <span dir="ltr">EGP <?php echo($delivaryFees); ?></span></p>
             <p >Promotional Discount: <span dir="ltr">EGP 0</span></p>
             <p >Total: <span dir="ltr">EGP <?php echo($itemsTotal+$delivaryFees); ?></span></p></article>
             </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card px-2 h-100" >
                    <div class="card-header bg-white">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="text-muted text-center"> DELIVERY INFORMATION</p>
                            </div>
                        </div>
                    </div>
        <div class="card-body">
        <article ><h3 >Shipping Address</h3>
        <address><p><?php echo($row['orderLocation']); ?></p></address>
    </article>
        </div>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <div class="col">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">CONFIRMED</li>
                    <li class="step0 <?php if ($row['orderStatus']=="shipped" or $row['orderStatus']=="delivered" ) echo("active"); ?> text-center" id="step2">SHIPPED</li>
                    <li class="step0 <?php if ($row['orderStatus']=="delivered" ) echo("active"); ?> text-muted text-right" id="step3">DELIVERED</li>
                </ul>
            </div>
        </div>
        <?php 
if ($row['orderStatus']=="delivered" ){
    $link="http://localhost/bnzina/review.php?orderId=".$row['orderId']."&id=".$_SESSION['id']."";
    include_once "includes/customer.php";
    $customer=new customer();
        $customer->setID($_SESSION['id']);      
      
    $get=$customer->checkByID();
    $Email=""; 
    $name=""; 
    if($r=mysqli_fetch_assoc($get)){
        $Email=$r['customerEmail'];  
        $name=$r['customerName']; 
    }
                           
              
$mail = new  PHPMailer\PHPMailer\PHPMailer();

   $mail->IsSMTP();
 //   $mail->SMTPDebug = 1;
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'ssl';
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);

   $mail->Username = "bnzina.online@gmail.com";
   $mail->Password = "#bnzina123";

   $mail->setFrom('bnzina.online@gmail.com', 'BnzinaOnline');
   $mail->addAddress($Email, "nn");
// $mail->addAddress("rana27996@gmail.com", "nn");


   
   $mail->Subject = 'BnzinaOnline-Please evaluate your order';
   $mail->Body = "Dear ".$name." ,<br>Thank you for your order on BnzinaOnline. Please help us to improve the level of service and give all our clients better information about the service that you purchased. <br>PLEASE NOTE: You evaluate from One Star Rating (very bad) to five stars (very good). <br><a href='$link'> Rate from here</a>";
   
   if(!$mail->send()) {
       echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
       echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
       echo("<p  class='text-center'><b>Review has been sent to your email , please check it ^^ </b></p>");
   }

}

?>
    </div>
    
</div>  

<?php 

include_once "includes/footer.php";

?>