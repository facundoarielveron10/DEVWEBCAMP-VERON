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
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php endforeach; ?>
            </div>
            <!-- Boton de Siguiente -->
            <div class="swiper-button-next"></div>
            <!-- Boton de Anterior -->
            <div class="swiper-button-prev"></div>
        </div>

        <!-- Fecha -->
        <p class="eventos__fecha">Sabado 6 de Octubre</p>
        <!-- Listado Conferencias (Sabado) -->
        <div class="eventos__listado slider swiper">
            <!-- Slider -->
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_s'] as $evento): ?>
                    <!-- Conferencia -->
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php endforeach; ?>
            </div>
            <!-- Boton de Siguiente -->
            <div class="swiper-button-next"></div>
            <!-- Boton de Anterior -->
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Evento (Workshops) -->
    <div class="eventos eventos--workshops">
        <!-- Titulo -->
        <h3 class="eventos__heading">&lt;Workshops /></h3>

        <!-- Fecha -->
        <p class="evento__fecha">Viernes 5 de Octubre</p>
        <!-- Listado Workshops (Viernes) -->
        <div class="eventos__listado slider swiper">
            <!-- Slider -->
            <div class="swiper-wrapper">
                <?php foreach($eventos['workshops_v'] as $evento): ?>
                    <!-- Workshop -->
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php endforeach; ?>
            </div>
            <!-- Boton de Siguiente -->
            <div class="swiper-button-next"></div>
            <!-- Boton de Anterior -->
            <div class="swiper-button-prev"></div>
        </div>

        <!-- Fecha -->
        <p class="eventos__fecha">Sabado 6 de Octubre</p>
        <!-- Listado Workshops (Sabado) -->
        <div class="eventos__listado slider swiper">
            <!-- Slider -->
            <div class="swiper-wrapper">
                <?php foreach($eventos['workshops_s'] as $evento): ?>
                    <!-- Workshop -->
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php endforeach; ?>
            </div>
            <!-- Boton de Siguiente -->
            <div class="swiper-button-next"></div>
            <!-- Boton de Anterior -->
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</main>