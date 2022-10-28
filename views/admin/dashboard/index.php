<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Bloques -->
<main class="bloques">
    <!-- Contenedor -->
    <div class="bloques__grid">
        <!-- Bloque Registrados -->
        <div class="bloque">
            <!-- Titulo -->
            <h2 class="bloque__heading">Ultimos Registros</h2>
            <!-- Listado de Registros -->
            <?php foreach($registros as $registro): ?>
                <!-- Registro -->
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido;?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Bloque Ingresos -->
        <div class="bloque">
            <!-- Titulo -->
            <h2 class="bloque__heading">Ingresos</h2>
            <!-- Ingresos -->
            <p class="bloque__texto--cantidad">$ <?php echo $ingresos; ?> USD</p>
        </div>
        <!-- Bloque Menos disponibles -->
        <div class="bloque">
            <!-- Titulo -->
            <h2 class="bloque__heading">Eventos con menos lugares disponibles</h2>
            <!-- Listado Eventos menos disponibles -->
            <?php foreach($menosDisponibles as $evento): ?>
                <!-- Evento -->
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . ' - ' . $evento->disponibles . ' Disponibles'; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Bloque Mas disponibles -->
        <div class="bloque">
            <!-- Titulo -->
            <h2 class="bloque__heading">Eventos con mas lugares disponibles</h2>
            <!-- Listado Eventos menos disponibles -->
            <?php foreach($masDisponibles as $evento): ?>
                <!-- Evento -->
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $evento->nombre . ' - ' . $evento->disponibles . ' Disponibles'; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>