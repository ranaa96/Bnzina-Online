<?php 
    ob_start();
    session_start();
    $pageTitle="Cart";
    if(isset($_SESSION['id'])){
        include_once "includes/pagesHeaderAfter.php";
    }else{
        header('location:404.php');
    }
    include_once "includes/cart.php";

      $ob->setCustomerId($_SESSION['id']);
      $c=$ob->getCount();
      $c = mysqli_fetch_assoc($c);
      $c=$c['count'];
      $cartCss = 'display: none';
      $emptyCss = 'display: block';
      if ($c > 0) {
          $cartCss = 'display: block';
          $emptyCss = 'display: none';
      }
      $sId;
?>
<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/8.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Order</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Order</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<!--Cart Section-->
<section class="cart-section">
    <div class="auto-container">
        <!--Cart Outer-->
        <div class="cart-outer"  id="fullCart" style="<?=$cartCss?>">
            <div class="table-outer">
                <button class="theme-btn btn-style-five float-right mb-3" id="clearItems">Empty Cart</button>
                <table class="cart-table">
                    <thead class="cart-header">
                        <tr>
                            <th>#</th>
                            <th class="prod-column">service</th>
                            <th class="prod-column">station</th>
                            <th class="price">unit price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>delivery fees</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ob->setCustomerId($_SESSION['id']);
                            $items =$ob->getAllCartItems();
                            $subTotal=0;
                            $delivery=0;
                            $total=0;
                            $count=1;
                           $sId=array();
                            while($row = mysqli_fetch_assoc($items)){
                                array_push($sId,$row["stationId"]);
                        ?>
                        <tr id="item_<?= $row['id']; ?>">
                            <td><h4 class="prod-title"><?php echo $count ?></h4></td>
                            <td><h4 class="prod-title"><?php echo $row['serviceName']; ?></h4></td>
                            <td><h4 class="prod-title"><a href="singleStation.php?id=<?php echo($row['stationId']);?>"><?php echo $row['stationName']; ?></a></h4></td>
                            <td ><h4 class="prod-title"><?php echo $row['servicePrice']; ?></h4></td>
                            <td >
                            <select onchange="updateCart(<?= $row['ssId']; ?>, <?= $row['id']; ?>)" class="form-control" id="qty_<?= $row['id']; ?>">
                                <?php 
                                    for ($i=1; $i <= 100; $i++) { 
                                ?>
                                <option value="<?= $i; ?>" <?php echo ($i == $row['quantity']) ? "selected" : ''; ?>><?= $i; ?></option>
                                <?php } ?>
                            </select>
                            </td>
                            <td class="total" id="totalPrice_<?= $row['id']; ?>"><?php echo $row['totalAmount']; ?></td>
                            <td class="total"><?php echo $row['deliveryFees']; ?></td>
                            <td>
                                <button id="clearItems" type="button" class="theme-btn btn-style-five px-3 py-2" onclick="removeItem(<?= $row['id']; ?>)">
                                <span class="fa fa-times"></span>
                                </button>
                            </td><?php $count ++;?>
                        </tr>
                                <?php $subTotal+=$row['totalAmount'];
                                      $delivery+=$row['deliveryFees'];
                                ?>
                        <?php } $total +=($subTotal + $delivery);?>
                    </tbody>
                </table>
            </div>
            <div class="row clearfix">
                <div class="column pull-right col-lg-6 col-md-12 col-sm-12">
                    <!--Totals Table-->
                    <ul class="totals-table">
                        <li><h3>Order Totals</h3></li>
                        <li class="clearfix total"><span class="col">Sub Total</span><span class="col price" id="subTotal"><?php echo number_format($subTotal,2);?></span></li>
                        <li class="clearfix total"><span class="col">Delivery Fees</span><span class="col price"id="delivery"><?php echo number_format($delivery,2); ?></span></li>
                        <li class="clearfix total"><span class="col">Total</span><span class="col price" id="finalPrice"><?php echo number_format($total,2); $_SESSION['total']=$total;?></span></li>
                        <li class="text-right"><form method="post"><button type="submit" name="checkout" class="theme-btn btn-style-five proceed-btn">Proceed to Checkout</button></form></li>
                        <?php  

                        if(isset($_POST['checkout'])){
                            $flag=0;
                            $name=array();
                            include_once "includes/stations.php";
                            $station = new stations();
                            
                           $in=$station->getCloseID();
            
                            while($r=mysqli_fetch_assoc($in)){

                                for($i=0;$i<count($sId);$i++){
                                    if($sId[$i]==$r['stationId']){
                                        // $flag=1;
                                        array_push($name,$sId[$i]);
                                        // break;

                                    }
                                    else{
                                     
                                                   
                                    }
                                    
                                }
                                



                            }

                                                        

                            if(!empty($name)){
                                $s="";
                                foreach($name as $n){
                                    
                                    if($s==$n){}
                                    else{
                                        $stationName=mysqli_fetch_assoc($station->getStationById($n)) ;
                                        echo"<li class='text-center'><b> ".$stationName['stationName']." station is closed , Please delete it<b> </li>";
                                    }
                                    $s=$n;

                                   
                                }
                            }
                            else {
                                header("location:checkout.php");

                                    
                            }
                              

                        }
                        
                        
                      
                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <div id="emptyCart" class="row" style="<?=$emptyCss?>">
                <div class="col-md-12 text-center">
                    <p><strong>Your cart is empty.</strong></p>
                </div>
        </div>

    </div>
