<style>
       .line {
            border-bottom: 5px solid black;
            margin: 10px 0;
        }

        .form-check-input.is-invalid {
                border-color: black;
            }

            .form-check-input.is-invalid:checked {
                background-color: black;
                border-color: black;
            }

            .form-check-input.is-invalid:focus {
                box-shadow: none;
            }

            .form-check-label.text-muted {
                color: black;
            }
</style>


<!-- Productos-->
<div style="background-color: #F6F6F6;" class="row justify-content-center text-center">
    <div style="margin-left: 0%">
    <h1 class="Contacto" style="font-size: 40px; font-weight: bold;  margin-top: 100px;">Nuestros productos</h1>
    <p class="Contacto" style="font-size: 20px; color: #6D9886;"><small class="text-muted">Descubre nuestras novedades y ofertas</small></p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="line"> </div>

    <div class="row row-cols-1 row-cols-md-4">
        <?php foreach ($producto as $row) {
        if ($row['producto_estado'] == 1) {
        ?>
            <div class="col">
                <div class="card text-center">
                    <img class="card-img-top" src="<?php echo base_url('assets/img/'.$row['producto_imagen']); ?>" alt="" alt="card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['producto_nombre'];?></h5>
                            <p class="card-text"><?php echo $row['producto_descrip'];?></p>
                            <p class="card-text"><?php echo "$"; echo $row['producto_precio'];?></p>

                            <?php if (session('login')){
                                echo form_open('agregarCarrito');
                                echo form_hidden('id', $row['producto_id']);
                                echo form_hidden('titulo', $row['producto_nombre']);
                                echo form_hidden('precio', $row['producto_precio']);
                                echo form_submit('comprar', 'Añadir al carrito', "class='btn btn-outline-light btn-floating m-1' style='background-color: #6D9886'");
                                echo form_close();
                            }?>
                            <hr>
                        </div>
                </div>
            </div>
            <?php
        }
        } ?>
    </div>

</div>


</div>
    <h1 style="margin-bottom: 100px"></h5>
</div> 