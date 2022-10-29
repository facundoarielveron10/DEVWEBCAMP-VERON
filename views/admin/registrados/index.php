<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Listado de Registrados -->
<div class="dashboard__contenedor--mobile">
    <?php if(!empty($registrados)): ?>
        <!-- Registrados -->
        <?php foreach($registrados as $registrado): ?>
            <!-- Nombre del Registrado -->
            <h3 class="dashboard__contenedor--mobile__h3"><?php echo $registrado->usuario->nombre . ' ' . $registrado->usuario->apellido; ?></h3>
            <!-- Datos del Registrado -->
            <div class="dashboard__contenedor--mobile__evento">
                <!-- Tipo -->
                <label class="dashboard__contenedor--mobile__label">Email </label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $registrado->usuario->email; ?></p>
                <!-- Dia y Hora -->
                <label class="dashboard__contenedor--mobile__label">Plan</label>
                <p class="dashboard__contenedor--mobile__p"><?php echo $registrado->paquete->nombre; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No hay Registrados Aún</p>
    <?php endif; ?>
</div>
<!-- Listado de Registrados -->
<div class="dashboard__contenedor dashboard__contenedor--registrados">
    <?php if(!empty($registrados)): ?>
        <!-- Tabla -->
        <table class="table">
            <!-- Informacion Registrados -->
            <thead class="table__thead">
                <tr>
                    <!-- Datos -->
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Plan</th>
                </tr>
            </thead>
            <!-- Registrados -->
            <tbody class="table__tbody">
                <!-- Listado -->
                <?php foreach($registrados as $registrado):?>
                    <tr class="table__tr">
                        <!-- Nombre y Apellido -->
                        <td class="table__td">
                            <?php echo $registrado->usuario->nombre . ' ' . $registrado->usuario->apellido;?>
                        </td>
                        <!-- Email -->
                        <td class="table__td">
                            <?php echo $registrado->usuario->email;?>
                        </td>
                        <!-- Plan -->
                        <td class="table__td">
                            <?php echo $registrado->paquete->nombre;?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No hay registros aún</p>
    <?php endif; ?>
</div>
<!-- Paginacion -->
<?php
    echo $paginacion;
?>