<?php include("head.php"); ?>
<?php include("constantes.php"); ?>

<?php
$producto = mysql_fetch_array(mysql_query("SELECT * FROM productos WHERE pro_id='" . $_GET["id"] . "' AND pro_activo=1", $conexion));
?>


<!-- PAGE TITLE HERE -->
<title> <?= $WEBNAME; ?> | <?= $producto['pro_nombre']; ?></title>


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
            <h1 class="text-white"><?= $producto['pro_nombre']; ?></h1>
          </div>
        </div>
      </div>
      <!-- INNER PAGE BANNER END -->

      <!-- SECTION CONTENT START -->
      <div class="section-full p-t80 p-b50">

        <!-- PRODUCT DETAILS -->
        <div class="container woo-entry">

          <div class="row m-b30">

            <div class="col-md-4 col-sm-4 m-b30">
              <div class="wt-box wt-product-gallery on-show-slider">

                <div id="sync1" class="owl-carousel owl-theme owl-btn-vertical-center m-b5">

                  <div class="item">
                    <div class="mfp-gallery">
                      <div class="wt-box">
                        <div class="wt-thum-bx wt-img-overlay1 ">
                          <img src="login/files/productos/<?= $producto['pro_imagen']; ?>" alt="">
                          <div class="overlay-bx">
                            <div class="overlay-icon">
                              <a class="mfp-link" href="login/files/productos/<?= $producto['pro_imagen']; ?>">
                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php
                  $fotos = mysql_query("SELECT * FROM portafolio WHERE por_producto='" . $producto['pro_id'] . "'", $conexion);
                  while ($foto = mysql_fetch_array($fotos)) {
                  ?>

                    <div class="item">
                      <div class="mfp-gallery">
                        <div class="wt-box">
                          <div class="wt-thum-bx wt-img-overlay1 ">
                            <img src="login/files/portafolio/<?= $foto['por_imagen']; ?>" alt="">
                            <div class="overlay-bx">
                              <div class="overlay-icon">
                                <a class="mfp-link" href="login/files/portafolio/<?= $foto['por_imagen']; ?>">
                                  <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php } ?>

                </div>

                <div id="sync2" class="owl-carousel owl-theme">

                  <div class="item">
                    <div class="wt-media">
                      <img src="login/files/productos/<?= $producto['pro_imagen']; ?>" alt="">
                    </div>
                  </div>

                  <?php
                  $fotos = mysql_query("SELECT * FROM portafolio WHERE por_producto='" . $producto['pro_id'] . "'", $conexion);
                  while ($foto = mysql_fetch_array($fotos)) {
                  ?>
                    <div class="item">
                      <div class="wt-media">
                        <img src="login/files/portafolio/<?= $foto['por_imagen']; ?>" alt="">
                      </div>
                    </div>

                  <?php } ?>


                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8">
              <div class="wt-post-title ">
                <h3 class="post-title"><a href="javascript:void(0);"><?= $producto['pro_nombre']; ?></a></h3>
              </div>
              <h2 class="m-tb10">$<?= number_format($producto['pro_precio'], 0, ".", "."); ?> </h2>
              <div class="wt-post-text">
                <p class="m-b10"><?= $producto['pro_descripcion']; ?></p>
              </div>

              <a href="contacto.php?asunto=Información sobre <?= $producto['pro_nombre']; ?>" class="btn btn-primary site-button-secondry pull-left m-r10"><i class="fa fa-shopping-bag"></i> SOLICITAR MÁS INFORMACIÓN</a>
              <?php if ($producto['pro_catalogo'] != "" and file_exists("login/files/productos/" . $producto['pro_catalogo'])) { ?>
                <a href="login/files/productos/<?= $producto['pro_catalogo']; ?>" class="btn btn-primary site-button pull-left" target="_blank"><i class="fa fa-cart-plus"></i> DESCARGAR CATÁLOGO</a>
              <?php } ?>

            </div>
          </div>


          <?php //include("productos-relacionados.php");
          ?>



        </div>
        <!-- PRODUCT DETAILS -->

      </div>
      <!-- CONTENT CONTENT END -->


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


  <script>
    $(document).ready(function() {

      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
      var slidesPerPage = 4; //globaly define number of elements per page
      var syncedSecondary = true;

      sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
      }).on('changed.owl.carousel', syncPosition);

      sync2
        .on('initialized.owl.carousel', function() {
          sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
          items: slidesPerPage,
          dots: false,
          nav: false,
          margin: 5,
          smartSpeed: 200,
          slideSpeed: 500,
          slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
          responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

      function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
          current = count;
        }
        if (current > count) {
          current = 0;
        }

        //end block

        sync2
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
          sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
          sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
      }

      function syncPosition2(el) {
        if (syncedSecondary) {
          var number = el.item.index;
          sync1.data('owl.carousel').to(number, 100, true);
        }
      }

      sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
      });
    });
  </script>





</body>


<!-- Mirrored from thewebmax.com/build/product-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:59:16 GMT -->

</html>