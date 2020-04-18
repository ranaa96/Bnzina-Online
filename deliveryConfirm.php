
<?php 
include_once "includes/orders.php" ;
$order = new orders();
$order->setCustomer($_SESSION['id']);
$result=$order->delivaryConfirm($_GET['orderID']);
if($result='success'){
    $r=$order->getOneOrder($_GET['orderID']);
    if($row=mysqli_fetch_assoc($r))
    $results=$order->delivaryStatus($row['deliveryId']);
    if($results='success')
    echo ('WELL DONE ^^');
    else echo ($results);

}
else echo ($result);
?>