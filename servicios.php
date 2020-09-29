<?php include("login/modelo/conexion.php"); ?>
<?php include("constantes.php"); ?>

<?php include("head.php"); ?>

<!-- PAGE TITLE HERE -->
<title> <?= $WEBNAME; ?> | Servicios</title>


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
        <div class="page-content  bg-white">

            <!-- INNER PAGE BANNER -->
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/banner/services.jpg);">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">Servicios</h1>
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->



            <!-- SECTION CONTENT -->
            <div class="section-full p-t80 p-b50  ">
                <div class="container">
                    <!-- TITLE START -->
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Nuestros servicios</h2>
                        <div class="wt-separator-outer">
                            <div class="wt-separator style-square">
                                <span class="separator-left bg-primary"></span>
                                <span class="separator-right bg-primary"></span>
                            </div>
                        </div>
                    </div>
                    <!-- TITLE END -->
                    <div class="section-content">
                        <div class="row">


                            <?php
                            $servicios = mysql_query("SELECT * FROM subpaginas WHERE sub_id_pagina=3 AND sub_activa=1 ORDER BY sub_posicion", $conexion);
                            while ($serv = mysql_fetch_array($servicios)) {
                            ?>
                                <div class="col-md-4 col-sm-4 p-tb15">
                                    <div class="wt-box bg-white">
                                        <div class="wt-media">
                                            <a href="javascript:void(0);"><img src="images/our-work/<?=$serv['sub_imagen'];?>" alt=""></a>
                                        </div>
                                        <div class="wt-info p-tb30">
                                            <h4 class="wt-title m-t0"><a href="javascript:void(0);"><?=$serv['sub_nombre'];?></a></h4>
                                            <?=$serv['sub_descripcion_corta'];?>
                                            <a href="javascript:void(0);" class="site-button outline   black"><strong class="text-center">Contactar</strong></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>



                        </div>
                    </div>

                </div>
            </div>
            <!-- SECTION CONTENT END -->



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




    <?php //include("colores.php");
    ?>



</body>


<!-- Mirrored from thewebmax.com/build/services-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:56:38 GMT -->

</html>