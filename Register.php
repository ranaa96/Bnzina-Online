<?php
 ob_start();
//  session_start();
 $pageTitle="Register";
 if(isset($_SESSION['id'])){
     header('location:404.php');
 }else{
     include_once "includes/pagesHeaderBefore.php";
 }

 require_once('config.php');



$redirectTo = "http://localhost/bnzina/callback.php";
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data);

$pageTitle = "Register";
$_SESSION['flag']=0;
?>
<section class="page-title" style="background-image:url(images/background/8.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Registration</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.php">Home</a></li>
                <li>Registration</li>
            </ul>
        </div>
    </div>
</section>
    <!--End Page Title-->
    <!--Register Section-->
<section class="login-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-lg-6 col-md-12 col-sm-12 m-auto">
                <!-- Register Form -->
                <h2>Registeration</h2>
                <div class="login-form">
                    <!--RegisterForm-->
                    <?php
                        if(isset($_POST['btnregister']))
                        {
                            if(isset($_POST['check']))
                            {
                                include_once "includes/Customer.php";
                                if($_POST['txtpass']==$_POST['txtconfirm'])
                                {
                                    $cust=new Customer();
                                    $cust->setcustomerName($_POST['txtname']);
                                    $cust->setcustomerPhone($_POST['txtphone']);
                                    $cust->setcustomerEmail($_POST['txtemail']);
                                    $cust->setcustomerPassword(sha1($_POST['txtpass']));
                                    $cust->setcustomerAddress($_POST['txtaddress']);
                                    $cust->setcityName($_POST['txtcity']);
                                    $msg=$cust->add();
                                    if($msg=="success"){
                                        echo("<h4 class='alert alert-success border-success '>Your Account Has Been Created</h4>");
                                        header("Refresh:3,url=login.php");
                                    }
                                    else if(strpos($msg,'UQPhone'))
                                        echo (" <div class='container'><h5 class='alert alert-danger border-danger w-50 m-auto my-5'> your phone is used </h5></div>");  
                                    else if(strpos($msg,'UQEmail'))
                                        echo (" <div class='container'><h5 class='alert  alert-danger border-danger w-50 m-auto my-5'> your email is used </h5></div>");  
                                    else
                                        echo (" <div class='container'><h5 class='alert alert-danger border-danger w-50 m-auto my-5'>".$msg."</h5></div>"); 
                                }
                                else 
                                    echo("<h4 class='alert alert-danger border-danger rounded-pill text-center'>Sorry Password not Match</h4>");
                            }else
                                echo ("<div class='container'><h5 class='alert alert-warning border-warning w-50 m-auto my-5'> please accept all terms </h5> </div>");
                        }
                    ?>
                    <?php 
                    if(isset($_SESSION['msg'])){
                        if($_SESSION['msg']=="success"){
                            echo("<h4 class='alert alert-success border-success '>Your Account Has Been Created</h4>");}
                        else if(strpos($_SESSION['msg'],'UQPhone'))
                            echo (" <div class='container'><h5 class='alert alert-danger border-danger w-50 m-auto my-5'> your phone is used </h5></div>");  
                        else if(strpos($_SESSION['msg'],'UQEmail'))
                            echo (" <div class='container'><h5 class='alert  alert-danger border-danger w-50 m-auto my-5'> your email is used </h5></div>");  
                        else
                            echo (" <div class='container'><h5 class='alert alert-danger border-danger w-50 m-auto my-5'>".$_SESSION['msg']."</h5></div>"); 
                            unset($_SESSION['msg']);

                    }
                    
                    ?>
                    <form method="post" action="#">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="txtname" placeholder="your name" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email"  name="txtemail" placeholder="your email" required>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label>Password</label>
                                <input type="password" name="txtpass" placeholder=" your password" required>
                            </div>
                            <div class="col form-group">
                                <label> confirm Password</label>
                                <input type="password" name="txtconfirm"  placeholder="confirm password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="txtphone" placeholder="your phone" required>
                        </div>
                        <div class="form-group">
                            <label> Address</label>
                            <input type="text"  name="txtaddress" placeholder="your Address" required>
                        </div>
                        <div class="form-group ">
                            <label for="inputState">City</label>
                            <select name="txtcity" class="form-control">
                                <option selected>Choose City</option>
                                <?php          
                                    include_once "includes/city.php";
                                    $cit=new city();
                                    $rs=$cit->getALL();              
                                    while($rows=mysqli_fetch_assoc($rs))
                                    {    
                                        echo("<option value='".$rows['cityNameEnglish']."'> ".$rows['cityNameEnglish']." </option>");
                                    }
                                ?>                         
                            </select>                                   
                        </div>
                        <div class="clearfix">
                            <div class="row "><div class="ml-3">
                                <input type="checkbox" name="check" id="account-option-2">&nbsp; <label for="account-option-2">I accept the terms and conditions</label>
                            </div></div>
                            <div class="form-group text-center">
                                <button class="theme-btn btn-style-one" type="submit" name="btnregister"> Register</button>
                                <span class="d-block mt-2 ">OR</span>
                                <button class="theme-btn btn-style-one mt-1" type="submit" name="fbregister"  onclick="window.location = '<?php echo $fullURL ?>'" > Register with facebook</button>
                            </div>
                        </div>
                    
                               
                   
                    </form>
                </div>
                <!--End Register Form -->
            </div>
        </div>
    </div>
</section>

<?php
include "includes/Footer.php"
?>


