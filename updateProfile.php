<?php
    ob_start();
    session_start();
    $pageTitle="Update profile";
    if(isset($_SESSION['id'])){
        include_once "includes/pagesHeaderAfter.php";
    }else{
        header('location:404.php');
    }
?>
<section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1> Update Profile</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="indexx.php">Home</a></li>
                    <li>Update Profile</li>
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

                        <h2 style="color:#1c63b8">Update Profile</h2>





                        <?php
            include_once "includes/Customer.php";
            $cust=new Customer();
        if(isset($_POST['btnupdate']))
        {
          
            $cust->setcustomerName($_POST['txtname']);
            $cust->setcustomerEmail($_POST['txtemail']);
            $cust->setcustomerPhone($_POST['txtphone']);
            $cust->setcustomerAddress($_POST['txtaddress']);
            $cust->setcityName($_POST['txtcity']);
            $cust->setID($_SESSION['id']); 
             
          
            $msg=$cust->updateAll();
            
            $dir="images/customer/";
            $image=$_FILES['file']['name'];
            $temp_name=$_FILES['file']['tmp_name'];
            $img=$_SESSION['id'];
            if($image!="")
            {
                $fdir= $dir.$img.".jpg";
                move_uploaded_file($temp_name, $fdir);
            }
            else {
                echo('error'.$image);
                // mysqli_error();
            }
            if($msg=="success")
            {
                $_SESSION['customer']=$_POST['txtname'];

                // echo("<h4 class='alert alert-success'>Your Account Has Been Updated</h4>");
                // header("Refresh:5; url=myProfile.php");
                header('Location: myProfile.php');
            }
                else
                echo($msg)  ;
             
        }

           
           
            $cust->setID($_SESSION['id']); 
            $log=$cust->checkByID();
            $row;
           
            if($row=mysqli_fetch_assoc($log))
            {
                
            ?>


                        <form method="post" action="" enctype="multipart/form-data">
                        <table class="table table-striped">
                      
                                   <tr>
                            <td colspan="2" style="text-align:center" >
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
                                } 
                            else { ?>
                            <img src="images/Customer/custom.png" width="100px" height="100px" class="roundcircle"  id="img1"/>
                            <?php } ?>
                            <input id="inputUpload" style="display: none;" type="file" name="file" accept=".jpg,.jpeg"  />
                            <input type="button" style="	background-color:#1c63b8 !important;" class=" btn btn-circle position-absolute text-light uploadpc" id="btnUpload" value="+" onclick="showPhoto()" >

                                        </td>
                            </tr>

                        <tr>
                        <th scope="col">Name</th>
                        <td> <input type="text" class="form-control" name="txtname" value='<?php echo($row['customerName']); ?>' /> </td>
                        </tr>
                        <tr>
                        <th scope="col">Email</th>
                        <td> <input type="text" class="form-control" name="txtemail" value='<?php echo($row['customerEmail']); ?>' /></td>
                        </tr>
                
                        <tr>
                        <th scope="col">Phone</th>
                        <td><input type="text" class="form-control" name="txtphone" value='<?php echo($row['customerPhone']); ?>' /> </td>
                        </tr>
                
                        <tr>
                        <th scope="col">Address</th>
                        <td> <input type="text" class="form-control" name="txtaddress" value='<?php echo($row['customerAddress']); ?>' /></td>
                        </tr>
                        <tr>
                        <th scope="col">CityName</th>


                        <td>
                        
                        
                        <select name="txtcity" class="form-control">
                                <option value="Choose City" >Choose City </option>            
                                    <?php          
                                        include "includes/city.php";
                                        $cit=new city();
                                        $rs=$cit->getALL();              
                                        while($rows=mysqli_fetch_assoc($rs))
                                        {    $s="";
                                            if($rows['cityNameEnglish']==$row['cityName'])
                                                $s="selected";
                                            echo("<option ".$s." value='".$rows['cityNameEnglish']."'> ".$rows['cityNameEnglish']." </option>");
                                        }
                                    ?>                         
                            </select>
                            
                        
                        
                        </td>
                       
                       
                       
                       
                        </tr>
                    
                </table>

                <?php } ?>
    


                      
                        
                            <div class="mt-3 contact-form">
                                    
                            <button type="submit"  class=" mt-3 theme-btn"  name="btnupdate"> Update Profile</button>

                            
                                </div>

                                <div class="clearfix">
                                    
                                


                        </form>
                    </div>
                    <!--End Login Form -->


                </div>
</section>






<?php
include "includes/footer.php";
?>








