<?php 
    ob_start();
    session_start();
    $pageTitle="About";
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
                <h1>ABOUT US</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <section class="project-detail">
        <div class="auto-container">
   <!-- Lower Content -->
   <div class="lower-content">
                <h2>About bnzina online</h2>
                <p>Bnzina online gives you ways to save money and time on gas and other gas station's services at many gas stations throughout egypt. We are looking for remark able teammates to fulfill our growing staffing needs. 100% customer satisfaction and quality repairs has always been a staple in our business model and we are expanding to help serve our loyal and growing customer base. We are looking for experienced, motivated employees that are willing to work in a team-oriented repair process/model</p>
                <p>Our website offers a simple and easy-to-use fuel locator, after you’ve selected the category  or a particular gas company from the search, you’ll be presented with maps that will show you exactly where are the gas stations close to you now.</p>
            </div>

            <!-- Two Columns -->
            <div class="two-column">
                <h3>Scope of work</h3>
                <div class="row clearfix">
                    <div class="info-column col-lg-6 col-md-12 col-sm-12">
                        <p>This site is useful not only because it shows maps of nearby gas stations, although this is the main reason, but also because it’s updated regularly with more information about fuel stations in egypt, such as phone numbers and street addresses, to make it easier for you to locate a station in your area and can also order any of their services easily by a simple click..</p>
                        <ul class="list-style-one">
                            <li>You can find gas near you now </li>
                            <li> The locations of gas-stations that are open now and late at night.</li>
                            <li> Check petrol stations's services that is cheaper than others</li>
                            <li>We get the job done right — the first time</li>
                            <li>Same day service for most repairs and maintenance</li>
                        </ul>
                    </div>
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <a href="images/resource/image-1.jpg" class="lightbox-image"><img src="images/resource/image-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
</div>
</section>
    


                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->















<?php 
    include_once "includes/footer.php";
?>