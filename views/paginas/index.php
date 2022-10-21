<?php 
    include_once __DIR__ . '/conferencias.php';
?>
<!-- Resumen -->
<section class="resumen"> 
    <!-- Contenedor -->
    <div class="resumen__grid">
        <!-- Speakers -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentesTotal; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <!-- Conferencias -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferenciasTotal; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>
        <!-- Workshops -->
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshopsTotal; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <!-- Asistentes -->
        <div class="resumen__bloque">
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
    <?php foreach($ponentes as $ponente): ?>
        <!-- Speaker -->
        <div class="speaker">
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
                <nav class="speaker__sociales">
                    <?php 
                        $redes = json_decode($ponente->redes); 
                    ?>
                    <?php if(!empty($redes->facebook)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                            <span class="speaker__ocultar">Facebook</span>
                        </a> 
                    <?php endif; ?>
                    <?php if(!empty($redes->twitter)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                            <span class="speaker__ocultar">Twitter</span>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($redes->youtube)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                            <span class="speaker__ocultar">Youtube</span>
                        </a> 
                    <?php endif; ?>
                    <?php if(!empty($redes->instagram)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                            <span class="speaker__ocultar">Instagram</span>
                        </a> 
                    <?php endif; ?>
                    <?php if(!empty($redes->tiktok)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                            <span class="speaker__ocultar">TikTok</span>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($redes->github)): ?>
                        <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                            <span class="speaker__ocultar">GitHub</span>
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
</section>