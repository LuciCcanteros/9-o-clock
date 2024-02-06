<style>
    .line {
       border-bottom: 5px solid black;
       margin: 10px 0;
    }
</style>

<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Ventas" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Detalle de la venta</small></p>
            <h1 class="Ventas" style="font-size: 40px; font-weight: bold; margin-top: -10px">
                <th colspan="6">Venta
                <?php echo $venta['venta_id'];?></th></h1>
            <?php echo "<div class='line'></div>"; ?>
            <?php $detallesModel = model('DetalleVentaModel');
            $detalles = $detallesModel->obtenerDetalles($venta['venta_id']);?>
        </div>

        <div class="container">
            <table id="mytable" class="table table-bordered text-center">
                <thead>

                <tr>
                    <th colpsan="2" scope="col">ID del producto</th>
                    <th colpsan="2" scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                </tr>

                <tbody>
                    <?php foreach ($detalles as $detalle):?>
                    <?php 
                        $productos = model ('ProductosModel');
                        $producto = $productos->where('producto_id',$detalle['id_producto'])->first();
                    ?>

                    <tr>
                        <td><?php echo $venta['venta_id'];?></th>
                        <td><?php echo  $producto['producto_nombre'];?></td>
                        <td><?php echo  "$".$producto['producto_precio'];?></td>
                        <td><?php echo  $detalle['detalle_cantidad']?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-end1">
                <a href="javascript:history.back()" class="btn btn-dark" style="margin: 20px;">Atrás</a>
            </div>
            
        </div>
    </div>
</div>

