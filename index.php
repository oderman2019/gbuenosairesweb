<?php include("login//modelo/conexion.php");?>
<?php include("constantes.php");?>

<!DOCTYPE html>

<html lang="en">


<!-- Mirrored from thewebmax.com/build/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:41:22 GMT -->
<head>

	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />    
    <meta name="description" content="" />
    
    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    
    <!-- PAGE TITLE HERE -->
    <title> <?=$WEBNAME;?> | Inicio</title>
    
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- [if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif] -->
    
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.min.css" />
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/flaticon.min.css">
    <!-- ANIMATE STYLE SHEET --> 
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.min.css">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/loader.min.css">    
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="css/skin/skin-8.css">
    <!-- CUSTOM  STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/switcher.css">    

    
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/navigation.css">
    
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">
    
</head>

<body id="bg">

	<div class="page-wraper"> 
       	
        <!-- HEADER START -->
        <?php include("header.php");?>
        <!-- HEADER END -->
        
        <!-- CONTENT START -->
        <div class="page-content">
        
            <!-- SLIDER START -->
            <?php include("slider.php");?>
            <!-- SLIDER END -->
            
            <!-- OUR VALUE SECTION START -->           
             <div class="section-full bg-primary">
                <div class="container our-value">
                     <div class="row"> 
                        <div class="col-md-8 col-sm-8 p-t15 p-b30 our-value-left">
                             <div class="clearfix">
                                <div class="col-md-6 p-tb10">
                                    <div class="wt-icon-box-wraper left ">
                                        <div class="icon-md">
                                            <div  class="icon-cell text-white">
                                                <span class="iconmoon-buildings"></span>
                                            </div>
                                        </div>
                                        <div class="icon-content text-secondry">
                                            <h5 class="wt-tilte text-uppercase m-b5">best quality</h5>
                                            <p>Lorem ipsum dolor sit amet, cdipiscing elit, sed diam non dolore .</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-tb10">
                                    <div class="wt-icon-box-wraper left">
                                        <div class="icon-md text-primary">
                                            <div  class="icon-cell text-white">
                                                <span class="iconmoon-hours"></span>
                                            </div>
                                        </div>
                                        <div class="icon-content text-secondry">
                                            <h5 class="wt-tilte text-uppercase m-b0">24 hour support</h5>
                                            <p>Lorem ipsum dolor sit amet, cdipiscing elit, sed diam non dolore .</p>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 p-t50 p-b50 col-md-offset-1 our-value-right">
                            <div class="">
                                <a href="javascript:;" class="site-button-secondry  m-r15 text-uppercase font-weight-600">Contact us</a>
                            </div>
                        </div>
                     </div>
                </div>
             </div>
            <!-- OUR VALUE SECTION  END -->
 
            
            <!-- ABOUT COMPANY SECTION START -->
            <?php include("sobre-compania.php");?>
            <!-- ABOUT COMPANY SECTION END -->                      
            
            <!-- OUR TEAM MEMBER SECTION START -->
            <?php //include("nuestro-equipo.php");?>
            <!-- OUR TEAM MEMBER SECTION END -->
            

                        
            <!-- OUR CLIENT SLIDER START -->
            <?php include("nuestros-clientes.php");?>
            <!-- OUR CLIENT SLIDER END --> 
              
        </div>
        <!-- CONTENT END -->
        
        <!-- FOOTER START -->
        <?php include("footer.php");?>
        <!-- FOOTER END -->

        
        <!-- SCROLL TOP BUTTON -->
        <button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>
        
    </div>
 

<!-- JAVASCRIPT  FILES ========================================= --> 
<script type="text/javascript"  src="js/jquery-1.12.4.min.js"></script><!-- JQUERY.MIN JS -->
<script type="text/javascript"  src="js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->

<script type="text/javascript"  src="js/bootstrap-select.min.js"></script><!-- FORM JS -->
<script type="text/javascript"  src="js/jquery.bootstrap-touchspin.min.js"></script><!-- FORM JS -->

<script type="text/javascript"  src="js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->

<script type="text/javascript"  src="js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script type="text/javascript"  src="js/counterup.min.js"></script><!-- COUNTERUP JS -->
<script type="text/javascript"  src="js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->

<script type="text/javascript" src="js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

<script type="text/javascript"  src="js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->

<script type="text/javascript"  src="js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   --> 
<script type="text/javascript"  src="js/scrolla.min.js"></script><!-- ON SCROLL CONTENT ANIMTE   -->

<script type="text/javascript"  src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script type="text/javascript"  src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->
<script type="text/javascript"  src="js/switcher.js"></script><!-- SWITCHER FUCTIONS  -->


<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script type="text/javascript" src="js/rev-script-2.js"></script>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="loader">
            <span class="block-1"></span>
            <span class="block-2"></span>
            <span class="block-3"></span>
            <span class="block-4"></span>
            <span class="block-5"></span>
            <span class="block-6"></span>
            <span class="block-7"></span>
            <span class="block-8"></span>
            <span class="block-9"></span>
            <span class="block-10"></span>
            <span class="block-11"></span>
            <span class="block-12"></span>
            <span class="block-13"></span>
            <span class="block-14"></span>
            <span class="block-15"></span>
            <span class="block-16"></span>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->


</body>


<!-- Mirrored from thewebmax.com/build/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:46:50 GMT -->
</html>
