<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Ventas" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Ingresa las caracteristicas de tu producto</small></p>
            <h1 class="Ventas" style="font-size: 40px; font-weight: bold; margin-top: -10px">Agregar Producto</h1>
            <?php echo "<div class='line'></div>"; 
            ?>
        </div>

    <div class="container">
        <div class="w-50 mx-auto">
            <?php if (isset($validation)){ ?>
            <div class="alert alert-danger">
                <?= $validation -> listErrors();?>
            </div>
            <?php }?>

            <?php echo form_open_multipart('insertarProducto')?>

            <div class="form-group">
                <label for="titulo">Título</label>
                <?php echo form_input([
                    'name'=> 'titulo', 
                    'id' => 'titulo', 
                    'class' => 'form-control', 
                    'placeholder' => 'Ingrese título del producto', 
                    'value' => set_value('titulo')]);?>
                <p class="is-danger"><?=session('errors.titulo')?></p>
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <?php echo form_input([
                    'name'=> 'color', 
                    'id' => 'color', 
                    'class' => 'form-control', 
                    'placeholder' => 'Ingrese color del producto', 
                    'value' => set_value('color')]);?>
                <p class="is-danger"><?=session('errors.color')?></p>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <?php echo form_input([
                    'name'=> 'descripcion', 
                    'id' => 'descripcion', 
                    'class' => 'form-control', 
                    'placeholder' => 'Ingrese descripcion del producto', 
                    'value' => set_value('descripcion')]);?>
                <p class="is-danger"><?=session('errors.descripcion')?></p>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <?php echo form_input([
                    'name'=> 'stock', 
                    'id' => 'stock', 
                    'class' => 'form-control', 
                    'placeholder' => 'Ingrese stock del producto', 
                    'value' => set_value('stock')]);?>
                <p class="is-danger"><?=session('errors.stock')?></p>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <?php echo form_input([
                    'name'=> 'precio', 
                    'id' => 'precio', 
                    'class' => 'form-control', 
                    'placeholder' => 'Ingrese precio del producto', 
                    'value' => set_value('precio')]);?>
                <p class="is-danger"><?=session('errors.precio')?></p>
            </div>


            <div class="form-group">
                <label for="categoria">Marca</label>
                <?php 
                $lista['0'] = 'Seleccione categoria';

                foreach($categorias as $row){
                    $categoria_id = $row['categoria_id'];
                    $categoria_desc = $row['categoria_desc'];
                    $lista[$categoria_id] = $categoria_desc;
                }
                echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
                ?>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <?php echo form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'value' => set_value('imagen')]);?>
                <p class="is-danger"><?=session('errors.imagen')?></p>
            </div>

            <div class="form-group mt-3 text-center">
                <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-outline-dark'");?>
            </div>

            <?php echo form_close();?>

        </div>

    </div>
</div>
</div>