<?php include("head.php");?> 
<?php include("constantes.php");?>  

    <!-- PAGE TITLE HERE -->
    <title> <?=$WEBNAME;?> | Inicio</title>  

    
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800italic,800,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">
    
 
</head>

<body id="bg">

    <div class="page-wraper">  
      	
    <?php include("header.php");?>
        
        <!-- CONTENT START -->
        <div class="page-content">
        
             
            <!-- SECTION CONTENTG START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                
                	<!-- CONTACT DETAIL BLOCK -->
                    <div class="section-content m-b30">
 
                        <div class="row">
                        
                            <div class="col-md-4 col-sm-12 m-b30">
                                <div class="wt-icon-box-wraper center p-a30 bg-secondry">
                                    <div class="icon-sm text-white m-b10"><i class="iconmoon-smartphone-1"></i></div>
                                    <div class="icon-content">
                                        <h5 class="text-white">Teléfono</h5>
                                        <p class="text-gray-dark"><?=$informacionPagina['info_telefono_principal'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 m-b30">
                                <div class="wt-icon-box-wraper center p-a30 bg-secondry">
                                    <div class="icon-sm text-white m-b10"><i class="iconmoon-email"></i></div>
                                    <div class="icon-content">
                                        <h5 class="text-white">Email</h5>
                                        <p class="text-gray-dark"><?=$informacionPagina['info_email_principal'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 m-b30">
                                <div class="wt-icon-box-wraper center p-a30 bg-secondry">
                                    <div class="icon-sm text-white m-b10"><i class="iconmoon-travel"></i></div>
                                    <div class="icon-content">
                                        <h5 class="text-white">Dirección</h5>
                                        <p class="text-gray-dark"><?=$informacionPagina['info_direccion'];?></p>
                                    </div> 
                                </div>
                            </div>
                        
                        </div>
          
                    </div>
                    
                    <!-- GOOGLE MAP & CONTACT FORM -->
                    <div class="section-content m-b50">
                        <div class="row">
                        
                        	<!-- LOCATION BLOCK-->
                            <div class="wt-box col-md-6">
                            
                                 <h4 class="text-uppercase">Ubicación</h4>
                                <div class="wt-separator-outer m-b30">
                                   <div class="wt-separator style-square">
                                       <span class="separator-left bg-primary"></span>
                                       <span class="separator-right bg-primary"></span>
                                   </div>
                               </div>      
                                                        

                                <div class="gmap-outline m-b30">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d824.9998652945565!2d-75.4920696142152!3d10.391137046071893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef625cf42f32913%3A0xe385ad77775fbf9e!2sELECTRICOS%20BUENOS%20AIRES!5e0!3m2!1ses-419!2sco!4v1601640901239!5m2!1ses-419!2sco" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                                    
                            </div>

                            <!-- CONTACT FORM-->
                            <div class="wt-box col-md-6">
                            
                                <h4 class="text-uppercase">Formulario de contacto</h4>

                                <?php if($_GET["msg"]==1){?>
                                    <p style="color: navy; font-size:larger;">Su mensaje se ha enviado correctamente.</p>
                                <?php    
                                }
                                ?>

                                <div class="wt-separator-outer m-b30">
                                    <div class="wt-separator style-square">
                                       <span class="separator-left bg-primary"></span>
                                       <span class="separator-right bg-primary"></span>
                                    </div>
                                    
                                </div>
                            
                            	<div class="p-a30 bg-gray">

                                <?php
                                $asunto = "";
                                if($_GET["asunto"]!=""){$asunto = $_GET["asunto"];}
                                ?>
                            
                                    <form method="post" action="sql.php">
                                        <input type="hidden" value="1" name="idSQL">
                            
                                        <div class="row">
                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input name="nombre" type="text" required class="form-control" placeholder="Nombre">
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input name="email" type="email" class="form-control" required placeholder="Email">
                                                    </div>
                                                </div>
            
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                                        <input name="tel" type="text" class="form-control" required placeholder="Teléfono">
                                                    </div>
                                                </div>
            
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                        <input name="asunto" type="text" required class="form-control" value="<?=$asunto;?>" placeholder="Asunto">
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon v-align-t"><i class="fa fa-pencil"></i></span>
                                                        <textarea name="mensaje" rows="5" class="form-control " required placeholder="Mensaje"></textarea>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12">
                                                <button name="submit" type="submit" value="Submit" class="site-button  m-r15">Enviar mensaje <i class="fa fa-angle-double-right"></i></button>
                                            </div>
            
                                        </div>
    
                                    </form>
                                
                                </div>
                        
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
           </div>
            <!-- SECTION CONTENT END -->
            
        </div>
        <!-- CONTENT END -->

        <?php include("footer.php");?>
        
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
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqwdZHU6gzIhPBEB2VNbIydp4coZmNPy0&amp;callback=initMap"  ></script><!-- GOOGLE MAP -->
<!--<script src="https://maps.google.com/maps/api/js?sensor=fales"  type="text/javascript"></script>--><!-- GOOGLE MAP -->
<script type="text/javascript"  src="js/map.script.js"></script><!-- MAP FUCTIONS [ this file use with google map]  -->

<script type="text/javascript"  src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script type="text/javascript"  src="js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->
<script type="text/javascript"  src="js/switcher.js"></script><!-- SWITCHER FUCTIONS  -->
 


</body>


<!-- Mirrored from thewebmax.com/build/contact-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 22:57:28 GMT -->
</html>
