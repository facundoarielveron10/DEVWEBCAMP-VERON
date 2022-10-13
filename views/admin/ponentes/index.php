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
<div class="dashboard__contenedor">
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
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <!-- Eliminar -->
                            <form class="table__formulario" method="POST" action="/admin/ponentes/eliminar">
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
        <p class="text-center">No hay Ponentes Aún</p>
    <?php endif; ?>
</div>