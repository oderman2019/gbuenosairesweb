<footer class="site-footer footer-light">
    <!-- COLL-TO ACTION START -->
    <div class="call-to-action-wrap bg-primary bg-repeat" style="background-image:url(images/background/bg-4.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="call-to-action-left p-tb20 p-r50">
                        <h4 class="text-uppercase m-b10">ESTAMOS LISTOS PARA CONSTRUIR TU SUEÑO CUÉNTANOS MÁS DE TU PROYECTO</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris eget tortor.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="call-to-action-right p-tb30">
                        <a href="contacto.php" class="site-button-secondry text-uppercase font-weight-600">
                            Contáctenos <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER BLOCKES START -->
    <div class="footer-top overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">
            <div class="row">
                <!-- ABOUT COMPANY -->
                <div class="col-md-4 col-sm-6">
                    <div class="widget widget_about">
                        <h4 class="widget-title"><?=$home['pag_nombre'];?></h4>

                        <?=$home['pag_descripcion'];?>
                    </div>
                </div>
                <!-- RESENT POST -->

                <!-- USEFUL LINKS -->
                <div class="col-md-4 col-sm-6">
                    <div class="widget widget_services">
                        <h4 class="widget-title">Páginas</h4>
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="productos.php">Productos</a></li>
                            <li><a href="servicios.php">Servicios</a></li>
                            <li><a href="portafolio.php">Portafolio</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                        </ul>
                    </div>
                </div>
                <!-- NEWSLETTER -->
                <div class="col-md-4 col-sm-6">

                    <!-- SOCIAL LINKS -->
                    <div class="widget widget_social_inks">
                        <h4 class="widget-title">Redes sociales</h4>
                        <ul class="social-icons social-square social-darkest">
                            <?php
                            $redes = mysql_query("SELECT * FROM redes_sociales WHERE red_url!=''", $conexion);
                            while ($red = mysql_fetch_array($redes)) {
                            ?>
                                <li><a href="<?= $red['red_url']; ?>" class="fa fa-<?= $red['red_nombre']; ?>" target="_blank"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3 col-sm-6  p-tb20">
                    <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                        <div class="icon-md text-secondry">
                            <span class="iconmoon-travel"></span>
                        </div>
                        <div class="icon-content">
                            <h5 class="wt-tilte text-uppercase m-b0">Dirección</h5>
                            <p><?= $informacionPagina['info_direccion']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6  p-tb20 ">
                    <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix ">
                        <div class="icon-md text-secondry">
                            <span class="iconmoon-smartphone-1"></span>
                        </div>
                        <div class="icon-content">
                            <h5 class="wt-tilte text-uppercase m-b0">Teléfonos</h5>
                            <p class="m-b0"><?= $informacionPagina['info_telefono_principal']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6  p-tb20">
                    <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                        <div class="icon-md text-secondry">
                            <span class="iconmoon-smartphone-1"></span>
                        </div>
                        <div class="icon-content">
                            <h5 class="wt-tilte text-uppercase m-b0">WhatsApp</h5>
                            <p class="m-b0"><?= $informacionPagina['info_whatsapp']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 p-tb20">
                    <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                        <div class="icon-md text-secondry">
                            <span class="iconmoon-email"></span>
                        </div>
                        <div class="icon-content">
                            <h5 class="wt-tilte text-uppercase m-b0">Email</h5>
                            <p class="m-b0"><?= $informacionPagina['info_email_principal']; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom overlay-wraper">
        <div class="overlay-main"></div>
        <div class="constrot-strip"></div>
        <div class="container p-t30">
            <div class="row">
                <div class="wt-footer-bot-left">
                    <span class="copyrights-text">© 2020 <?= $WEBNAME; ?>. All Rights Reserved. Designed By Jhon Oderman.</span>
                </div>
                <!--
                <div class="wt-footer-bot-right">
                    <ul class="copyrights-nav pull-right">
                        <li><a href="javascript:void(0);">Terms & Condition</a></li>
                        <li><a href="javascript:void(0);">Privacy Policy</a></li>
                        <li><a href="contact-1.html">Contact Us</a></li>
                    </ul>
                </div>
                            -->
            </div>
        </div>
    </div>
</footer>