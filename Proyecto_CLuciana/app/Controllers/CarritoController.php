<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;

class CarritoController extends BaseController{

    public function verCarritoController(){
        $cart = \Config\Services::cart();
        $data['title'] = 'Carrito de compras';

        $session = session();
        $cart = \Config\Services::cart();

        return view('header', $data).view('navbar').view('carrito').view('footer');
    }

    public function agregarCarritoController(){
        $cart = \Config\Services::cart();
        $request =  \Config\Services::request();
        $data = array(
            'id' => $request ->getPost('id'),
            'name' => $request->getPost('titulo'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        );

        $cart-> insert($data);
        //Mensaje q se agregó el carrito

        return redirect()->route('verCarrito');
    }

    public function eliminarItemController($rowid=null){
        $cart = \Config\Services::cart();
        if ($rowid === 'all') {
            $cart->destroy();
        } else {
            $cart->remove($rowid);
        }

      return redirect()->route('verCarrito');
}

public function guardarVentaController(){

    $cart = \Config\Services::cart();
    $venta = new VentaModel();
    $detalle_venta = new DetalleVentaModel();
    $productos = new ProductosModel();

    $cart1 = $cart-> contents();
    $total = 0;
    foreach ($cart1 as $item){
        $producto = $productos-> where('producto_id', $item['id'])->first();
        if ($producto['producto_stock'] < $item['qty']){
            $data ['ID'] = $item['id'];
            return redirect()->route('verCarrito', $data)->with('error','Stock insuficiente'); ///
        }
        $total = $total + $item['subtotal'];
    }

    $data = array(
        'usuario_id' => session('id'), ////////
        'venta_fecha' => date ('Y-m-d'),
        'venta_total' => $total
    );

    $ventaID = $venta->insert($data);
    $cart1 = $cart->contents();

    //cargar detalle de ventas
    foreach ($cart1 as $item){
        $detalle = array( /////
            'venta_id' => $ventaID,
            'id_producto' => $item['id'],
            'detalle_cantidad' => $item['qty'],
            'detalle_precio' => $item['price'] * $item['qty'],
        );

        $detalles = $detalle_venta->insert($detalle);
        $producto = $productos->where('producto_id', $item['id'])->first();
        $productoID = $producto['producto_id'];

        $stock = $producto['producto_stock']-$item['qty'];
        $data = array('producto_stock' => $stock);
        $productos->update($productoID, $data);
    }

    //mensaje de agradecimiento por la compra
    $cart->destroy();
    return redirect()->route('verCarrito');
    return redirect()->route('verCarrito')->with('mensajeExito', 'Gracias por su compra');
}
}


// public function guardarVentaController(){

//     $cart = \Config\Services::cart();
//     $venta = new VentaModel();
//     $detalle = new DetalleVentaModel();
//     $productos = new ProductosModel();

//     $cart1 = $cart-> contents();
//     $total = 0;
//     foreach ($cart1 as $item){
//         $producto = $productos-> where('producto_id', $item['id'])->first();
//         if ($producto['producto_stock'] < $item['qty']){
//             $data ['ID'] = $item['id'];
//             return redirect()->route('verCarrito', $data)->with('error','Stock insuficiente'); ///
//         }
//         $total = $total + $item['subtotal'];
//     }

//     $data = array(
//         'usuario_id' => session()->get('id'), ////////
//         'venta_fecha' => date ('Y-m-d'),
//         'venta_total' => $total
//     );

//     $ventaID = $venta->insert($data);
//     $cart1 = $cart->contents();

//     //cargar detalle de ventas
//     foreach ($cart1 as $item){
//         $detalle = array( /////
//             'venta_id' => $ventaID,
//             'id_producto' => $item['id'],
//             'detalle' => $item['qty'],
//             'detalle_precio' => $item['price'] * $item['qty'],
//         );

//         //Actualizar el stock del producto
//         $productos->update(['producto_id' => intval($item['id'])], ['producto_stock' => $producto['producto_stock'] - $item['qty']]);

//         //inserta el detalle de venta
//         $detalle-> insert ($detalle_venta);
//     }

//     //mensaje de agradecimiento por la compra vaciarCarrito/all
//     $this->eliminarItemController('all');
//     return redirect()->route('catalogoProductos');
// }