<?php include("head.php"); ?>
<?php include("constantes.php"); ?>

<!-- PAGE TITLE HERE -->
<title> <?= $WEBNAME; ?> | Portafolio</title>


<!-- GOOGLE FONTS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">


</head>

<body id="bg">

    <div class="page-wraper">

        <!-- HEADER START -->
        <?php include("header.php"); ?>
        <!-- HEADER END -->

        <!-- CONTENT START -->
        <div class="page-content">

            <!-- INNER PAGE BANNER -->
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/banner/Portfolio.jpg);">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">Portfolio 3</h1>
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->



            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">

                <!-- GELLERY CONTENT -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="portfolio-wrap mfp-gallery no-col-gap">

                            <?php
                            $portafolio = mysql_query("SELECT * FROM portafolio", $conexion);
                            while ($port = mysql_fetch_array($portafolio)) {
                            ?>

                                <!-- COLUMNS 1 -->
                                <div class="masonry-item cat-1 col-lg-3 col-md-6 col-sm-6">
                                    <div class="wt-box p-a15">
                                        <div class="wt-thum-bx wt-img-effect zoom">
                                            <img src="images/portfolio/<?=$port['por_imagen'];?>" alt="">
                                            <div class="wt-info-has p-a20 bg-white ">
                                                <div class="wt-info p-b10">
                                                    <h4 class="m-a0"><?=$port['por_nombre'];?></h4>
                                                </div>
                                                <div class="wt-info-has-text"><?=$port['por_descripcion'];?></div>
                                                <a href="javascript:void(0);" class="site-button button-sm ">Contactar <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!-- GELLERY END -->

            </div>
            <!-- SECTION CONTENT END  -->

        </div>
        <!-- CONTENT END -->

        <?php include("footer.php"); ?>

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



</body>


<!-- Mirrored from thewebmax.com/build/portfolio-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:55:30 GMT -->

</html>