<div class="container">
    <h1 class="display-4 text-center">Lista de productos</h1>

    <div class="row">
        <?php foreach ($producto as $row) { ?>
            <div class="col-md-6">
                <div class="card text-center">
                    <img class="card-img-top" src="<?php echo base_url('assets/img/'.$row['producto_imagen']); ?>" alt="" height="150" width="150" alt="card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['producto_nombre'];?></h5>
                            <p class="card-text"><?php echo $row['producto_descrip'];?></p>
                            <p class="card-text"><?php echo "$"; echo $row['producto_precio'];?></p>
                            <p class="card-text"><?php echo "Categoria "; echo $row['categoria_desc'];?></p>
                            <?php if(session('login')){
                                echo form_submit('Comprar', 'Agregar al carrito', 'class="btn btn-sucess "');
                            }?>


                            <hr>
                        </div>
                </div>
            </div>
            <?php } ?>
    </div>
</div>