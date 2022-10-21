<?php 
    include_once __DIR__ . '/conferencias.php';
?>
<!-- Resumen -->
<section class="resumen"> 
    <!-- Contenedor -->
    <div class="resumen__grid">
        <!-- Speakers -->
        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentesTotal; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <!-- Conferencias -->
        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferenciasTotal; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>
        <!-- Workshops -->
        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshopsTotal; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <!-- Asistentes -->
        <div data-aos="<?php aos_animacion(); ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>
<!-- Speakers -->
<section class="speakers">
    <!-- Titulo -->
    <h2 class="speakers__heading">Speakers</h2>
    <!-- Descripcion -->
    <p class="speakers__descripcion">Conoce a nuestros expertos de DevWebCamp</p>
    <!-- Listado Speakers -->
    <div class="speakers__grid">
        <?php foreach($ponentes as $ponente): ?>
            <!-- Speaker -->
            <div data-aos="<?php aos_animacion(); ?>" class="speaker">
                <!-- Imagen -->
                <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente">
                </picture>
                <!-- Informacion -->
                <div class="speaker__informacion">
                    <!-- Nombre -->
                    <h4 class="speaker__nombre"><?php echo $ponente->nombre . ' ' . $ponente->apellido; ?></h4>
                    <!-- Ubicacion -->
                    <p class="speaker__ubicacion"><?php echo $ponente->ciudad . ', ' . $ponente->pais ?></p>
                    <!-- Redes Sociales -->
                    <nav class="speaker-sociales">
                        <?php 
                            $redes = json_decode($ponente->redes); 
                        ?>
                        <?php if(!empty($redes->facebook)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a> 
                        <?php endif; ?>
                        <?php if(!empty($redes->twitter)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($redes->youtube)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                <span class="speaker-sociales__ocultar">Youtube</span>
                            </a> 
                        <?php endif; ?>
                        <?php if(!empty($redes->instagram)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a> 
                        <?php endif; ?>
                        <?php if(!empty($redes->tiktok)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-sociales__ocultar">TikTok</span>
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($redes->github)): ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-sociales__ocultar">GitHub</span>
                            </a>
                        <?php endif; ?>
                    </nav>
                    <!-- Skills -->
                    <ul class="speaker__listado-skills">
                        <?php 
                            $tags = explode(',', $ponente->tags); 
                            foreach($tags as $tag):
                        ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Mapa -->
<div class="mapa" id="mapa"></div>
<!-- Boletos -->
<section class="boletos">
    <!-- Titulo -->
    <h2 class="boletos__heading">Boletos & Precios</h2>
    <!-- Descripcion -->
    <p class="boletos__descripcion">Precios para DevWebCamp</p>
    <!-- Contenedor -->
    <div class="boletos__grid">
        <!-- Boleto Presencial -->
        <div data-aos="<?php aos_animacion(); ?>" class="boleto boleto--presencial">
            <!-- Logo -->
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <!-- Plan -->
            <p class="boleto__plan">Presencial</p>
            <!-- Precio -->
            <p class="boleto__precio">$199</p>
        </div>
        <!-- Boleto Virtual -->
        <div data-aos="<?php aos_animacion(); ?>" class="boleto boleto--virtual">
            <!-- Logo -->
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <!-- Plan -->
            <p class="boleto__plan">Virtual</p>
            <!-- Precio -->
            <p class="boleto__precio">$49</p>
        </div>
        <!-- Boleto Gratis -->
        <div data-aos="<?php aos_animacion(); ?>" class="boleto boleto--gratis">
            <!-- Logo -->
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <!-- Plan -->
            <p class="boleto__plan">Gratis</p>
            <!-- Precio -->
            <p class="boleto__precio">Gratis - $0</p>
        </div>

        <!-- Boton -->
        <div data-aos="<?php aos_animacion(); ?>" class="boleto__enlace-contenedor">
            <a class="boleto__enlace" href="/paquetes">Ver Paquetes</a>
        </div>
    </div>
</section>