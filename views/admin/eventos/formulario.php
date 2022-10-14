<!-- Parte 1 - Formulario -->
<fieldset class="formulario__fieldset">
     <!-- Informacion del Evento -->
    <legend class="formulario__legend">Informacion Evento</legend>
    <!-- Nombre -->
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre Evento</label>
        <input class="formulario__input" type="text" id="nombre" name="nombre" placeholder="Nombre Evento" value="<?php echo $evento->nombre; ?>">
    </div>
    <!-- Descripcion -->
    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripcion</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripcion Evento" rows="6"><?php echo $evento->descripcion; ?></textarea>
    </div>
    <!-- Categorias -->
    <div class="formulario__campo">
        <label class="formulario__label" for="categoria">Categoria o Tipo de Evento</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value=""> -- Seleccionar -- </option>
            <?php foreach($categorias as $categoria): ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : ''; ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Dias-->
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Selecciona el Dia</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia): ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input type="radio" id="<?php echo strtolower($dia->nombre); ?>" name="dia" value="<?php echo $dia->id; ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <input type="hidden" name="dia_id" value="">
    </div>
    <!-- Horas -->
    <div class="formulario__campo" id="horas">
        <label class="formulario__label" for="hora">Seleccionar Hora</label>
        <ul id="horas" class="horas">
            <?php foreach($horas as $hora): ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?></li>
            <?php endforeach; ?>
        </ul>

        <input type="hidden" name="hora_id" value="">
    </div>
</fieldset>
<!-- Parte 2 - Formulario -->
<fieldset class="formulario__fieldset">
    <!-- Informacion Extra -->
    <legend class="formulario__legend">Informacion Extra</legend>
    <!-- Ponente -->
    <div class="formulario__campo">
        <label class="formulario__label" for="ponentes">Ponente</label>
        <input class="formulario__input" type="text" id="ponentes" placeholder="Buscar Ponente">
    </div>
    <!-- Lugares Disponibles -->
    <div class="formulario__campo">
        <label class="formulario__label" for="disponibles">Lugares Disponibles</label>
        <input class="formulario__input" type="number" min="1" id="disponibles" name="disponibles" placeholder="Ej. 20" value="<?php echo $evento->disponibles; ?>">
    </div>
</fieldset>