<style>
    .line {
       border-bottom: 5px solid black;
       margin: 10px 0;
    }
</style>

<!-- LISTA PRODUCTOS-->
<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Ventas" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Observa la actividad de tus clientes desde aqui</small></p>
            <h1 class="Ventas" style="font-size: 40px; font-weight: bold; margin-top: -10px">Tus ventas</h1>
            <?php echo "<div class='line'></div>"; 
            ?>
        </div>
        <div class="container">
            <table id="mytable" class="table table-bordered" style="background-color: white;">
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>ID Cliente</th>
                        <th>Fecha de Venta</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ventas as $venta) { ?>
                    <tr>
                        <td> <?php echo $venta['venta_id']; ?></td>
                        <td><?php echo $venta['usuario_id']; ?></td>
                        <td><?php echo $venta['venta_fecha']; ?></td>
                        <td><a href="<?php echo base_url ('detalleVenta/'.$venta['venta_id']);?>">Ver detalles</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>