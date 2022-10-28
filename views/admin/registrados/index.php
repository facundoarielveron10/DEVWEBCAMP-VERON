<!-- Titulo -->
<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<!-- Listado de Registrados -->
<div class="dashboard__contenedor">
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