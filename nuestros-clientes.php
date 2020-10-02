<div class="section-full p-t80 p-b50">
    <div class="container">

        <!-- TITLE START -->
        <div class="section-head text-center">
            <h2 class="text-uppercase">Nuestros clientes</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator style-square">
                    <span class="separator-left bg-primary"></span>
                    <span class="separator-right bg-primary"></span>
                </div>
            </div>
        </div>
        <!-- TITLE END -->

        <!-- IMAGE CAROUSEL START -->
        <div class="section-content">
            <div class="owl-carousel client-logo-carousel">

                <?php
                $clientes = mysql_query("SELECT * FROM clientes", $conexion);
                while ($cli = mysql_fetch_array($clientes)) {
                ?>

                    <!-- COLUMNS 1 -->
                    <div class="item">
                        <div class="ow-client-logo">
                            <div class="client-logo wt-img-effect on-color">
                                <a href="#"><img src="login/files/cliente/<?=$cli['cli_imagen'];?>" alt=""></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </div>
        </div>
        <!-- IMAGE CAROUSEL START -->
    </div>

</div>