<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Boton Registrar -->
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/ponentes/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Ponente
    </a>
</div>
<!-- Listado de Ponentes -->
<div class="dashboard__contenedor--mobile">
    <?php if(!empty($ponentes)): ?>
        <!-- Registrados -->
        <?php foreach($ponentes as $ponente): ?>
            <!-- Nombre del Ponente -->
            <h3 class="dashboard__contenedor--mobile__h3"><?php echo $ponente->nombre . ' ' . $ponente->apellido; ?></h3>
            <!-- Datos del Ponente -->
            <div class="dashboard__contenedor--mobile__evento">
                <!-- Ubicacion -->
                <label class="dashboard__contenedor--mobile__label">Ubicacion </label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $ponente->ciudad . ', ' . $ponente->pais; ?></p>
                <!-- Tags -->
                <label class="dashboard__contenedor--mobile__label">Conocimientos</label>
                <p class="dashboard__contenedor--mobile__p"><?php echo str_replace(',', ' - ', $ponente->tags); ?></p>
                <!-- Boton Editar y Boton Eliminar -->
                <div class="dashboard__contenedor--mobile__botones">
                    <!-- Editar -->
                    <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id; ?>">
                        <!-- Icono Editar -->
                        <i class="fa-solid fa-pencil"></i>
                        Editar
                    </a>
                    <!-- Eliminar -->
                    <form class="dashboard__contenedor--mobile__formulario" id="eliminarPonente" method="POST" action="/admin/ponentes/eliminar">
                        <input type="hidden" name="id" value="<?php echo $ponente->id ?>">
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
        <p class="text-center">No hay Registrados Aún</p>
    <?php endif; ?>
</div>
<!-- Listado de Ponentes -->
<div class="dashboard__contenedor dashboard__contenedor--ponentes">
    <?php if(!empty($ponentes)): ?>
        <!-- Tabla -->
        <table class="table">
            <!-- Informacion Ponentes -->
            <thead class="table__thead">
                <tr>
                    <!-- Datos -->
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Ubicacion</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <!-- Ponentes -->
            <tbody class="table__tbody">
                <!-- Listado -->
                <?php foreach($ponentes as $ponente):?>
                    <tr class="table__tr">
                        <!-- Nombre y Apellido -->
                        <td class="table__td">
                            <?php echo $ponente->nombre . ' ' . $ponente->apellido;?>
                        </td>
                        <!-- Ciudad y Pais -->
                        <td class="table__td">
                            <?php echo $ponente->ciudad . ', ' . $ponente->pais;?>
                        </td>
                        <!-- Boton Editar y Boton Eliminar -->
                        <td class="table__td--acciones">
                            <!-- Editar -->
                            <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id; ?>">
                                <!-- Icono Editar -->
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>
                            <!-- Eliminar -->
                            <form class="table__formulario" id="eliminarPonente" method="POST" action="/admin/ponentes/eliminar">
                                <input type="hidden" name="id" value="<?php echo $ponente->id ?>">
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
        <?php header('Location: /admin/ponentes/crear'); ?>
    <?php endif; ?>
</div>
<!-- Paginacion -->
<?php
    echo $paginacion;
?>