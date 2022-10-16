<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Boton Añadir -->
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>
<!-- Listado de Eventos -->
<div class="dashboard__contenedor--mobile">
    <?php if(!empty($eventos)): ?>
        <!-- Eventos -->
        <?php foreach($eventos as $evento): ?>
            <!-- Nombre del Evento -->
            <h3 class="dashboard__contenedor--mobile__h3"><?php echo $evento->nombre; ?></h3>
            <!-- Datos del Evento -->
            <div class="dashboard__contenedor--mobile__evento">
                <!-- Tipo -->
                <label class="dashboard__contenedor--mobile__label">Tipo </label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $evento->categoria->nombre; ?></p>
                <!-- Dia y Hora -->
                <label class="dashboard__contenedor--mobile__label">Dia y Hora</label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $evento->dia->nombre . ', ' . $evento->hora->hora?></p>
                <!-- Ponente -->
                <label class="dashboard__contenedor--mobile__label">Ponente</label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido ?></p>
                <!-- Botones Eliminar y Editar -->
                <div class="dashboard__contenedor--mobile__botones">
                    <!-- Editar -->
                    <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $evento->id; ?>">
                        <!-- Icono Editar -->
                        <i class="fa-solid fa-user-pen"></i>
                        Editar
                    </a>
                    <!-- Eliminar -->
                    <form class="dashboard__contenedor--mobile__formulario" method="POST" action="/admin/ponentes/eliminar">
                        <input type="hidden" name="id" value="<?php echo $evento->id ?>">
                        <button class="table__accion table__accion--eliminar" type="submit">
                            <!-- Icono Eliminar -->
                            <i class="fa-solid fa-circle-xmark"></i>
                                Eliminar
                        </button>
                    </form>          
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No hay Eventos Aún</p>
    <?php endif; ?>
</div>
<!-- Listado de Eventos -->
<div class="dashboard__contenedor dashboard__contenedor--eventos">
    <?php if(!empty($eventos)): ?>
        <!-- Tabla -->
        <table class="table">
            <!-- Informacion Eventos -->
            <thead class="table__thead">
                <tr>
                    <!-- Datos -->
                    <th scope="col" class="table__th">Evento</th>
                    <th scope="col" class="table__th">Tipo</th>
                    <th scope="col" class="table__th">Dia y Hora</th>
                    <th scope="col" class="table__th">Ponente</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <!-- Eventos -->
            <tbody class="table__tbody">
                <!-- Listado -->
                <?php foreach($eventos as $evento):?>
                    <tr class="table__tr">
                        <!-- Nombre -->
                        <td class="table__td">
                            <?php echo $evento->nombre;?>
                        </td>
                        <!-- Tipo -->
                        <td class="table__td">
                            <?php echo $evento->categoria->nombre; ?>
                        </td>
                        <!-- Dia y Hora -->
                        <td class="table__td">
                            <?php echo $evento->dia->nombre . ', ' . $evento->hora->hora?>
                        </td>
                        <!-- Ponente -->
                        <td class="table__td">
                            <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido ?>
                        </td>
                        <!-- Boton Editar y Boton Eliminar -->
                        <td class="table__td--acciones">
                            <!-- Editar -->
                            <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $evento->id; ?>">
                                <!-- Icono Editar -->
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <!-- Eliminar -->
                            <form class="table__formulario" method="POST" action="/admin/ponentes/eliminar">
                                <input type="hidden" name="id" value="<?php echo $evento->id ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <!-- Icono Eliminar -->
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No hay Eventos Aún</p>
    <?php endif; ?>
</div>
<!-- Paginacion -->
<?php
    echo $paginacion;
?>
