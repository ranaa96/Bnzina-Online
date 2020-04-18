<?php 
    ob_start();
    session_start();
    $pageTitle="Results";

    if(isset($_SESSION['id'])){
        include_once "includes/pagesHeaderAfter.php";
    }else{
        include_once "includes/pagesHeaderBefore.php";
    }

    include_once "includes/stations.php";
    include_once "includes/services.php";
    $station = new stations ();
    $service = new services ();
?>

    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Search Result</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Search Result</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Stations Related To Your search</h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <div class="filter-list row clearfix">
                    <!-- Project item -->
                    <?php 
                     if(isset($_GET['gId'])){$result=$station->getStationById($_GET['gId']);}
                     if(isset($_GET['sId'])){$result=$station->getServiceStation($_GET['sId']);}
                     if (isset($_GET['c'])){$result=$station->getCity($_GET['c']);}
                     if (isset($_GET['g'])){$result=$station->getGov($_GET['g']);}
                     if (isset($_GET['map'])){ $result=$station->getNearest($_SESSION['lat'],$_SESSION['lng']);}
                    
                    while($row=mysqli_fetch_assoc($result) )
                    {
                        ?>
                    <div class="gallery-item mix all engine wheel conditioner col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/gasstation/<?php echo $row['stationId'] ; ?>.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="singleStation.php?id=<?php echo $row['stationId'] ; ?>" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="images/gasstation/<?php echo $row['stationId'] ; ?>.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3 class="text-uppercase" ><a href="singleStation.php?id=<?php echo $row['stationId'] ; ?>"><?php echo $row['stationName'] ; ?></a></h3>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery section -->

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>Check out our repair service for your car and get a free clean</h3>
                <a class=" call-btn"><p style="color:white;" onMouseOut="this.style.color='white'" onMouseOver="this.style.color='#1c63b8'">Order Now</p></a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
<?php 
    include_once "includes/footer.php";
?>