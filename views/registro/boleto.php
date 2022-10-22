<!-- Boleto Virtual -->
<main class="pagina">
    <!-- Titulo -->
    <h2 class="pagina__heading"><?php echo $titulo; ?></h2>
    <!-- Descripcion -->
    <p class="pagina__descripcion">Tu boleto - Te recomendamos guardarlo, puedes compartirlo en redes sociales :)</p>
    
    <!-- Contenedor Boleto -->
    <div class="boleto-virtual">
        <!-- Boleto -->
        <div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre); ?> boleto--acceso">
            <!-- Contenido -->
            <div class="boleto__contenido">
                <!-- Logo -->
                <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
                <!-- Plan del boleto -->
                <p class="boleto__plan"><?php echo $registro->paquete->nombre; ?></p>
                <p class="boleto__nombre"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?></p>
            </div>
            <!-- Codigo -->
            <p class="boleto__codigo"><?php echo "#" . $registro->token; ?></p>
        </div>
    </div>
</main>