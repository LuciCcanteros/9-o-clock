<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Ventas" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Ingresa las caracteristicas de tu</small></p>
            <h1 class="Ventas" style="font-size: 40px; font-weight: bold; margin-top: -10px">Agregar Producto</h1>
            <?php echo "<div class='line'></div>"; 
            ?>
        </div>

    <h1 class="text-center">Listado de Usuarios</h1>
    <div class="container">
        <table id="mytable" class="table table-bordered table-striped table-hover">
            <thead>
                <th>Id usuario</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Perfil</th>

            </thead>
            <tbody>
                <?php foreach ($usuarios as $row){ ?>
                <tr>
                    <td> <?php echo $row['usuario_id'];?></td>
                    <td> <?php echo $row['usuario_apellido'];?></td>
                    <td> <?php echo $row['usuario_nombre'];?></td>
                    <td><?php echo $row['usuario_email'];?></td>
                    <?php
                    if ($row['perfil_id']==1)
                    {?>
                        <td>Administrador</td>
                        <?php } else {
                        ?>
                        <td>Cliente</td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>