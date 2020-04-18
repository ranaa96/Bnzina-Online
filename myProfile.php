<?php
 ob_start();
 session_start();
 $pageTitle="my Profile";
 if(isset($_SESSION['id'])){
     include_once "includes/pagesHeaderAfter.php";
 }else{
     header('location:404.php');
 }
?>
<section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>My Profile</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>My Profile</li>
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
                    <div class="login-form">
                        <!--Login Form-->
                        <h2 style="color:#1c63b8">My Profile</h2>



                        <?php

            include_once "includes/Customer.php";
            $cust=new Customer();

            $cust->setID($_SESSION['id']); 

            $log=$cust->checkByID();
            if($row=mysqli_fetch_assoc($log))
            {
                
             
            ?>


                        <table class="table table-striped">
                      
                                   <tr>
                            <td colspan="2" style="text-align:center">
                            <?php
                            if (file_exists("images/Customer/".$row['customerId'].".jpg")) 
                            { 
                            ?>
                            
                            <img src="images/Customer/<?php echo($row['customerId']);?>.jpg" width="100px" height="100px" class="roundcircle" id="img1" />
                            <?php }
                            else if (isset($_SESSION['userData']['picture']['url'])){

                            ?>
			                <img src="<?php echo $_SESSION['userData']['picture']['url'] ?>" width="100px" height="100px" class="roundcircle" id="img1">
                            <?php
                            } else { ?>
                            <img src="images/Customer/custom.png" width="100px" height="100px" class="roundcircle" id="img1" />
                            <?php } ?>
                            
            </td>
                            </tr>
                        <tr>
                        <th scope="col">Name</th>
                        <td><?php echo($row['customerName']); ?></td>
                        </tr>
                        <tr>
                        <th scope="col">Email</th>
                        <td><?php echo($row['customerEmail']); ?></td>
                        </tr>
                
                        <tr>
                        <th scope="col">Phone</th>
                        <td><?php echo($row['customerPhone']); ?> </td>
                        </tr>
                
                        <tr>
                        <th scope="col">Address</th>
                        <td> <?php echo($row['customerAddress']); ?></td>
                        </tr>
                        <tr>
                        <th scope="col">CityName</th>
                        <td><?php echo($row['cityName']); ?> </td>
                        </tr>
                    
                </table>

                <?php 
                       } 
                           ?>
    


                        <form method="post" action="">
                        
                        <div class="mt-3 contact-form">
                                   
                                 
                        <button type="submit" value="" class=" mt-3 theme-btn"  name="btnupdate"> Update Profile</button>

                                        <!-- <a href="updateProfile.php" class="d-block  theme-btn form-control">Update Profile</a> -->
                                 
                                        <button type="submit" value="" class=" mt-3 theme-btn"  name="btndelete"> Delete Your Account</button>
                            </div>

                            <div class="clearfix">
                                
                              <?php 
                              if(isset($_POST['btnupdate'])) header("location:updateProfile.php");
                              if(isset($_POST['btndelete'])) header("location:DeleteAccount.php");

                              
                              
                              ?>





                        </form>
                    </div>
                    <!--End Login Form -->


                </div>
</section>




                      
<?php
    include "includes/footer.php";
 ?>