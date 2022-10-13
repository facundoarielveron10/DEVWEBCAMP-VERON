<!-- Parte 1 - Formulario -->
<fieldset class="formulario__fieldset">
     <!-- Informacion del Evento -->
    <legend class="formulario__legend">Informacion Evento</legend>
    <!-- Nombre -->
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre Evento</label>
        <input class="formulario__input" type="text" id="nombre" name="nombre" placeholder="Nombre Evento">
    </div>
    <!-- Descripcion -->
    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripcion</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripcion Evento" rows="6"></textarea>
    </div>
    <!-- Categorias -->
    <div class="formulario__campo">
        <label class="formulario__label" for="categoria">Categoria o Tipo de Evento</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value=""> -- Seleccionar -- </option>
            <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getNombre(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Dias-->
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Selecciona el Dia</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia): ?>
                <div>
                    <label for="<?php echo strtolower($dia->getNombre()); ?>"><?php echo $dia->getNombre(); ?></label>
                    <input type="radio" id="<?php echo strtolower($dia->getNombre()); ?>" name="dia" value="<?php echo $dia->getId(); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Horas -->
    <div class="formulario__campo" id="horas">
        <label class="formulario__label" for="hora">Seleccionar Hora</label>
        <ul class="horas">
            <?php foreach($horas as $hora): ?>
                <li class="horas__hora"><?php echo $hora->getHora(); ?></li>
            <?php endforeach; ?>
        </ul>
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
        <input class="formulario__input" type="number" min="1" id="disponibles" name="disponibles" placeholder="Ej. 20">
    </div>
</fieldset>