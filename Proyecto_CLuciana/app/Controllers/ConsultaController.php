<?php
namespace App\Controllers;
use Config\Services;
use App\Entities\User;

class ConsultaController extends BaseController
{
    public function registrarConsultaController(){
        

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $consultaModel = model ('ConsultaModel');
        $consultas = $consultaModel->obtenerConsulta();

        

        $validation->setRules([
            'nombre' => 'required|alpha_space|max_length[50]',
            'email' => 'required|valid_email|max_length[50]',
            'asunto' => 'max_length[50]',
            'consulta' => 'required|max_length[300]',
        ],
        [
            "nombre" => [
                "required" => 'El nombre es obligatorio',
                "alpha_space" => 'No se permiten numeros'
            ],
            "email" => [
                "required" => 'Un email es obligatorio',
                "valid_email" => 'email no valido',
                "max_length" => 'Se admiten hasta 50 caracteres'
            ],
            "asunto" => [
                "max_length" => 'Se admiten hasta 50 caracteres'
            ],
            "consulta" => [
                "required" => 'Escribir una consulta es obligatorio',
                "max_length" => 'Maximo número de caracteres alcanzado'
            ],
           
           
            
        ]);

            if (!$validation->withRequest($this->request)->run()) {
               session()->setFlashdata('errors', $validation->getErrors());
               return redirect()->back()->withInput()->with('consulta',$validation->getErrors());
            } else {
               
              $data = [
                'nombre' => $request->getPost('nombre'),
                'email' => $request->getPost('email'),
                'asunto' => $request->getPost('asunto'),
                'consulta' => $request->getPost('consulta'),
                
              ];
              $consultaModel->insert($data);
              
              return redirect()->route('consultaContacto')->with('success','Consulta enviada con exito');
            }
        }
        
        public function eliminarConsulta($id=null){
            $consultaModel= model ('ConsultaModel');
            $consultaModel->eliminarConsulta($id);
            return redirect()->to('consultas');
        }
}
       
 
?>