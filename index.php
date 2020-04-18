<?php
    ob_start();
    session_start();
    $pageTitle="Home";
    if(isset($_SESSION['id'])){
        include_once "includes/homeHeaderAfter.php";
    }else{
        include_once "includes/homeHeaderBefore.php";
    }
    
?>
<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                <!-- Slide 1 -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-1.jpg">

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','550','550']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-120','-120','-120','-120']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <h4>Your Vehicle is</h4>
                    </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['700','700','700','700']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-65','-65','-65','-65']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <h2>Save in our Hands</h2>
                    </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-whitespace="normal"
                    data-width="['700','700','450','450']"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['5','5','5','5']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <div class="text">We specialize in complete auto care at a low cost and in a <br> professional manner.</div>
                    </div>

                    <div class="tp-caption tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="auto"
                    data-whitespace="nowrap"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['105','105','105','105']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <a href="stations.php" class="theme-btn btn-style-one">Order Now</a>
                    </div>
                </li>

                <!-- Slide 2 -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/170.jpg">

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','550','550']"
                    data-whitespace="normal"
                    data-textalign="center"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-120','-120','-120','-120']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <h4> fuel for your journey </h4>
                    </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['700','700','700','700']"
                    data-textalign="center"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-65','-65','-65','-65']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <h2>Wherever you are</h2>
                    </div>

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-textalign="center"
                    data-whitespace="normal"
                    data-width="['700','700','550','450']"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['5','5','5','15']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <div class="text">Just Select Your Location <br> and <span style="color:#1c63b8;"><strong>BNZINA</strong></span> will do the rest.</div>
                    </div>

                    <div class="tp-caption tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="auto"
                    data-whitespace="nowrap"
                    data-textalign="center"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['105','105','105','105']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <a href="stations.php" class="theme-btn btn-style-one">Order Now</a>
                    </div>
                </li>

                <!-- Slide 3 -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1697" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/180.jpg">

                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['490','490','490','490']"
                    data-whitespace="normal"
                    data-hoffset="['0','15','15','15']"
                    data-voffset="['-120','-120','-120','-120']"
                    data-x="['right','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <h2>Towing Cars</h2>
                    </div>

                    
                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-whitespace="normal"
                    data-width="['490','490','390','490']"
                    data-hoffset="['0','15','15','15']"
                    data-voffset="['5','5','5','5']"
                    data-x="['right','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <div class="text">We cover a Large area in Cairo so We Can Tow Your Car Any Where Any Time<br> professional manner.</div>
                    </div>

                    <div class="tp-caption tp-resizeme"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['490','490','490','490']"
                    data-whitespace="nowrap"
                    data-hoffset="['0','15','15','15']"
                    data-voffset="['105','105','105','105']"
                    data-x="['right','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                        <a href="stations.php" class="theme-btn btn-style-one">Order Now</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->
<!-- About Us -->
<section class="about-us">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <h2>Welcome to <span style="color:#1c63b8;"><strong>BNZINA</strong></span></h2>
                <h4>Repair and Car Service</h4>
                <div class="primary-text">We offer a wide range of integrated  car services , we connect you to the closest gas station near your location so you cas choose what you need</div>
                <div class="text">We work with clients big and small across a range of sectors and we utilise all forms of services , to make sure that you are satisfied  </div>
                <ul class="list-style-one clearfix">
                    <li>Professional car cleaning</li>
                    <li>Monthly car inspections</li>
                    <li>Car towing assets and service</li>
                    <li>Creating new car assets and wheels</li>
                </ul>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="image-box">
                    <a href="about.html"><img src="images/resource/about-img.jpg" alt=""></a>
                </div>
                <div class="row clearfix">
                    <div class="column col-lg-12 col-md-12 col-sm-12">
                        <h3><a href="about.html">Our Mission</a></h3>
                        <p>Our main purpose  is to save wasting time and reduse trafic jam that happens sometimes because of gas stations</p>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->

    <!-- Fact counter -->
    <section class="fun-fact-section" style="background-image:url(images/background/1.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-avatar-1"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5>Total experts</h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-transport"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5>Service Done</h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-boy-broad-smile"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1226">0</span>
                        <div class="counter-title"><h5>Happy Client</h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-car-1"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5>Total Service</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fact counter -->

