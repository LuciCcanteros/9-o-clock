<?php

namespace App\Controllers;
use App\Models\ProductosModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function principal()
    {
        return view('principal');
    }

    public function homeMetodo(){
        $data['tittle'] = "Home";
        echo view('header', $data);
        echo view('navbar');
        echo view('Home');
        echo view('footer');
    }

    public function metodosPYEMetodo(){
        $data['tittle'] = "Metodos de pago y envíos";
        echo view('header', $data);
        echo view('navbar');
        echo view('metodosPyE');
        echo view('footer');
    }

    public function quieneSomosMetodo(){
        $data['tittle'] = "Quienes Somos";
        echo view('header', $data);
        echo view('navbar');
        echo view('quieneSomos');
        echo view('footer');
    }

    public function terYUsosMetodo(){
        $data['tittle'] = "Terminos y Usos";
        echo view('header', $data);
        echo view('navbar');
        echo view('terYUsos');
        echo view('footer');
    }

    public function contactanosMetodo(){
        $data['tittle'] = "Contactanos";
        echo view('header', $data);
        echo view('navbar');
        echo view('contactanos');
        echo view('footer');
    }

    public function consultaMetodo(){
        $data['tittle'] = "Consulta";
        echo view('header', $data);
        echo view('navbar');
        echo view('consultaContacto');
        echo view('footer');
    }

    public function productosMetodo(){
        $producto_model= new ProductosModel();
        $data['producto'] = $producto_model->findAll();
        $data['tittle'] = "Productos";
        echo view('header', $data);
        echo view('navbar');
        echo view('productos');
        echo view('footer');
    }
}
