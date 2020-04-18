<?php 
    ob_start();
    session_start();
    $pageTitle="Contact Us";
    if(isset($_SESSION['id'])){
       include_once "includes/pagesHeaderAfter.php";
    }else{
        include_once "includes/pagesHeaderBefore.php";        
    }
?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Contact us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Contact US</h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

             <div class="contact-form">
                <?php
                    if(isset($_POST['submit'])){
                        include_once "includes/contacts.php";
                        $contact = new contact();
                        $contact->setName($_POST['username']);
                        $contact->setPhone($_POST['phone']);
                        $contact->setEmail($_POST['email']);
                        $contact->setSubject($_POST['subject']);
                        $contact->setMessage($_POST['message']);
                        $add=$contact->add();
                        if($add=='success'){
                            echo "<p class='alert alert-success show fade'>Your message has been sent, kindly wait for our phone call</hp>";
                        }else{
                            echo "<p class='alert alert-success show fade'>there was an error sending your message, kindly try again later</hp>";
                        }
                    }
                ?>
                <form method="post" >
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group pull-right">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone No" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button type="submit" name="submit">send Massage</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="contact-info">
                <div class="row clearfix">
                    <div class="image-column col-lg-8 col-md-12 col-sm-12">
                        <figure><img src="images/resource/car-image.png" alt=""></figure>
                    </div>

                    <div class="info-column col-lg-4 col-md-12 col-sm-12">
                        <h3>Contact Info</h3>
                        <ul>
                            <li>
                                <span class="icon flaticon-placeholder"></span>
                                <p><strong>Address:</strong><br>cairo dummy address.</p>
                            </li>
                            <li>
                                <span class="icon flaticon-phone"></span>
                                <p><strong>Phone:</strong>+1 800125 6524</p>
                                <p><span>Email:</span><a href="#">bnzina.online@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section class="clients-section">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                <?php 
                    include_once "includes/stations.php";
                    $station = new stations ();
                    $r = $station->getAll();
                    ?>
                    <?php while($row=mysqli_fetch_assoc($r)){
                    echo ('<li class="slide-item"><figure class="image-box"><a href="singleStation.php?id='.$row['stationId'].'"><img src="images/clients/'.$row['stationId'].'.jpg" alt=""></a></figure></li>'); } ?>
                </ul>
            </div>
        </div>
    </section>
<!--End Clients Section-->
<?php 
    include_once "includes/footer.php";
?>