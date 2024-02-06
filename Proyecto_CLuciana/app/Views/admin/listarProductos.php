<style>
    .line {
       border-bottom: 5px solid black;
       margin: 10px 0;
    }

    .gif-container {
    position: relative;
    display: inline-block;
    }

    .hover-image {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
    }

    .gif-container:hover .hover-image {
    opacity: 1;
    }

    .static-image {
    transition: opacity 0.3s ease;
    }

    .gif-container:hover .static-image {
    opacity: 0;
    }
</style>

<!-- LISTA PRODUCTOS-->
<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
      <div class="row justify-content-center text-center">
        <p class="Contacto" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Gestiona, edita y visualiza todos tus productos</small></p>
        <h1 class="Contacto" style="font-size: 40px; font-weight: bold; margin-top: -10px">Tus productos</h1>
        
        <?php echo "<div class='line'></div>"; ?>
      </div>

    <div class="container">
    <table id="mytable" class="table table-bordred" style="background-color: white; margin-bottom: 100px">
        <thead>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Stock</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach ($producto as $row){ ?>
            <tr>
                <td><img src="<?php echo base_url('assets/img/'.$row['producto_imagen']);?>" alt="" height="100" width="100"></td>
                <td> <?php echo $row['producto_nombre'];?></td>
                <td><?php echo $row['categoria_desc'];?></td>
                <td><?php echo $row['producto_stock'];?></td>
                <td><a href="<?php echo base_url('editar/'.$row['producto_id']);?>">
                    <img src="assets/img/lapizEditar.png" alt="Editar" width="50">
                </a>
                </td>
                
                <?php
                if ($row['producto_estado']==1) {?>
                    <td><a href="<?php echo base_url('eliminar/'.$row['producto_id']);?>">
                        <span class="gif-container">
                            <img src="assets/img/ojo.png" alt="Editar" class="static-image">
                            <img src="assets/img/ojo.gif" alt="Editar" class="hover-image">
                        </span>
                    </td>
                    <?php } else {
                        ?>
                    <td><a href="<?php echo base_url('activar/'.$row['producto_id']);?>">
                        <img src="assets/img/ojoOcultar.png" alt="activar" width="50"></a>
                    </td>
                <?php } ?>

        
            <?php } ?>
            </tr>
        </tbody>
    </table>
</div>