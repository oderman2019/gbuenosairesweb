
<header class="site-header header-style-1 ">

    <div class="top-bar bg-secondry">
        <div class="container">
            <div class="row">
                <div class="wt-topbar-right clearfix">
                    <ul class="social-bx list-inline pull-right">
                        <?php
                        $redes = mysql_query("SELECT * FROM redes_sociales WHERE red_url!=''", $conexion);
                        while ($red = mysql_fetch_array($redes)) {
                        ?>
                            <li><a href="<?=$red['red_url'];?>" class="fa fa-<?=$red['red_nombre'];?>" target="_blank"></a></li>
                        <?php } ?>
                    </ul>
                    <ul class="list-unstyled e-p-bx pull-right">
                        <li><i class="fa fa-envelope"></i><?= $informacionPagina['info_email_principal']; ?></li>
                        <li><i class="fa fa-phone"></i><?= $informacionPagina['info_telefono_principal']; ?></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="sticky-header main-bar-wraper">
        <div class="main-bar bg-white">
            <div class="container">
                <div class="logo-header">
                    <a href="index.php">
                        <img src="login/files/logo/logo.jpeg" width="171" height="49" alt="" />
                    </a>
                </div>
                <!-- NAV Toggle Button -->
                <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



                <!-- MAIN Vav -->
                <div class="header-nav navbar-collapse collapse ">
                    <ul class=" nav navbar-nav">
                        <li class="active"> <a href="index.php">Inicio</a></li>

                        <li>
                            <a href="javascript:;">Nosotros<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                $paginas = mysql_query("SELECT * FROM subpaginas WHERE sub_id_pagina=2 AND sub_activa=1 ORDER BY sub_posicion", $conexion);
                                while ($pag = mysql_fetch_array($paginas)) {
                                ?>
                                    <li><a href="nosotros.php?p=<?= $pag['sub_id']; ?>"><?= $pag['sub_nombre']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li> <a href="servicios.php">Servicios</a></li>

                        <li>
                            <a href="javascript:;">Productos<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                $categorias = mysql_query("SELECT * FROM sub_categorias WHERE scat_opcion=1", $conexion);
                                while ($cat = mysql_fetch_array($categorias)) {
                                ?>
                                    <li><a href="productos.php?cat=<?= $cat['scat_id']; ?>"><?= $cat['scat_nombre']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                        <li> <a href="portafolio.php">Portafolio</a></li>
                        <li> <a href="contacto.php">Contáctenos</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>