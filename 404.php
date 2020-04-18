<?php 
    ob_start();
    session_start();
    $pageTitle="page not found";
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
                <h1>404 Error</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>404</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Error Page Section-->
    <section class="error-section">
        <div class="auto-container">
            <div class="error-image">
                <div class="image"><img src="images/resource/404-img.png" alt="" /></div>
            </div>
            <h2><span class="dark">Page </span> not <span class="theme_color"> found</span></h2>
            <p>The page you are Looking for was Moved, Removed, Renamed or Might Never Existed</p>
            <a href="index.php" class="theme-btn btn-style-three">Go Home</a>
            <a href="contact.php" class="theme-btn btn-style-five">Contact</a>
            <!-- Bottom Image -->
        </div>
    </section>
    <!--End Error Section-->
    <!-- Main Footer -->
<?php 
    include_once "includes/footer.php";
?>