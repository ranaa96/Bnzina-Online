<?php 
	ob_start(); 
	session_start();
	$pageTitle="Search";
	if(isset($_SESSION['id'])){
		include_once "includes/pagesHeaderAfter.php";
	}else{
		include_once "includes/pagesHeaderBefore.php";
	}
	include_once "includes/stations.php";
	include_once "includes/services.php";
	$station = new stations ();
	$service = new services ();
	$lat;
	$lng;
?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Search</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Search</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
 	<!-- Search Section -->
     <section class="updated-services-section">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title text-center">
					<h2>Advanced Search</h2>
					<div class="separator"><span class="flaticon-settings-2"></span></div>
				</div>
				<div class="inner-container">
					<!-- Search Tabs-->
					<div class="services-tabs tabs-box">
						<div class="row clearfix">
							<!--Column-->
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<!--Tab Btns-->
								<ul class="tab-btns tab-buttons clearfix">
									<li class="title">100% Quality <strong>Guarantee</strong></li>
									<li data-tab="#prod-open" class="tab-btn">Open now</li>
									<li data-tab="#prod-transmission" class="tab-btn active-btn">By Service</li>
									<li data-tab="#prod-engine" class="tab-btn">By City</li>
									<li data-tab="#prod-brake" class="tab-btn">By Government</li>
									<li data-tab="#prod-general" class="tab-btn">By Station</li>
									<li data-tab="#prod-repair" class="tab-btn">By Location</li>
								</ul>
							</div>
							<!--Column-->
							<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
								<!--Tabs Container-->
								<div class="tabs-content">
									<!-- Tab -->
									<div class="tab" id="prod-general">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column col-lg-8 col-md-8 col-sm-12">
													<div class="inner-column">
														<h2>Search By Station</h2>
														<div class="row clearfix">
                                                            <?php 
                                                            $result= $station->getAll();
                                                            while ($row=mysqli_fetch_assoc($result)){
                                                            ?>
															<div class="column col-lg-6 col-md-6 col-sm-12">
																<ul class="list-style-three">
                                                                <a href="searchResult.php?gId=<?php echo($row['stationId']); ?>"><li><?php echo ($row['stationName']) ; ?></li></a>                                                                
																</ul>
                                                            </div>
                                                            <?php }?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--Tab  / Active Tab -->
									<div class="tab active-tab" id="prod-transmission">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column col-lg-8 col-md-8 col-sm-12">
													<div class="inner-column">
														<h2>Search By Service</h2>
														<div class="row clearfix">
                                                        <?php 
                                                            $result= $service->getAll();
                                                            while ($row=mysqli_fetch_assoc($result)){

                                                            ?>
															<div class="column col-lg-6 col-md-6 col-sm-12">
																<ul class="list-style-three">
                                                                <a href="searchResult.php?sId=<?php echo($row['serviceId']); ?>"><li><?php echo ($row['serviceName']) ; ?></li></a>                                                                
																</ul>
                                                            </div>
                                                            <?php }?>
														</div>
													</div>
												</div>
												<!-- Image Column -->
												<!-- <div class="image-column col-lg-6 col-md-6 col-sm-12">
													<div class="inner-column">
														<div class="image">
															<img src="images/resource/p.jpg" alt="" />
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									<!-- Tab -->
									<div class="tab" id="prod-engine">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column col-lg-8 col-md-8 col-sm-12">
													<div class="inner-column">
														<h2>Search By City</h2>
														<div class="row clearfix">
                                                        <?php 
                                                            $result= $station->getCityView();
                                                            while ($row=mysqli_fetch_assoc($result)){
                                                            ?>
															<div class="column col-lg-6 col-md-6 col-sm-12">
																<ul class="list-style-three">
                                                                <a href="searchResult.php?c=<?php echo($row['cityNameEnglish']); ?>"><li><?php echo ($row['cityNameEnglish']) ; ?></li></a>                                                                
																</ul>
                                                            </div>
                                                            <?php }?>
														</div>
													</div>
												</div>
												<!-- Image Column -->
												<!-- <div class="image-column col-lg-6 col-md-6 col-sm-12">
													<div class="inner-column">
														<div class="image">
															<img src="images/resource/p.jpg" alt="" />
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>

									<!-- Tab -->
									<div class="tab" id="prod-open">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column col-lg-8 col-md-8 col-sm-12">
													<div class="inner-column">
														<h2>Open now</h2>
														<div class="row clearfix">
                                                        <?php 
                                                            //  include "includes/stations.php";
															//  $ob = new stations();
															 $r = $station->getOpen();
															 while($row=mysqli_fetch_assoc($r)){
																
																 
                                                            ?>
															<div class="column col-lg-6 col-md-6 col-sm-12">
																<ul class="list-style-three">
                                                                <a href="searchResult.php?gId=<?php echo($row['stationId']); ?>"><li><?php echo ($row['stationName']) ; ?></li></a>                                                                
																</ul>
                                                            </div>
                                                            <?php  
								  
								}?>
														</div>
													</div>
												</div>
												<!-- Image Column -->
												<!-- <div class="image-column col-lg-6 col-md-6 col-sm-12">
													<div class="inner-column">
														<div class="image">
															<img src="images/resource/p.jpg" alt="" />
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									<!-- Tab -->
									<div class="tab" id="prod-brake">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column col-lg-8 col-md-8 col-sm-12">
													<div class="inner-column">
														<h2>Search By Government</h2>
														<div class="row clearfix">
                                                        <?php 
                                                            $result= $station->getGovView();
                                                            while ($row=mysqli_fetch_assoc($result)){

                                                            ?>
															<div class="column col-lg-6 col-md-6 col-sm-12">
																<ul class="list-style-three">
                                                                <a href="searchResult.php?g=<?php echo($row['governorateNameEnglish']); ?>"><li><?php echo ($row['governorateNameEnglish']) ; ?></li></a>                                                                
																</ul>
                                                            </div>
                                                            <?php }?>
														</div>
													</div>
												</div>
												<!-- Image Column -->
												<!-- <div class="image-column col-lg-6 col-md-6 col-sm-12">
													<div class="inner-column">
														<div class="image">
															<img src="images/resource/p.jpg" alt="" />
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									<!-- Tab -->
									<div class="tab" id="prod-repair">
										<div class="content">
											<div class="row clearfix">
												<!-- Content Column -->
												<div class="content-column  col-sm-12">
													<div class="inner-column">
														<h2>Search for Nearest Station</h2>
														<div class="row h-100 w-100">
															<!-- Map -->
															<!--Start map Sectipn-->
															<div class="column col-12" style="height:200px !important">
																<div id="map" style="height:100%"></div>
																<?php include_once "includes/selectMap.php" ?>
															</div>
															<!--End map Sectipn-->
                                                        </div>
                                                        <?php 
                                                        if(isset($_POST['search'])){
                                                            // header("location:searchResult.php?lat='".$_POST['latt']."'&lng='".$_POST['lngg']."'");
                                                            $_SESSION['lat']=$_POST['latt'];
                                                            $_SESSION['lng']=$_POST['lngg'];
                                                            header("location:searchResult.php?map");
                                                        }
                                                        ?>
                                                        <form method="post" >
                                                        	<button type="submit" class="theme-btn btn-style-one" name="search">Search </button>
															<div id="currentLocation">
															</div>
                                                    	</form>
													</div>
												</div>										
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Search Section -->
    <!--Clients Section-->
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