<?php

namespace App\Controllers;
use Config\Services;
use App\Models\ConsultaModel;
use App\Models\ProductosModel;
use App\Models\VentaModel;
use App\Models\CategoriaModel;
use App\Models\ModelUsuario;
use App\Models\DetalleVentaModel;

class AdminController extends BaseController
{
    public function inicioAdmin(){ 
        $data['title']= 'Inicio';
        return view('header', $data).view('admin/navbarAdmin').view('admin/homeAdmin').view('footer');
    }

    public function agregarProductoAdmin(){
        $categoria = new CategoriaModel();
        $data ['categorias'] = $categoria->findAll();
        $data['title']= 'Agregar producto';

        return view('header', $data).view('admin/navbarAdmin').view('admin/agregarProducto', $data).view('footer');
    }

    public function registrarProductoAdmin(){

        if (! $this->request->is('post')) {
            $data['title']= 'Agregar producto';
            return redirect()->route('agregarProducto')->with('error','Error al ingresar los datos');
            return view('header', $data).view('admin/navbarAdmin').view('admin/agregarProducto').view('footer');
        }

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'titulo' => 'required',
            'color' => 'required',
            'descripcion' => 'required',
            'categoria' => 'is_not_unique[categorias.categoria_id]', 
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'precio' => 'required|numeric',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4095]|is_image[imagen]'
        ], [
            'titulo' => [
                'required' => 'Debe fijar un titulo',
            ],
            'color' => [
                'required' => 'Debe fijar un color',
            ],
            'descripcion' => [
                'required' => 'Debe fijar una descripcion',
            ],
            'categoria' => [
                'is_not_unique' => 'Producto ya registrado'
            ],
            'stock' => [
                'required' => 'Debe fijar un stock',
                'integer' => 'El campo Stock debe ser un número entero',
                'greater_than_equal_to' => 'El campo Stock debe ser mayor o igual a 0'
            ],
            'precio' => [
                'required' => 'Debe fijar un precio',
                'numeric' => 'El campo Precio debe ser un número'
            ],
            'imagen' => [
                'uploaded' => 'Debe subir una imagen',
                'max_size' => 'El tamaño de la imagen debe ser menor a 4 MB',
                'is_image' => 'El archivo seleccionado no es una imagen válida'
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->to('agregarProducto')->withInput()->with('errors',$validation->getErrors());

        }else{
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/img', $nombre_aleatorio);

            $data = [
            'producto_nombre' => $request->getPost('titulo'),
            'producto_color' => $request->getPost('color'),
            'producto_descrip' => $request->getPost('descripcion'),
            'producto_stock' => $request->getPost('stock'),
            'producto_precio' => $request->getPost('precio'),
            'producto_imagen' => $nombre_aleatorio,
            'producto_categoria' => $request->getPost('categoria'),
            'producto_estado' => 1 
            ];

            $producto = new ProductosModel();
            $producto->insert($data);

            return redirect()->route('agregarProducto');
        }
           
    }

    public function listarProductosAdmin(){
        $producto_model = new ProductosModel();
        $data ['producto']=$producto_model->where('producto_estado', 1)-> where('producto_stock >', 0) -> join ('categorias', 'categorias.categoria_id = producto.producto_categoria')->findAll();
        $data['title']= 'Listar productos';

        return view('header', $data).view('admin/navbarAdmin').view('admin/catalogoProductos').view('footer');
    }

    public function verConsultas(){
        $consulta = new ConsultaModel();
        $data['titulo'] = 'Consultas';
        return view('header',$data).view('admin/navbarAdmin').view('admin/listarConsultas').view('footer');
    }

    public function listarUsuariosController(){
        $usuario_model = new ModelUsuario();
        $data['title']= "Listado de usuarios";
        $data['usuarios']= $usuario_model->findAll();

        return view ('header', $data).view('admin/navbarAdmin').view('admin/listarUsuarios').view('footer');
    }

    
    public function gestionarProductosAdmin(){
        $producto_model = new ProductosModel();
        $categoria = new CategoriaModel();
        $data['categorias']= $categoria->findAll();
        $data['producto']= $producto_model->join('categorias', 'categorias.categoria_id = producto.producto_categoria')->findAll();
        $data['title']='Listar producto';

        return view('header', $data).view('admin/navbarAdmin').view('admin/listarProductos').view('footer');
    }


    public function editarProductosAdmin($id=null){
        // $producto_model= new ProductosModel();
        // $categoria = new CategoriaModel();
        $productos = model('ProductosModel');
        // $data['categorias']= $categoria->findAll();
        
        $data['producto']= $productos->where('producto_id', $id)->first();
        $data['title']='Edición productos';

        return view('header', $data).view('admin/navbarAdmin').view('admin/editarProducto').view('footer');

    }

    public function actualizarProductoAdmin() {
        $CategoriasModel = model('CategoriaModel');
        $ProductosModel = model('ProductosModel');
        
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();


        $data['categorias']= $CategoriasModel->findAll();

        $id = $this->request->getPost('producto_id');

        $producto = $ProductosModel->where('producto_id', $id)->first();
        echo "ID: " . $id . "<br>";
        echo "Producto: ";
        print_r($producto);
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
    }

    public function eliminarProductosAdmin($id=null){
        //se actualiza el estado del producto
        $data = array ('producto_estado'=>'0');
        $producto = new ProductosModel();
        $producto->update($id, $data);
        
        return redirect()-> route('gestionar');
    }

    public function activarProductosAdmin($id=null){
        //se actualiza el estado del producto
        $data = array('producto_estado'=> '1');
        $producto = new ProductosModel();
        $producto->update ($id, $data);

        return redirect()-> route('gestionar');
    }

    // public function ocultarVerProductos($id=null){
    //     $productosModel= model('ProductosModel');
    //     $producto = $productosModel->where('producto_id',$id)->first();
       
    //     $estado = $producto['producto_estado'];

    //     if($estado == '1'){
    //         $data = array('producto_estado' => '2');
    //         $productosModel->update($id, $data);
    //     }else{
    //         $data = array('producto_estado' => '1');
    //         $productosModel->update($id, $data);
    //     }
    //     return redirect()->route('gestionar');
    // }
}   