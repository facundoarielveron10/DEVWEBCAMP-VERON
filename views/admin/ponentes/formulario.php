<!-- Parte 1 - Formulario -->
<fieldset class="formulario__fieldset">
    <!-- Informacion del Ponente -->
    <legend class="formulario__legend">Informacion Personal</legend>
    <!-- Nombre -->
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input class="formulario__input" type="text" id="nombre" name="nombre" placeholder="Nombre Ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>
    <!-- Apellido -->
    <div class="formulario__campo">
        <label class="formulario__label" for="apellido">Apellido</label>
        <input class="formulario__input" type="text" id="apellido" name="apellido" placeholder="Apellido Ponente" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>
    <!-- Ciudad -->
    <div class="formulario__campo">
        <label class="formulario__label" for="ciudad">Ciudad</label>
        <input class="formulario__input" type="text" id="ciudad" name="ciudad" placeholder="Ciudad Ponente" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>
    <!-- Pais -->
    <div class="formulario__campo">
        <label class="formulario__label" for="pais">Pais</label>
        <input class="formulario__input" type="text" id="pais" name="pais" placeholder="Pais Ponente" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>
    <!-- Imagen -->
    <div class="formulario__campo">
        <label class="formulario__label" for="imagen">Imagen</label>
        <input class="formulario__input formulario__input--file" type="file" id="imagen" name="imagen">
    </div>
    <?php if(isset($ponente->imagen_actual)): ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" type="image/png">
                <img loading="lazy" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>
    <?php endif; ?>
</fieldset>

<!-- Parte 2 - Formulario -->
<fieldset class="formulario__fieldset">
    <!-- Informacion Extra del Ponente -->
    <legend class="formulario__legend">Informacion Extra</legend>
    <!-- Areas de Experiencia -->
    <div class="formulario__campo">
        <label class="formulario__label" for="tags_input">Areas de Experiencias (separadas por coma)</label>
        <input class="formulario__input" type="text" id="tags_input" placeholder="Ej. Node.js, PHP, CSS, Laravel, React, UX / UI">
        <!-- Etiquetas -->
        <div class="formulario__listado" id="tags"></div>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>
</fieldset>

<!-- Parte 3 - Formulario -->
<fieldset class="formulario__fieldset">
    <!-- Redes Sociales del Ponente -->
    <legend class="formulario__legend">Redes Sociales</legend>
    <!-- Facebook -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[facebook]" placeholder="Facebook" value="<?php echo $redes->facebook ?? ''; ?>">
        </div>
    </div>
    <!-- Twitter -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[twitter]" placeholder="Twitter" value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
    </div>
    <!-- Youtube -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[youtube]" placeholder="Youtube" value="<?php echo $redes->youtube ?? ''; ?>">
        </div>
    </div>
    <!-- Instagram -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[instagram]" placeholder="Instagram" value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
    </div>
    <!-- TikTok -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[tiktok]" placeholder="TikTok" value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
    </div>
    <!-- GitHub -->
    <div class="formulario__campo">
        <!-- Contenedor Icono -->
        <div class="formulario__contenedor-icono">
            <!-- Icono -->
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <!-- Datos -->
            <input class="formulario__input formulario__input--sociales" type="text" name="redes[github]" placeholder="GitHub" value="<?php echo $redes->github ?? ''; ?>">
        </div>
    </div>
</fieldset>