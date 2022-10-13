<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Boton Volver -->
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>
<!-- Contenedor -->
<div class="dashboard__formulario">
    <!-- Alertas -->
    <?php include_once __DIR__ .  './../../templates/alertas.php'; ?>
    <!-- Formulário -->
    <form class="formulario" method="POST" action="/admin/eventos/crear">
        <!-- Partes -->
        <?php include_once __DIR__ . '/formulario.php'; ?>
        <!-- Boton Enviar -->
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Evento">
    </form>
</div>