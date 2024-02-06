<?php if (session()->getFlashdata('Mensaje')) {
            echo "
            <div class='mt-3 mb-3 h4 text-center alert alert-success alert-dismissible'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('Mensaje') . "
            </div>";
        } ?>

<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Ventas" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Ingresa las caracteristicas de tu producto aqui</small></p>
            <h1 class="Ventas" style="font-size: 40px; font-weight: bold; margin-top: -10px">Agregar Producto</h1>
            <?php echo "<div class='line'></div>"; 
            ?>
        </div>

    <div class="container">
    <div class="w-50 mx-auto">
        <?php if (session()->getFlashdata('success')): ?>

        <div class="succes">
            <p class="is-succes"> <?= session()->getFlashdata('success')?></p>
        </div>
        <?= session()->getFlashdata('success')?>
        <?php endif; ?>
        <?php echo form_open_multipart('actualizar')?>

        <?php echo form_hidden('producto_id',$producto['producto_id']);?> <!--//////////////// -->

        <div class="form-group">
        <label for="titulo">Título</label>
            <?php echo form_input(['name' => 'titulo', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' =>$producto['producto_nombre']]);?>
            <p class="is-danger"><?=session('errors.titulo')?></p>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <?php echo form_input(['name' => 'stock', 'class' => 'form-control','value' => $producto['producto_stock']]);?>
            <p class="is-danger"><?=session('errors.stock')?></p>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <?php echo form_input(['name' => 'descripcion', 'class' => 'form-control','value' => $producto['producto_descrip']]);?>
            <p class="is-danger"><?=session('errors.descripcion')?></p>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <?php echo form_input(['name' => 'precio', 'class' => 'form-control','value' => $producto['producto_precio']]);?>
            <p class="is-danger"><?=session('errors.precio')?></p>
        </div>

        <div class="form-group"> 
            <label for="imagen"></label>
            <img src="<?php echo base_url('assets/img/'.$producto['producto_imagen']);?>" alt="" height="100" width="100">
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file']);?>
            <p class="is-danger"><?=session('errors.imagen')?></p>
        </div>

        <div class="form-group"> 
            <label for="categoria">Categoria</label>
            <?php $CategoriaModel = model('CategoriaModel');
            $data = $CategoriaModel->obtenerCategorias();
            $opciones=array_column($data, 'categoria_desc');
            array_unshift($opciones, 'Seleccione categoria');
            $selected = $producto['producto_categoria'];
            ?>
            <?php echo form_dropdown ('categoria', $opciones, $selected, 'class= "form-control"'); ?>
        </div>

        <?php echo form_hidden('id', $producto['producto_id']);?>

        <div class="form-group text-center">
            <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-outline-dark'");?>
        </div>

        </div>

    </div>
</div>
</div>