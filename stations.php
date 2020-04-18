<?php 
    ob_start();
    session_start();
    $pageTitle="Stations";
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
                <h1>All Gas Stations</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>All Gas Stations</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>All Gas Stations</h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                    <!-- Project item -->
                    <?php
                        include "includes/stations.php";
                        $ob = new stations();
                        $r = $ob->getAll();
                        $count = mysqli_num_rows($r);
                        $results_per_page = 9;
                        $noPages = ceil($count / $results_per_page);
                        $page;
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        }else {
                            $page = $_GET['page'];
                        }
                        $Previous = $page - 1;
                        $Next = $page + 1;
                        $this_page_first_result = ($page-1)*$results_per_page;
                        $ob->setResults_per_page($results_per_page);
                        $ob->setThis_page_first_result($this_page_first_result);
                        $res=$ob->getPaginate();

                        echo"<nav  class='text-center m-5' aria-label='Page navigation example'>
                            <ul class='pagination justify-content-center'>";
                                echo"<li class='page-item'><a class='page-link' href='#'>Previous</a></li>";
                                for($i=1 ; $i <=$noPages ; $i ++){
                               echo "<li class='page-item'><a class='page-link ' href='stations.php?page=$i'>$i</a></li>";}
                                echo"<li class='page-item'><a class='page-link  ' href='#'>Next</a></li>";
                            echo"</ul>
                        </nav>";
                        echo"<div class='filter-list row clearfix'>";
                        while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="gallery-item mix all engine wheel conditioner col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box" width="100%">
                            <figure class="image" width="100%" height="100%">
                            <?php
                            if (file_exists("images/gasstation/".$row['stationId'].".jpg")) 
                            { 
                            ?>
                                <img src="images/gasstation/<?php echo $row['stationId']?>.jpg" alt="<?php echo $row['stationName']?>">
                            
                                <?php
                            } else { ?>
                                <img src="images/gasstation/custom.jpg" alt="<?php echo $row['stationName']?>">

                             <?php } ?>
                            </figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="singleStation.php?id=<?php echo($row['stationId']);?>" class="link"><span class="icon fa fa-link"></span></a>
                                    <?php
                            if (file_exists("images/gasstation/".$row['stationId'].".jpg")) 
                            { 
                            ?>
                        <a href="images/gasstation/<?php echo $row['stationId']?>.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>

                            <?php
                            } else { ?>
                                    <a href="images/gasstation/custom.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                            <?php } ?>


                                    <h3 class="text-uppercase" ><a href="singleStation.php?id=<?php echo($row['stationId']);?>"><?php echo $row['stationName']?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php }?>
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
                <a href="cart.php" class="call-btn" style="color:#ffffff">Order Now</a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
<?php 
    include_once "includes/footer.php";
?>