<?php 

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;

class VentaController extends BaseController{

    public function listarVentas(){
        $venta = new VentaModel();
        $data['title'] = 'Ventas';
        $data['ventas'] = $venta-> join('usuarios', 'usuarios.usuario_id = venta.usuario_id')->findAll();
        return view('header', $data).view('admin/navbarAdmin').view('admin/listarVentas', $data).view('footer');
    }

    public function listarDetalleVentasController($id=NULL){
        $ventas = model('VentaModel');
        $data['venta'] = $ventas->where('venta_id', $id)->first();
        $data['title']= "Detalle de ventas";

        return view('header', $data).view('admin/navbarAdmin').view('admin/detalleVenta').view('footer');
    }
}