</section>
<!--End Cart Section-->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
    // $('#clearItems').click(function(){
    //     console.log('clicked');
    // });
    $('#clearItems').click(function(){
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "action=clear",
            method: "post"
        }).done(function(response) {
            console.log(response);
            var data = JSON.parse(response);
            // $('#loader').hide();
            // $('.alert').show();
            if(data.status == 0) {
                // $('.alert').addClass('alert-danger');
                // $('#result').html(data.msg);
            } else {
                // $('.alert').addClass('alert-success');
                // $('#result').html(data.msg);
                $('#itemCount').text( 0 );
                $('#fullCart').hide();
                $('#emptyCart').show();
            }
        })
    })

    function updateCart(ssId, cartId) {
        console.log($('#qty_'+cartId).val())
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "ssId=" + ssId +"&action=update&quantity="+$('#qty_'+cartId).val(),
            method: "post"
        }).done(function(response) {
            console.log(response)
            var data = JSON.parse(response);
            // $('#loader').hide();
            // $('.alert').show();
            if(data.status == 0){
                // $('.alert').addClass('alert-danger');
                // $('#result').html(data.msg);
            } else {
                // $('.alert').addClass('alert-success');
                $('#result').html(data.msg);
                $('#totalPrice_'+cartId).text( data.data.totalAmount );
                $('#subTotal').text( data.data.subTotal);
                $('#delivery').text( data.data.delivery);
                $('#finalPrice').text( data.data.total);
                console.log(data);
            }
        })
    }

    function removeItem(cartId) {
        $('#loader').show();
        $.ajax({
            url: "action.php",
            data: "cartId=" + cartId + "&action=remove",
            method: "post"
        }).done(function(response) {
            console.log(response);
            var data = JSON.parse(response);
            if(data.status == 0) {
                // $('.alert').addClass('alert-danger');
                // $('#result').html(data.msg);
            } else {
                // $('.alert').addClass('alert-success');
                // $('#result').html(data.msg);
                $('#item_'+cartId).remove();
                $('#itemCount').text( data.data.itemCount);

                if (data.data.itemCount == 0.00) {
                    $('#fullCart').hide();
                    $('#emptyCart').show();
                } else {
                    // $('.alert').addClass('alert-success');
                    // $('#result').html(data.msg);
                    $('#totalPrice_'+cartId).text( data.data.totalAmount );
                    $('#subTotal').text( data.data.subTotal);
                    $('#delivery').text( data.data.delivery);
                    $('#finalPrice').text( data.data.total);
                    console.log(data);
                }
            }
        })
    }
</script>
    <!-- End Subscribe Section -->
<?php include_once "includes/footer.php" ?>