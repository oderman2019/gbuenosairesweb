<?php include("login/modelo/conexion.php"); ?>
<?php include("constantes.php"); ?>

<?php
$pagina = mysql_fetch_array(mysql_query("SELECT * FROM subpaginas WHERE sub_id='".$_GET["p"]."' AND sub_activa=1",$conexion));
?>

<?php include("head.php");?>   

    <!-- PAGE TITLE HERE -->
    <title> <?=$WEBNAME;?> | <?=$pagina['sub_nombre'];?></title>


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

            <!-- INNER PAGE BANNER -->
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/banner/blog-banner.jpg);">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white"><?=$pagina['sub_nombre'];?></h1>
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">

                    <!-- BLOG START -->
                    <div class="blog-post date-style-3 blog-post-single">
                        <div class="wt-post-media wt-img-effect">
                            <a href="javascript:void(0);"><img src="images/blog/default/<?=$pagina['sub_imagen'];?>" alt=""></a>
                        </div>
                        <div class="post-description-area p-t30">
                            <div class="wt-post-title ">
                                <h3 class="post-title"><a href="javascript:void(0);"><?=$pagina['sub_nombre'];?> </a></h3>
                            </div>

                            <div class="wt-post-text">
                                <p><?=$pagina['sub_descripcion'];?></p>
                            </div>
                            
                        </div>
                    </div>


                    <!-- BLOG END -->

                </div>
            </div>
            <!-- SECTION CONTENT END -->

        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <?php include("footer.php");?>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>

    </div>


    <!-- JAVASCRIPT  FILES ========================================= -->
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script><!-- JQUERY.MIN JS -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->

    <script type="text/javascript" src="js/bootstrap-select.min.js"></script><!-- FORM JS -->
    <script type="text/javascript" src="js/jquery.bootstrap-touchspin.min.js"></script><!-- FORM JS -->

    <script type="text/javascript" src="js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->

    <script type="text/javascript" src="js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
    <script type="text/javascript" src="js/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script type="text/javascript" src="js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->

    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

    <script type="text/javascript" src="js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->

    <script type="text/javascript" src="js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   -->
    <script type="text/javascript" src="js/scrolla.min.js"></script><!-- ON SCROLL CONTENT ANIMTE   -->

    <script type="text/javascript" src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script type="text/javascript" src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->
    <script type="text/javascript" src="js/switcher.js"></script><!-- SWITCHER FUCTIONS  -->




    <?php //include("colores.php");?>









</body>


<!-- Mirrored from thewebmax.com/build/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 23:02:04 GMT -->

</html>