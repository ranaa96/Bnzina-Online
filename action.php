<?php 
    include_once "includes/stations.php";
    include_once "includes/services.php";
    include_once "includes/cart.php";

	if (isset($_POST['action'])) {
		session_start();
		
		if(isset($_POST['ssId'])) {
			$ob = new services();
			$ob->setSsID($_POST['ssId']);
            $servieInfo = $ob->getserviceByssId();
		}
    	$objCart = new cart();
		switch ($_POST['action']) {
			case 'add':
		    	$objCart->setCustomerId($_SESSION['id']);
				$objCart->setssid($servieInfo['ssId']);
				$itemCount = mysqli_fetch_assoc($objCart->getCount());
				
				//check if item already exists
				$check = $objCart->inCart();
				//if exist
				//update quantity and total amount
				if($result=mysqli_fetch_assoc($check)){
					$total =mysqli_fetch_assoc($objCart->getItemTotalAmount());
					$total =doubleVal($total['totalAmount'])+doubleval($servieInfo['servicePrice']);
					$qty   =mysqli_fetch_assoc($objCart->getItemQty());
					$qty   =doubleVal($qty['quantity'])+1;
					$objCart->setQuantity($qty);
					$objCart->setTotalAmount($total); 
					$data = ['itemCount'=>$itemCount['count']];
					if($objCart->update()) {
						echo json_encode( ["status" => 1, "msg" => "added to cart.",'data'=>$data] );
					   exit;
					} else {
						echo json_encode( ["status" => 0, "msg" => "opps!! Something went wrong."] );
					   exit;
					}
					//if not ->addItem
				}else{
					$objCart->setQuantity(1);
					$objCart->setTotalAmount($servieInfo['servicePrice']); 
					$itemCount['count']=intval($itemCount['count'])+1;
					$data = ['itemCount'=>$itemCount['count']];
					if($objCart->addItem()) {
						echo json_encode( ["status" => 1, "msg" => "added to cart.",'data'=>$data] );
					   exit;
					} else {
						echo json_encode( ["status" => 0, "msg" => "opps!! Something went wrong."] );
					   exit;
					}
				}              
				
				break;

			case 'update':
				$objCart->setCustomerId($_SESSION['id']);
				$objCart->setssid($servieInfo['ssId']);
				$objCart->setQuantity($_POST['quantity']);
				$objCart->setTotalAmount($servieInfo['servicePrice'] * $_POST['quantity']);
			 	if($objCart->updateItem()) {
					// $data =$objCart->calculatePrices();
					$cartItems = $objCart->getAllCartItems();
					$subTotal=0;
					$delivery=0;
					$total=0;
					while($row = mysqli_fetch_assoc($cartItems)){
						$subTotal+=$row['totalAmount'];
						$delivery+=$row['deliveryFees'];
					}
					// $subTotal=number_format($subTotal,2);
					// $delivery=number_format($delivery,2);
					$t=$subTotal + $delivery;
					$total = number_format($t, 2);
					$totalAmount = number_format($objCart->getTotalAmount(),2);
					$data=['subTotal'=>$subTotal,'delivery'=>$delivery,'total'=>$total ,'totalAmount'=>$totalAmount];
					
			 		echo json_encode( ["status" => 1, "msg" => "Cart updated.", 'data' => $data] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}
				break;

			case 'remove':
		    	$objCart->setCustomerId($_SESSION['id']);
			 	$objCart->setId($_POST['cartId']);

			 	if($objCart->removeItem()) {
					$cartItems = $objCart->getAllCartItems();
					$itemCount = mysqli_fetch_assoc($objCart->getCount());
					$subTotal=0;
					$delivery=0;
					$total=0;
					while($row = mysqli_fetch_assoc($cartItems)){
						$subTotal+=$row['totalAmount'];
						$delivery+=$row['deliveryFees'];
					}
					$subTotal=number_format($subTotal,2);
					$delivery=number_format($delivery,2);
					$t=$subTotal + $delivery;
					$total = number_format($t, 2);
					$totalAmount = number_format($objCart->getTotalAmount(),2);
					$data=['subTotal'=>$subTotal,'delivery'=>$delivery,'total'=>$total ,'totalAmount'=>$totalAmount,'itemCount'=>$itemCount['count']];
					

			 		echo json_encode( ["status" => 1, "msg" => "Cart item deleted.",'data'=>$data] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			case 'clear':
		    	$objCart->setCustomerId($_SESSION['id']);
			 	if($objCart->removeAllItems()) {

			 		echo json_encode( ["status" => 1, "msg" => "Cart is clear."] );
					exit;
			 	} else {
			 		echo json_encode( ["status" => 0, "msg" => "Opps!! Something went wrong."] );
					exit;
			 	}

				break;

			default:
				# code...
				break;
		}
	} else {
		header('location: index.php');
	}
 ?>