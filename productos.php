<?php include("login/modelo/conexion.php"); ?>
<?php include("constantes.php"); ?>

<?php include("head.php"); ?>

<!-- PAGE TITLE HERE -->
<title> <?= $WEBNAME; ?> | Productos</title>


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
            <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/banner/product-banner.jpg);">
                <div class="overlay-main bg-black opacity-07"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <h1 class="text-white">Productos</h1>
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->


            <!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                    <div class="section-content">
                        <div class="row">
                            <!-- SIDE BAR START -->
                            <div class="col-md-3">

                                <aside class="side-bar">

                                    <!-- 13. SEARCH -->
                                    <div class="widget bg-white ">
                                        <h4 class="widget-title">Búsqueda</h4>
                                        <div class="search-bx">
                                            <form method="GET" action="productos.php">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="busqueda" value="<?=$_GET['busqueda'];?>" placeholder="Búsqueda...">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="site-button"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- 12. TAGS --
                                    <div class="widget bg-white  widget_tag_cloud">
                                        <h4 class="widget-title">Tags</h4>
                                        <div class="tagcloud">
                                            <a href="javascript:void(0);">Trouble </a>
                                            <a href="javascript:void(0);">Programmers</a>
                                            <a href="javascript:void(0);">Never</a>
                                            <a href="javascript:void(0);">Tell</a>
                                            <a href="javascript:void(0);">Doing</a>
                                            <a href="javascript:void(0);">Person</a>
                                            <a href="javascript:void(0);">Inventors Tag</a>
                                            <a href="javascript:void(0);">Between </a>
                                            <a href="javascript:void(0);">Abilities</a>
                                            <a href="javascript:void(0);">Fault </a>
                                            <a href="javascript:void(0);">Gets </a>
                                            <a href="javascript:void(0);">Macho</a>
                                        </div>
                                    </div>-->

                                </aside>

                            </div>
                            <!-- SIDE BAR END -->
                            <div class="col-md-9">

                                <!-- TITLE START -->
                                <div class="p-b10">
                                    <h2 class="text-uppercase">Productos</h2>
                                    <div class="wt-separator-outer m-b30">
                                        <div class="wt-separator style-square">
                                            <span class="separator-left bg-primary"></span>
                                            <span class="separator-right bg-primary"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- TITLE END -->

                                <div class="row">

                                    <?php
                                    $filtro = "";
                                    if(isset($_GET["cat"]) and is_numeric($_GET["cat"])){ $filtro .=" AND pro_categoria='".$_GET["cat"]."'";}

                                    if(isset($_GET["busqueda"])){ $filtro .=" AND (pro_nombre LIKE '%".$_GET["busqueda"]."%' OR pro_descripcion LIKE '%".$_GET["busqueda"]."%')";}


                                    $productos = mysql_query("SELECT * FROM productos 
                                    WHERE pro_activo=1 $filtro
                                    ORDER BY pro_posicion", $conexion);
                                    while ($prod = mysql_fetch_array($productos)) {
                                    ?>

                                        <!-- COLUMNS 1 -->
                                        <div class="col-md-4 col-sm-4 col-xs-6 col-xs-100pc m-b30">
                                            <div class="wt-box wt-product-box">
                                                <div class="wt-thum-bx wt-img-overlay1 wt-img-effect zoom">
                                                    <img src="images/products/pic-1.jpg" alt="">
                                                    <div class="overlay-bx">
                                                        <div class="overlay-icon">
                                                            <a href="javascript:void(0);">
                                                                <i class="fa fa-cart-plus wt-icon-box-xs"></i>
                                                            </a>
                                                            <a class="mfp-link" href="javascript:void(0);">
                                                                <i class="fa fa-heart wt-icon-box-xs"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wt-info  text-center">
                                                    <div class="p-a10 bg-white">
                                                        <h4 class="wt-title">
                                                            <a href="javascript:;"><?=$prod['pro_nombre'];?></a>
                                                        </h4>

                                                        <span class="price">
                                                            <del>
                                                                <span><span class="Price-currencySymbol">£</span>3.00</span>
                                                            </del>
                                                            <ins>
                                                                <span><span class="Price-currencySymbol">£</span>2.00</span>
                                                            </ins>
                                                        </span>

                                                        <div class="p-t10">
                                                            <button class="site-button  m-r15" type="button">VER DETALLES <i class="fa fa-angle-double-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>


                                </div>

                            </div>
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


</body>


<!-- Mirrored from thewebmax.com/build/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:59:08 GMT -->

</html>