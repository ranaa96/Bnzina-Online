<?php
    ob_start();
    session_start();
    $pageTitle="delete account";
    if(isset($_SESSION['id'])){
        include_once "includes/homeHeaderAfter.php";
    }else{
        header('location:404.php');
    }
    
?>


<section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Delete Account</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Delete Account</li>
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
                  
                    <h2>Delete Account</h2>


                    <h4 class="alert alert-danger">Are you sure delete your account : <?php echo($_SESSION['customer']); ?> </h4>
            <?php
			 			 
			if(isset($_POST['btndelete']))
			{
				include_once "includes/Customer.php";
                $cust=new Customer();
                    $cust->setcustomerPassword(sha1($_POST['txtpass']));
                    // echo($_SESSION['id']."<br>");
                    // echo(sha1($_POST['txtpass']));

                    $cust->setID($_SESSION['id']);
                    $log=$cust->checkByID();
                   
					if($row=mysqli_fetch_assoc($log))
					{
                        if($row['customerPassword']== $cust->getcustomerPassword()){
                            $msg=$cust->delete();
                            if($msg=="success")
                            {
  
                              if (file_exists("images/customer/".$_SESSION['id'].".jpg")) 
                              {
  
                                  $dir="images/customer/";
                                  $img=$_SESSION['id'];
                                  $fdir= $dir.$img.".jpg";
                                  unlink($fdir);
                               }
                            
                              echo("<h4 class='alert alert-success'>Your Account Has been deleted</h4>");
                              header("Refresh:5; url=logout.php");
                            }
                            else
                              echo($msg);
                        }
                        else 
                        echo("<h4 class='alert alert-danger'>Invaild password</h4>");
                         
                           

                    }
                   
                }
		?>


                    <div class="login-form" style="padding-bottom:0px !important;">

                        <form method="post" action="">
                            <div class="form-group">
                                <label>your password</label>
                                <input type="password" name="txtpass" placeholder=" Enter your password " required>

    

                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="form-group contact-form text-right m-auto">
                                        <button class="theme-btn btn-style-one" type="submit" name="btndelete">Delete Your Account</button>
                                    </div>
                                </div>
                                
                            </div>


                        </form>
                    </div>
                    <!--End Login Form -->


                </div>
</section>




<?php
include "includes/Footer.php";
?>