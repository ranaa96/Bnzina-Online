<?php 
$pageTitle ="My Orders";
ob_start(); 
session_start();
if(isset($_SESSION['id'])){
    include "includes/pagesHeaderAfter.php";
}else{
    header('location:404.php');
}
include_once "includes/orders.php";
$order=new orders();
$order->setCustomer($_SESSION['id']);
?>

   <!--Page Title-->
   <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>My Orders</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>My Orders</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
<section class="container sidebar-page-container">
    <div class="sidebar-widget categories">
        
                            <div class="sidebar-title"><h2>Orders(
                                <?php
                                    
                                   
                                    $count=$order->getOrdersCount();
                                    if($row=mysqli_fetch_assoc($count))
                                    echo($row['countOrders']);
                                    ?>
                                
                                
                                )</h2></div>
                            <ul class="category-list">
                                <?php 
                                    $result= $order->getAll();
                                    while($rows=mysqli_fetch_assoc($result)){
                                ?>
                                <li><a href="orderdetails.php?orderId=<?php echo($rows['orderId']); ?>">Order  <?php echo($rows['orderId']); ?> <span style="color:#1c63b8">View Details</span> 
                                <br> Placed on <?php echo($rows['orderDate']); ?><br> 
                                <?php if($rows['orderStatus']=='pending')
                                echo('<i class="fas fa-times-circle" style="color:#c71f1f"></i><b style="color:#c71f1f"> Pending</b>');
                                else if ($rows['orderStatus']=='delivered')
                                echo('<i class="fas fa-check-circle" style="color:#478118"></i><b style="color:#478118"> DELIVERED ON '. date("h:ia").'</b>');
                                else if ($rows['orderStatus']=='shipped')
                                echo('<i class="fas fa-truck fa-flip-horizontal" style="color:#f68b1e"></i><b style="color:#f68b1e"> ON THE WAY</b>');

                                ?>
                                
                            </a></li>
                                    <?php } ?>
                           
                            </ul>
                        </div>
</section>
<?php 

include_once "includes/footer.php";


?>