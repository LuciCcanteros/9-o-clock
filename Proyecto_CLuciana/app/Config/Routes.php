<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('Home');
$routes->get('quieneSomos', 'quieneSomos::index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::homeMetodo');

//Sobre la empresa
$routes->get('somos', 'Home::quieneSomosMetodo');
$routes->get('metodosDePago', 'Home::metodosPYEMetodo');
$routes->get('terminosYUsos', 'Home::terYUsosMetodo');
$routes->get('contactanos', 'Home::contactanosMetodo');
$routes->get('consultaContacto', 'Home::consultaMetodo');
$routes->get('catalogoProductos', 'Home::productosMetodo');


//Inicio de sesion, consultas y registro
$routes->get('registro_user', 'UsuarioController::registrarCliente');
$routes->post('registro_user', 'UsuarioController::registrarCliente');

$routes->get('inicioSesion','UsuarioController::inicioSesion');
$routes->get('cerrarSesion','UsuarioController::cerrarSesion');
$routes->post('inicioSesion','UsuarioController::iniciarSesion');

$routes->post('registrarConsulta', 'ConsultaController::registrarConsultaController');

//  ADMIN
    $routes->get('homeAdmin','AdminController::inicioAdmin');

    //gestion productos
    $routes->get('agregarProducto','AdminController::agregarProductoAdmin');
    $routes->get('gestionar', 'AdminController::gestionarProductosAdmin');
    $routes->get('editar/(:num)', 'AdminController::editarProductosAdmin/$1');
    $routes->get('activar/(:num)', 'AdminController::activarProductosAdmin/$1');
    $routes->get('eliminar/(:num)', 'AdminController::eliminarProductosAdmin/$1');
    //$routes->get('ocultarVer/(:num)', 'AdminController::ocultarVerProductos/$1');
    $routes->post('actualizar', 'AdminController::actualizarProductoAdmin');
    $routes->post('insertarProducto', 'AdminController::registrarProductoAdmin');

    //Usuarios
    $routes->get('gestionarUsuarios', 'GentionUsuariosController::gestionarUsuariosAdmin');
    $routes->get('cambiarEstado/(:any)', 'GentionUsuariosController::cambiarEstadoUsuario/$1');

    //listas
    $routes->get('producto','AdminController::listarProductosAdmin');
    $routes->get('listarConsultas','AdminController::verConsultas');
    $routes->get('listarVentas','AdminController::listarVentas');
    $routes->get('verUsuarios','AdminController::listarUsuariosController');
    $routes->get('detalleVenta/(:num)','VentaController::listarDetalleVentasController/$1');
 
//carrito
$routes->get('verCarrito', 'CarritoController::verCarritoController');
$routes->get('agregarCarrito', 'CarritoController::agregarCarritoController');
$routes->get('eliminarItem/(:any)', 'CarritoController::eliminarItemController/$1');
$routes->get('vaciarCarrito/(:any)', 'CarritoController::eliminarItemController/$1');

$routes->post('agregarCarrito', 'CarritoController::agregarCarritoController');

//ventas
$routes->get('ventaRegistrada', 'CarritoController::guardarVentaController');
$routes->post('agregarCarrito', 'CarritoController::agregarCarritoController');

$routes->get('verVentas', 'VentaController::listarVentas');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
