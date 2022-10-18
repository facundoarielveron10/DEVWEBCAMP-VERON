<!-- Agenda -->
<main class="agenda">
    <!-- Titulo -->
    <h2 class="agenda__heading"><?php echo $titulo ?></h2>
    <!-- Descripcion -->
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en Desarrollo Web</p>

    <!-- Evento (Conferencias) -->
    <div class="eventos">
        <!-- Titulo -->
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <!-- Fecha -->
        <p class="evento__fecha">Viernes 5 de Octubre</p>
        <!-- Listado Conferencias (Viernes) -->
        <div class="eventos__listado slider swiper">
            <!-- Slider -->
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_v'] as $evento): ?>
                    <!-- Conferencia -->
                    <div class="evento swiper-slide">
                        <!-- Hora -->
                        <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>
                        <!-- Informacion -->
                        <div class="evento__informacion">
                            <!-- Nombre -->
                            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>
                            <!-- Introduccion -->
                            <p class="evento__introduccion"><?php echo $evento->descripcion; ?></p>
                            <!-- Ponente -->
                            <div class="evento__autor-info">
                                <picture>
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" type="image/png">
                                    <img class="evento__imagen-autor" loading="lazy" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
                                </picture>

                                <p class="evento__autor-nombre">
                                    <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido;?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Fecha -->
        <p class="eventos__fecha">Sabado 6 de Octubre</p>
        <!-- Listado Conferencias (Sabado) -->
        <div class="eventos__listado">

        </div>
    </div>

    <!-- Evento (Workshops) -->
    <div class="eventos eventos--workshops">
        <!-- Titulo -->
        <h3 class="eventos__heading">&lt;Workshops /></h3>

        <!-- Fecha -->
        <p class="evento__fecha">Viernes 5 de Octubre</p>
        <!-- Listado Workshops (Viernes) -->
        <div class="eventos__listado">

        </div>

        <!-- Fecha -->
        <p class="eventos__fecha">Sabado 6 de Octubre</p>
        <!-- Listado Workshops (Sabado) -->
        <div class="eventos__listado">

        </div>
    </div>
</main>