<!-- Titulo -->
<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<!-- Descripcion -->
<p class="pagina__descripcion">Elige hasta 5 eventos para asistir de forma presencial.</p>
<!-- Conferencias y Workshops -->
<div class="eventos-registro">
    <!-- Listado -->
    <main class="eventos-registro__listado">
        <!-- Titulo -->
        <h3 class="eventos-registro__heading--conferencias">&lt;Conferencias /></h3>
        <!-- Fecha -->
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>
        
        <!-- Conferencias -->
        <div class="eventos-registro__grid">
            <!-- Conferencias (Viernes) -->
            <?php foreach($eventos['conferencias_v'] as $evento): ?>
                <!-- Conferencia -->
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach; ?>
        </div>

        <!-- Fecha -->
        <p class="eventos-registro__fecha">Sabado 6 de Octubre</p>
        
        <!-- Conferencias -->
        <div class="eventos-registro__grid">
            <!-- Conferencias (Sabado) -->
            <?php foreach($eventos['conferencias_s'] as $evento): ?>
                <!-- Conferencia -->
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach; ?>
        </div>

        <!-- Titulo -->
        <h3 class="eventos-registro__heading--workshops">&lt;Workshops /></h3>
        <!-- Fecha -->
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>
        
        <!-- Workshops -->
        <div class="eventos-registro__grid eventos--workshops">
            <!-- Workshops (Viernes) -->
            <?php foreach($eventos['workshops_v'] as $evento): ?>
                <!-- Workshop -->
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach; ?>
        </div>

        <!-- Fecha -->
        <p class="eventos-registro__fecha">Sabado 6 de Octubre</p>
        
        <!-- Workshops -->
        <div class="eventos-registro__grid eventos--workshops">
            <!-- Workshops (Sabado) -->
            <?php foreach($eventos['workshops_s'] as $evento): ?>
                <!-- Workshop -->
                <?php include __DIR__ . '/evento.php'; ?>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Resumen Registro -->
    <aside class="registro registro--pago">
        <!-- Titulo -->
        <h2 class="registro__heading">Tu Registro</h2>

        <!-- Resumen -->
        <div class="registro__resumen" id="registro-resumen"></div>
        
        <!-- Regalos -->
        <div class="registro__regalo">
            <!-- Titulo -->
            <label class="registro__label" for="regalo"> Selecciona un regalo</label>
            <!-- Seleccionador -->
            <select class="registro__select" id="regalo">
                <option value="">-- Selecciona tu regalo --</option>
                <?php foreach($regalos as $regalo): ?>
                    <option value="<?php echo $regalo->id; ?>"><?php echo $regalo->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <!-- Enviar Registro -->
        <form class="formulario" id="registro">
            <div class="formulario__campo">
                <input class="formulario__submit formulario__submit--full" type="submit" value="Registrarme">
            </div>
        </form>
    </aside>
</div>