<!-- Feature Section -->
<section class="feature-section" style="background-image:url(images/background/2.jpg);">
    <div class="auto-container">
        <div class="title-box">
            <h2>Our Services</h2>
        </div>
        <div class="features-carousel owl-carousel owl-theme">
            <!-- Feature block -->
            <?php 
                include_once "includes/services.php";
                $service=new services();
                $r=$service->getAll();
                    while($row=mysqli_fetch_assoc($r)){
                echo("                    
                <div class='feature-block'>
                    <div class='inner-box'>
                        <div class='image-box'>
                            <a><img style='height:150px;' src='images/services/".$row["serviceId"].".jpg' alt='".$row["serviceName"]."'></a>
                        </div>
                        <div class='lower-content'>
                            <h3><a >".$row["serviceName"]."</a></h3>
                        </div>
                    </div>
                </div> "); } ?>
        </div>
                </div>
                </div>

<div class="auto-container" style="padding-top:2%;">
    <div class="sec-title text-center">
        <h2> OUR stations</h2>
        <div class="separator"><span class="flaticon-settings-2"></span></div>
    </div>
</div>
<?php
include_once "includes/stations.php";
$station = new stations ();
$locations=array(); 
$result=$station->getAll();
while( $row = mysqli_fetch_assoc($result) ){
    $name = $row['stationName'];
    $longitude = $row['longitude'];                              
    $latitude = $row['latitude'];
    $address=$row['stationAddress'];
    $locations[]=array( 'name'=>$name, 'lat'=>$latitude, 'lng'=>$longitude, 'add'=>$address );
} ?>


<!-- Contact Map Section -->
<section class="contact-map-section">
    <!--Map Outer-->
    <div class="map-outer" style="height:450px">
        <!--Map Canvas-->
        <div id="map-canvas"style="height:100%">
            
        </div>
        
    </div>
</section>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDS5AwUrTwTyRSjOA3KFWFnGFVe-6v8UOM"></script>

<script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;
    var locations = [
        <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
        [
            '',
            '<p class="text-center"><?php echo $locations[$i]['name'];?> <br><?php echo $locations[$i]['add'];?> </p>',
            <?php echo $locations[$i]['lat'];?>,
            <?php echo $locations[$i]['lng'];?>,
            0
        ]<?php if($j!=sizeof($locations))echo ","; }?>
    ];
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

    function initialize() {
        var mapOptions = {
        zoom: 7,
        center: origin
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        infowindow = new google.maps.InfoWindow();

        for(i=0; i<locations.length; i++) {
            var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1]);
                    infowindow.setOptions({maxWidth: 200});
                    infowindow.open(map, marker);
                }
            }) (marker, i));
            Markers[locations[i][4]] = marker;
        }

        locate(0);

    }

    function locate(marker_id) {
        var myMarker = Markers[marker_id];
        var markerPosition = myMarker.getPosition();
        map.setCenter(markerPosition);
        google.maps.event.trigger(myMarker, 'click');
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<!-- End Map Section -->
<div class="auto-container" style="padding-top:4%;">
        <div class="sec-title text-center">
            <h2> SPONSORS</h2>
            <div class="separator"><span class="flaticon-settings-2"></span></div>
        </div>
        </div>
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
                $x=0;
                ?>
                <?php while($row=mysqli_fetch_assoc($r)){
                    $x++;
                echo ('<li class="slide-item"><figure class="image-box">
                <a href="singleStation.php?id='.$row['stationId'].'">
                <img src="images/clients/'.$row['stationId'].'.jpg" alt="">
                </a></figure></li>');
                if($x==6) break;
            }
                ?>
           
                
            </ul>
        </div>
    </div>
</section>
<!--End Clients Section-->
<?php
    include_once "includes/footer.php";
?>