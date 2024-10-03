<?php 

require_once __DIR__ .'/config/__init.php';
require_once __DIR__ .'/router/index.php';
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}else{
    return "Error: no se encontró el autoload.";
}


$router =  new Router();
//Login
$router->get('/', 'login');
$router->post('/login', 'login');

$router->get('/dashboard', 'dashboard');

$router->get('/propietario', 'propietario');
$router->post('/propietario', 'propietario');

$router->get('/inmobiliaria', 'inmobiliaria');
$router->post('/inmobiliaria', 'inmobiliaria');

$router->get('/tasadia', 'tasadia');
$router->post('/tasadia', 'tasadia');

$router->get('/cuota', 'cuota');
$router->post('/cuota', 'cuota');



$router->get('/tipopago', 'tipopago');
$router->post('/tipopago', 'tipopago');

$router->get('/tipogasto', 'tipogasto');
$router->post('/tipogasto', 'tipogasto');

$router->get('/gastos', 'gastos');
$router->post('/gastos', 'gastos');

$router->get('/conversormoneda', 'conversormoneda');
$router->post('/conversormoneda', 'conversormoneda');

$router->error('/404', '404', 'error');

//Reporte
$router->get('/reporte', 'Reporte');
$router->post('/reporte', 'Reporte');

$router->post('/reporte-propietarios', 'Reporte1propietarios');
$router->post('/reporte-propietariostotal', 'Reporte1propietariostotal');
$router->post('/reporte-gastospormes', 'Reporte2gastos');
$router->post('/reporte-tasaspordia', 'Reporte3tasas');
$router->post('/reporte-tasasporfecha', 'Reporte3tasasfecha');
$router->post('/reporte-grafico', 'Reporte4cuotaimagen');
$router->post('/reporte-grafico2', 'Reporte5tipopagografica');


