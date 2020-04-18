<?php 
    ob_start();
    session_start();
    $pageTitle="station";
    if(isset($_SESSION['id'])){
        include_once "includes/pagesHeaderAfter.php";
    }else{
        include_once "includes/pagesHeaderBefore.php";
    }

    include_once "includes/rating.php";
    $rate=new rating();
?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Station Detail</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>station</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Gallery Section -->
    <section class="project-detail pb-0">
        <div class="auto-container">
            <!-- Upper box -->
            <!-- Project Info -->
            <div class="project-info">
                <div class="row clearfix">
                <?php 
                include_once "includes/stations.php";
                $ob = new stations();
                $id = $_GET['id'];
                $r = $ob->getStationById($id);
                if($row = mysqli_fetch_assoc($r)){
                    echo "
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-user'></span><strong>Station :</strong> 
                        ".$row['stationName']."</div>
                    </div>
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-phone'></span><strong>Phone:</strong>".$row['adminPhone']."
                        </div>
                    </div>
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-address-card'></span><strong>Address :</strong>
                        ".$row['stationAddress']."</div>
                    </div>
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-star'></span><strong>Rate:</strong>
                        ".$row['avgRate']."/5</div>
                    </div>
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-clock'></span><strong>open at :</strong>
                         ".date("h:ia",strtotime($row['openTime']))."</div>
                    </div>
                    <div class='column col-lg-6 col-md-6 col-sm-12'>
                        <div class='info'><span class='icon fa fa-clock'></span><strong>close at:</strong>
                         ".date("h:ia",strtotime($row['closeTime']))."</div>
                    </div>";}
                ?>
                </div>
            </div>
        </div>
<!-- Start Map Section -->
        <?php
            include_once "includes/stations.php";
            $station = new stations ();
            $locations=array(); 
            $result=$station->getStationById($_GET['id']);
            while( $row = mysqli_fetch_assoc($result) ){
                $name = $row['stationName'];
                $longitude = $row['longitude'];                              
                $latitude = $row['latitude'];
                $address=$row['stationAddress'];
                $locations[]=array( 'name'=>$name, 'lat'=>$latitude, 'lng'=>$longitude, 'add'=>$address );
            } 
       ?>
        <h3 class="text-center">Our Location</h3>
        <section class="contact-map-section w-50 mx-auto">
        <!--Map Outer-->
            <div class="map-outer" style="height:300px">
            <!--Map Canvas-->
                <div id="map-canvas"style="height:100%"></div>
            </div>
        </section>
        <?php include_once "includes/getLocationMap.php" ?>
    <!-- End Map Section -->
           <!-- Services Section -->
        <section class="services-section">
            <div class="auto-container">
            <h3 class="text-center">Our Services</h3>
                <div class="services-carousel owl-carousel owl-theme">
                <?php 
                    include_once "includes/stations.php";
                    $ob = new stations();
                    $id = $_GET['id'];
                    $r = $ob->getStationService($id);
                    while($row = mysqli_fetch_assoc($r)){
                ?>
                    <!-- Service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure><img src="images/services/<?php echo($row['serviceName']);?>.jpg" alt=""></figure>
                                <div class="title"><h4><?php echo($row['serviceName']);?></h4></div>
                            </div>
                            <div class="caption-box">
                                <div class="title-box">
                                    <span class="icon flaticon-electrical"></span>
                                    <h4><?php echo($row['serviceName']);?></h4>
                                </div>
                                <p>
                                <ul class="text-white">
                                <li>status: <?php if($row['serviceStatus']) echo ("Available"); else echo ("not Available");?></li>
                                <li>Price:  <?php echo($row['servicePrice']);?> EGP</li>
                                <li>delivery fees:  <?php echo($row['deliveryFees']);?></li>
                                </ul>
                                </p>
                                <button style="background:none !important; color:white;"class="btn read-more notice" onclick="addToCart(<?=$row['ssId'];?>)" <?php if(isset($_SESSION['id'])){echo "";}else{echo "disabled";}?> role="button">order << </button>
                                <!-- <button style="background:none !important; color:white;"class="btn read-more notice" onclick="addToCart(<?=$row['ssId'];?>)" role="button">order << </button> -->
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
    <!-- End Services Section -->
    </section>
  <!-- Testimonial Seectin -->
  <section class="testimonial-section" style="background-image: url(images/background/3.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>What Client Says</h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

            <!-- Testimonial Block -->
            <div class="testimonial-carousel owl-carousel owl-theme">
                <?php 
                $rate->setStationId($_GET['id']);
                $get=$rate->getAll();
                    while($row= mysqli_fetch_assoc($get)){
                ?>
				<div class="testimonial-block even">
					<figure class="thumb">
                    <?php
                            if (file_exists("images/Customer/".$row['customerId'].".jpg")) 
                            { 
                            ?>
                            
                            <img src="images/customer/<?php echo($row['customerId']);?>.jpg" alt="">
                            <?php }
            
                            else { ?>
                            <img src="images/Customer/custom.png"  />
                            <?php } ?>
                    
                
                
                
                </figure>
					<p>“<?php echo($row['rateComment']);?>”</p>
					<div class="name"><?php echo($row['customerName']);?></div>
					<span class="icon fa fa-quote-left"></span>
				</div>
            <?php } ?>

            </div>
        </div>
    </section>
    <!--End Testimonial Seectin -->
    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>Check out our repair service for your car and get a free clean</h3>
                <a href="#" class="call-btn">Order Now</a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
<!-- End Subscribe Section -->
<script type="text/javascript">
	function addToCart(ssId) {
		$('#loader').show();
		$.ajax({
			url: "action.php",
			data: "ssId=" + ssId + "&action=add",
			method: "post"
		}).done(function(response) {
            console.log(response);
            var data = JSON.parse(response);
			if(data.status == 0) {
				// $('#result').html(data.msg);
			} else {
                $('#itemCount').text(data.data.itemCount);
			}
		})
	}
</script>
<?php 
    include_once "includes/footer.php";
?>