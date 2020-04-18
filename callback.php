<?php
require_once("config.php");

try {
    $accessToken = $handler->getAccessToken();
}catch(\Facebook\Exceptions\FacebookResponseException $e){
    echo "Response Exception: " . $e->getMessage();
    exit();
}catch(\Facebook\Exceptions\FacebookSDKException $e){
    echo "SDK Exception: " . $e->getMessage();
    exit();
}

if(!$accessToken){
    header('Location: login.php');
    exit();
}

$oAuth2Client = $FBObject->getOAuth2Client();
if(!$accessToken->isLongLived())
    $accessToken = $oAuth2Client->getLongLivedAccesToken($accessToken);

    $response = $FBObject->get("/me?fields=id, name, address, email, picture.type(large)", $accessToken);
    $userData = $response->getGraphNode()->asArray();
    $_SESSION['userData'] = $userData;
    $_SESSION['access_token'] = (string) $accessToken;
    if($_SESSION['flag']==0){
        include_once "includes/Customer.php";
                              
        $cust=new Customer();
        $cust->setcustomerName($_SESSION['userData']['name']);
        $cust->setcustomerPhone("");
        $cust->setcustomerEmail($_SESSION['userData']['email']);
        $cust->setcustomerPassword(sha1($_SESSION['userData']['id']));
        $cust->setcustomerAddress($_SESSION['userData']['address']);
        $cust->setcityName("");
        $msg=$cust->add();
        $_SESSION['msg']=$msg;
     
            header('Location: register.php');

    
        
    }
    else {
        
        include_once "includes/Customer.php";
        $cust = new Customer();
        $cust->setcustomerEmail($_SESSION['userData']['email']);
        $cust->setcustomerPassword(sha1($_SESSION['userData']['id']));
        $log= $cust->login();
        if($row=mysqli_fetch_assoc($log))
        {
            if(isset($_POST['check']))
            {
            setcookie("usercookie",$_SESSION['userData']['email'],time()+60*60*24*365);
            }
            $_SESSION['customer']=$row['customerName'];
            $_SESSION['id']=$row['customerId'];
            echo("<script> window.open('index.php', '_self')</script>");
        }else 
        echo("<h4 class='alert alert-danger'>Sorry invaild user or password </h4>");
        // header('Location: index.php');

    }
   
    exit();
?>