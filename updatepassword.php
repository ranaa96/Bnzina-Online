<?php
	 ob_start();
     session_start();
     $pageTitle="update password";
     if(isset($_SESSION['id'])){
        header('location:404.php');
   }else{
       include_once "includes/pagesHeaderBefore.php";
   }
?>


<section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Update Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Update Password</li>
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
                    <h2>Update Password</h2>
                    <div class="login-form">
                        <!--Login Form-->

           
                        <?php
			 			 
                          if(isset($_POST['btnupdate']))
                          {
                              if($_POST['txtactivation']==$_SESSION['code'])
                              {
                                  include_once "includes/Customer.php";
                                  $cust=new Customer();
                                  $cust->setcustomerPassword(sha1($_POST['txtnewpass']));
                                  $cust->setID($_GET['id']);
                               
                                  $log=$cust->update();
                                  if($log=="success")
                                  {
                                      echo("<h4 class='alert alert-success'>Password has been updated</h4>"); 
                                      
                                      header("Refresh:5; url=login.php");
                                  }
                                  else
                                      echo("<h4 class='alert alert-danger'>Sorry This email not exist </h4>");
                              }
                              else
              
                              echo("<h4 class='alert alert-danger'>Sorry This activation is wrong </h4>");
                          }
                      ?>


                        <form method="post" action="">
                            <div class="form-group">
                                <label> Enter Your Activation</label>
                                <input type="text" name="txtactivation" placeholder="Activation Code " required>
                            </div>

                            <div class="form-group">
                                <label>Enter New Password</label>
                                <input type="password" name="txtnewpass" placeholder="New Password" required>
                            </div>

                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="form-group text-right">
                                        <button class="theme-btn btn-style-one" type="submit" name="btnupdate">Update password</button>
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