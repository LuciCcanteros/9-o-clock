<style>
       .line {
            border-bottom: 5px solid black;
            margin: 10px 0;
        }
</style>

<?php 
    $session = session();
    $cart = \Config\Services::cart();
    
?>

<!-- Contactanos-->
<div style="background-color: #F6F6F6;" class="row justify-content-center text-center">
    <div style="margin-left: 0%">
      <p style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Visualiza todos tus productos desde aqui</small></p>
      <h1 style="font-size: 40px; font-weight: bold; margin-top: -10px">Mi Carrito</h1>
        <?php echo "<div class='line'></div>"; ?>

                <div style="margin-left: 200px; margin-right: 200px; margin-top: 50px;">

                        <?php if ($cart->contents() != NULL){ ?>
                        <table id="maytable" class="table table-bordred"> 
                            <thead>
                                <td></td>
                                <td></td>
                                <td>Nombre</td>
                                <td>Precio</td>
                                <td>Cantidad</td>
                                <td>Subtotal</td>
                            </thead>

                            <tbody>
                                <?php
                                $total = 0;
                                $i = 1;
                                foreach ($cart->contents() as $item):?>
                                <tr>
                                    <td><?php echo anchor('eliminarItem/'.$item['rowid'], '<img src="assets/img/cruz.png" alt="Eliminar" class="delete-icon" style="max-width: 30px">');?></td>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $item['name'];?></td>
                                    <td>$<?php echo $item['price'];?></td>
                                    <td><?php echo $item['qty'];?></td>
                                    <td style="font-weight: bold;">$<?php echo $item['subtotal'];$total=$total + $item ['subtotal']?></td>

                                </tr>

                                <?php endforeach; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><h4 style="font-weight: bold;">$<?php echo $total; ?></h4></td>
                                </tr>
                            </tbody>

                            <div style="margin-bottom: 50px">
                                <a href="<?php echo base_url('vaciarCarrito/all');?>" class="btn btn-sucess btn-dark">Vaciar carrito</a>
                                <a href="<?php echo base_url('ventaRegistrada');?>" class="btn btn-sucess btn-dark" role='button'>Ordenar compra</a>
                                <a href="catalogoProductos" class="btn btn-sucess btn-dark" role="button">Continuar comprando</a>
                            </div>

                            <?php if (session()->getFlashdata('success')) { ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success')?>
                                </div>
                            <?php }?>
                            
                        </table>
                
                            <?php if (session()->getFlashdata('error')) { ?>
                                <div style="margin-top:15px" class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php } ?>

                        <?php }else { ?>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <div style="padding: 20px;">
                                    <h1 style="font-size: 40px; font-weight: bold; margin: 0;">Tu carrito está vacío</h1>
                                    <p style="font-size: 20px; color: #6D9886; margin-top: 10px;"><small class="text-muted">Todavía no has elegido ningún producto</small></p>
                                    <a href="catalogoProductos" class="btn btn-sucess btn-dark" role="button" style="margin-bottom: 50px;">Seguir comprando</a>
                                </div>

                                <div style="padding: 20px;">
                                    <img src="assets/img/cartIcon.png" style="max-width: 70%;">
                                </div>
                            </div>
                        <?php } ?>
        </div>
    </div>
</div>
