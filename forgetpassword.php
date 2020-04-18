<?php
     ob_start();
     session_start();
     $pageTitle="forgot password";
     if(isset($_SESSION['id'])){
          header('location:404.php');
     }else{
         include_once "includes/pagesHeaderBefore.php";
     }
    require_once "src/PHPMailer.php";
    require_once "src/Exception.php";
    require_once "src/SMTP.php";
    require_once "vendor/autoload.php";
    
?>




<section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Forget Password</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Forget Password</li>
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
                  
                    <h2>Forget Password</h2>

  
                    <?php
			 			 
                          if(isset($_POST['btncheck']))
                          {
                                  include_once "includes/Customer.php";
                                  $cust=new Customer();
                                  $cust->setcustomerEmail($_POST['txtemail']);
                               
                                  $log=$cust->checkEmail();
                                  $activation;
                                  if($row=mysqli_fetch_assoc($log))
                                  {
                                       //generate random and send email
                                       $activation=rand(1111,9999);
                                       $link="https://localhost/bnzina/updatepassword.php?id=".$row['customerId'];
                                      
              
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
              
                                          $mail->setFrom('bnzina.online@gmail.com', 'NTI');
                                          $mail->addAddress($_POST['txtemail'], "nn");
                                      
                                          
                                          $mail->Subject = 'Forget Password Bnzina Online';
                                          $mail->Body = "Dear Mr/Ms , Your Activation Code for your account is ".$activation ." , Please  visit this link to update your password ".$link;
                                          
                                          if(!$mail->send()) {
                                              echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                                              echo "Mailer Error: " . $mail->ErrorInfo;
                                          } else {
                                              $_SESSION['code']=$activation;
                                              echo("<h4 class='alert alert-success'>Message has been sent , check your email </h4>");
                                          }
                                       
                                  }
                                  else
                                      echo("<h4 class='alert alert-danger'>Sorry This email not exist </h4>");
                          }
                      ?>



                    <div class="login-form">

                        <form method="post" action="">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="txtemail" placeholder=" enter your email " required>

                           
                            

                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="form-group text-right m-auto">
                                        <button class="theme-btn btn-style-one" type="submit" name="btncheck">Send Activation Code</button>
                                    </div>
                                </div>
                                
                            </div>


                        </form>
                    </div>
                    <!--End Login Form -->


                </div>
</section>



<?php
include "includes/footer.php";
?>