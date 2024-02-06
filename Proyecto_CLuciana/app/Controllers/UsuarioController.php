<?php
namespace App\Controllers;

use Config\Services;
use App\Models\ModelUsuario;
use App\Entities\User;

class UsuarioController extends BaseController
{
    protected $helpers = ['form','form_validation', 'session'];
    

    public function registrarCliente(){
        if (! $this->request->is('post')) {
            $titulo['titulo'] = 'Registrarse';
            return view('header').view('navbar').view('registro').view('footer');
        }

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'nombre' => 'required|alpha_space',
            'apellido' => 'required|alpha_space',
            'email' => 'required|valid_email|is_unique[usuarios.usuario_email]',
            'usuario' => 'required|alpha_dash',
            'contrasenia' => 'required|min_length[6]|max_length[20]',
            're-contrasenia' => 'required|matches[contrasenia]',
        ],
        [
            "nombre" => [
                "required" => 'Debe ingresar su nombre',
                "alpha_space" => 'No se permiten numeros'
            ],
            "apellido" => [
                "required" => 'Debe ingresar su apellido',
                "alpha_space" => 'No se permiten numeros'
            ],
            "email" => [
                "required" => 'Debe ingresar su correo electronico',
                "valid_email" => 'El email ingresado no es válido',
                "is_unique" => 'El email ingresado ya está registrado',
            ],
            "usuario" => [
                "required" => 'Debe ingresar un usuario',
            ],
            "contrasenia" => [
                "required" => 'Debe ingresar una contraseña',
                "min_length" => 'La contraseña debe contener al menos 10 caracteres'
            ],
            "re-contrasenia" => [
                "required" => 'Debe repetir la contraseña',
                "matches" => 'Las contraseñas no coinciden'
            ],
        ]);

        
            if (!$validation->withRequest($this->request)->run()) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->back()->withInput()->with('errors',$validation->getErrors());
            } else {
                $contrasenia = $request->getPost('contrasenia');
                $contrasenia_encriptada = password_hash($contrasenia, PASSWORD_BCRYPT);
              $data = [
                'usuario_nombre' => $request->getPost('nombre'),
                'usuario_apellido' => $request->getPost('apellido'),
                'usuario_email' => $request->getPost('email'),
                'usuario_usuario' => $request->getPost('usuario'),
                'usuario_contrasenia' => $contrasenia_encriptada,
                'perfil_id' => 2,
                'usuario_estado' => 'si'
              ];
              $model = model('ModelUsuario');
              $model->insert($data);
              return redirect()->route('registro_user')->with('success','Consulta enviada con exito');
              return redirect()->to('registro_user')->with('Msg','Registrado exitosamente.');
            }
            // if (!$validation->withRequest($this->request)->run()) {
               
            //     dd($validation->getErrors());
            // } else {
            //     echo "calidacion exitosa";
            // }
    }
    
    public function inicioSesion(){
        $data['titulo'] = 'Inicar sesion';
        return view('header').view('navbar').view('iniciarSesion').view('footer');
    }

    public function iniciarSesion(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $validation->setRules([
            'email' => 'required|valid_email',
            'contrasenia' => 'required|min_length[6]',
        ],
        [
            "email" => [
                "required" => 'El correo es obligatorio',
                "valid_email" => 'Este correo electrónico no existe',
            ],
            "contrasenia" => [
                "required" => 'La contraseña es obligatoria',
                'min_length' => 'Contraseña incorrecta'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        } else {
            $request = \Config\Services::request();
            $session = session();
           
            $userModel = model('ModelUsuario');
    
            $email = $request->getPost('email');
            $contrasenia = $request->getPost('contrasenia');
            $usuario = $userModel->where('usuario_email', $email)->first();
           
            if($usuario){
                
                $contrasenia_usuario = $usuario['usuario_contrasenia'];
                $contrasenia_verif = password_verify($contrasenia, $contrasenia_usuario);
                if($contrasenia_verif){
              
                    $data = [
                        'id' => $usuario['usuario_id'],
                        'nombre' => $usuario['usuario_nombre'],
                        'apellido' => $usuario['usuario_apellido'],
                        'perfil' => $usuario['perfil_id'],
                        'login' => TRUE
                    ];
                    
                    $session->set($data);
                   
                    switch(session('perfil')){
                        case '1':
                            return redirect()->route('homeAdmin');
                            break;
                        case '2':
                            return redirect()->route('/');
                            break;
                    }
                }else{
                    return redirect()->back()->withInput()->with('mensaje', 'Contraseña incorrecta');
                    //$session->setFlashdata('mensaje','Usuario y/o contraseña incorrecto');
                }
            }else{
                return redirect()->back()->withInput()->with('mensaje', 'Usuario incorrecto');
                //$session->setFlashdata('mensaje','Usuario y/o contraseña incorrecto');
            }
            
        //return redirect()->route('inicioSesion');
        }
    }

    public function cerrarSesion(){
        $session = session();
        $session->destroy();
        return redirect()->route('/');
    }
}
?>