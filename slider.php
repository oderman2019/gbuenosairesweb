<div class="main-slider style-two default-banner">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <!-- START REVOLUTION SLIDER 5.4.1 -->
            <div id="rev_slider_1014_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="typewriter-effect" data-source="gallery">
                <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                    <ul>
                    <?php
                            $slider = mysql_query("SELECT * FROM slider WHERE sli_activo=1 ORDER BY sli_posicion", $conexion);
                            while ($sli = mysql_fetch_array($slider)) {
                            ?>
                        <!-- SLIDE 1 -->
                        <li data-index="rs-2000" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="login/files/slider/<?=$sli['sli_imagen'];?>" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                            <!-- MAIN IMAGE -->
                            <img src="login/files/slider/<?=$sli['sli_imagen'];?>" alt="" data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                            <!-- LAYERS -->
                        </li>
                            <?php }?>

                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>
    </div>
</div>