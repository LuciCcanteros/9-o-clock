<div class="container">
<div class="w-80 mx-auto  text-center">
    <h1 class="mb-3 ">Detalles de la venta</h1>
    <table id="mytable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>ID Producto</th>
                <th>Detalle Cantidad</th>
                <th>Detalle Precio</th>

            </tr>
        </thead>
        <tbody>
           
            <?php
            
            $total = 0;

            foreach ($detalle as $detalle) { ?>

                <tr>
                    <td><?= $detalle['venta_id']; ?></td>
                    <td><?= $detalle['producto_id']; ?></td>
                    <td><?= $detalle['detalle_cantidad']; ?></td>
                    <td><?= $detalle['detalle_precio']; ?></td>
                    <?php $total=$total + $detalle ['detalle_precio'] * $detalle['detalle_cantidad']?>

                </tr>
            <?php } ?>

            <td>Total Compra:$<?php echo $total; ?></td>

        </tbody>
    </table>

</div>
</div>


<div>
    <div class="display-flex"
        style="margin: 90px 40px 40px 40px; padding: 40px; color: #fff; background-color: var(--color4);">
        <?php $detallesModel = model('DetalleVentaModel');
         $detalles = $detallesModel->obtenerDetalles($venta['venta_id']);
        
       
   ?>
        <table id="mytable table" class="table table-striped text-center">
            <thead>
                <tr class="table-dark">
                    <th colspan="6">Detalle de venta
                        <?php echo $venta['venta_id'];?></th>

                </tr>


                <tr class="table-dark">
                    <th colpsan="2" scope="col">Producto</th>
                    <th scope="col"></th>
                    <th scope="col">Precio unitario</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Importe</th>
                </tr>

            </thead>
            <tbody>

                <?php foreach ($detalles as $detalle):?>
                <?php 
                  
                    $productos = model ('ProductosModel');
                    $producto = $productos->where('id',$detalle['producto_id'])->first();
                    //$rutaBase = "http://localhost/Proyecto_CLuciana/public/assets/img/";
                    
                    //$nombreImagen = $producto['producto_imagen'];
                    
                    //$rutaCompleta = $rutaBase . $nombreImagen;
                    
                ?>
                <tr class="table-dark">
                    
                    <td class="table-light"><?php echo  $producto['producto_nombre'];?></td>

                    <td class="table-light"><?php echo  "$".$producto['producto_precio'];?></td>
                    <td class="table-light"><?php echo  $detalle['detalle_cantidad']?> </td>
                    <td class="table-light"><?php echo  "$".$detalle['detalle_precio'];?> </td>

    </div>
    </tr>
    <?php endforeach; ?>

    </tbody>

    </table>
    <div class="d-flex justify-content-end1">
        <a href="javascript:history.back()" class="btn btn-dark ">Volver</a>
    </div>

</div>

</div>








<div class="form-group"> 
    <label for="categoria">Categoria</label>
    <?php 
    $lista['0'] = 'Seleccione categoria';
    foreach($categorias as $row){
        $lista[$row['categoria_id']]= $row ['categoria_desc'];
    }
    $sel=$producto['producto_categoria'];
    echo form_dropdown ('categoria', $lista, $sel, 'class= "form-control"');?>
</div>

<?php

namespace App\Controllers;
use Config\Services;
use App\Models\ConsultaModel;
use App\Models\ProductosModel;
use App\Models\VentaModel;
use App\Models\CategoriaModel;
use App\Models\ModelUsuario;

class AdminController extends BaseController
{

public function editarProductoValidacion() {
        $CategoriasModel = new CategoriaModel();
        $ProductosModel = new ProductosModel();
        
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();


        $data['categorias']= $CategoriasModel->findAll();

        $id = $this->request->getPost('producto_id');

        $producto = $ProductosModel->where('producto_id', $id)->first();
        $imagen_producto = $producto['producto_imagen'];
        $nueva_imagen = $this->request->getFile('imagen');

        
        $validation->setRules([
            'imagen' => 'is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png,image]'
        ],
        [
            "imagen"=>[
             "is_image"=>'Solo se aceptan archivos .jpg o .png',
             "mime_in "=>'Solo se aceptan archivos .jpg, .jpeg o .png',
 
            ]
        ] );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else if($nueva_imagen->isValid()){
            $imagen_producto = $nueva_imagen->getRandomName();
            $nueva_imagen->move(ROOTPATH.'assets/img',$imagen_producto);
        }

        $validation->setRules([
            'titulo' => 'required',
            'descripcion' => 'required|alpha_space|max_length[100]',
            'stock' => 'required|is_natural',
            'precio' => 'required|numeric'
        ],
        [
            "titulo" => [
                "required" => 'El nombre es obligatorio'
            ],
            "descripcion" => [
                "required" => 'La descripcion es obligatoria',
                "alpha_space" => 'No se permiten numeros',
                "max_length" => 'Se admiten hasta 100 caracteres'
            ],

            "stock" => [
                "required" => 'El stock es obligatorio',
                "is_natural_no_zero" => 'Solo se aceptan numeros naturales '
            ],
            "precio" => [
                "required" => 'El precio es obligatorio',
                "numeric" => 'Solo se aceptan valores numericos'
            ],
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        } else {
            $categoriaSeleccionada = $request->getPost('categoria');

        $data = [
            'producto_nombre' => $request->getPost('titulo'),
            'producto_descrip' => $request->getPost('descripcion'),
            'producto_categoria' => $categoriaSeleccionada,
            'producto_stock' => $request->getPost('stock'),
            'producto_precio' =>$request->getPost('precio'),
            'producto_imagen' => $imagen_producto
        ];
        $ProductosModel->update($id,$data);
        return redirect()->to('gestionar')->with('mensaje_editado','Editado exitosamente.');
        }

        validar los datos ingresados
        controlar si se cambió la imagen
        $data = [
            'producto_nombre' => $request->getPost('titulo'),
            'producto_color' => $request->getPost('color'),
            'producto_descrip' => $request->getPost('descripcion'),
            'producto_stock' => $request->getPost('stock'),
            'producto_precio' => $request->getPost('precio'),
            'producto_categoria' => $request->getPost('categoria'),
        ];

        $producto = new ProductosModel();
        $producto->update($id, $data);
        mensaje que se actualizó correctamente
        $mensaje ="producto editado";
        return redirect()->route('gestionar')->with('success', $mensaje);
    } //editarProductoValidacion

    