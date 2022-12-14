<!-- Contenedor -->
<main class="paquetes">
    <!-- Titulo -->
    <h2 class="paquetes__heading"><?php echo $titulo; ?></h2>
    <!-- Descripcion -->
    <p class="paquetes__descripcion">Compara los paquetes de DevWebCamp</p>
    <!-- Contenedor -->
    <div class="paquetes__grid">
        <!-- Paquete Gratis -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$0</p>
        </div>
        <!-- Paquete Presencial -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Acceso a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y Bebida</li>
                <li class="paquete__elemento">Regalo a Eleccion</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$199</p>
        </div>
        <!-- Paquete Virtual -->
        <div data-aos="<?php aos_animacion(); ?>" class="paquete">
            <!-- Nombre -->
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <!-- Lista -->
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 dias</li>
                <li class="paquete__elemento">Enlace a Talleres y Conferencias</li>
                <li class="paquete__elemento">Acceso a las Grabaciones</li>
                <li class="paquete__elemento">Regalo Stickers</li>
            </ul>
            <!-- Precio -->
            <p class="paquete__precio">$49</p>
        </div>
    </div>
</main>