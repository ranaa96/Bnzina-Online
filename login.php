<?php


ob_start(); 
// session_start();
$pageTitle = "Login";
if(isset($_SESSION['id'])){
    header('location:index.php');
}
include "includes/pagesHeaderBefore.php";
require_once('config.php');

// if(isset($_SESSION['access_token'])){
// 	header("Location: index.php");
// 	exit();
// }


$redirectTo = "http://localhost/bnzina/callback.php";
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data);

$_SESSION['flag']=1;
?>
<section class="page-title" style="background-image:url(images/background/8.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Login</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Home</a></li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
<!--Login Section-->
<section class="login-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-lg-6 col-md-12 col-sm-12 m-auto">
                <!-- Login Form -->
                <h2>Login</h2>
                <div class="login-form">
                    <!--Login Form-->
                    <?php
                        if(isset($_COOKIE['usercookie'])){
                            header('Location:index.php');
                        }	
                        if(isset($_POST['btnlog']))
                        {
                            include_once "includes/Customer.php";
                            $cust = new Customer();
                            $cust->setcustomerEmail($_POST['txtemail']);
                            $cust->setcustomerPassword(sha1($_POST['txtpass']));
                            $log= $cust->login();
                            if($row=mysqli_fetch_assoc($log))
                            {
                                if(isset($_POST['check']))
                                {
                                setcookie("usercookie",$_POST['txtemail'],time()+60*60*24*365);
                                }
                                $_SESSION['customer']=$row['customerName'];
                                $_SESSION['id']=$row['customerId'];
                                echo("<script> window.open('index.php', '_self')</script>");
                            }else 
                            echo("<h4 class='alert alert-danger'>Sorry invaild user or password </h4>");
                        }
                    ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="txtemail" placeholder="Email " required>
                        </div>
                        <div class="form-group">
                            <label>Enter Your Password</label>
                            <input type="password" name="txtpass" placeholder="Password" required>
                        </div>
                        <div class="clearfix">
                         
                            <div class="row  ">
                              
                                    <div class="col-6"><input type="checkbox" name="check" id="account-option-2">&nbsp; <label for="account-option-2">Remember me</label></div>
                                    <div class="col-2">&nbsp; </div>
                                    <div class="col-3 "><a href="forgetpassword.php" class="psw ">Forget My Password</a></div>
                              
                            </div>
                            
                                <div class="form-group text-center">
                                    <button class="theme-btn btn-style-one" type="submit" name="btnlog">LOGIN</button>
                                    <span class="d-block mt-2 ">OR</span>
                                    <button class=" theme-btn btn-style-one mt-1"  type="button" onclick="window.location = '<?php echo $fullURL ?>'">LOG IN WITH FACEBOOK</button>


  
                            </div>
                    
                    </form>
                </div>
                <!--End Login Form -->
            </div>
        </div>
    </div>
</section>
<?php
include "includes/Footer.php";
?>






