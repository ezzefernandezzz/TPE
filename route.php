<?php

include_once "libs/Smarty.class.php";
include_once "controllers/ContenidoController.php";
include_once "controllers/LoginController.php";
include_once "controllers/RegistroController.php";
include_once "controllers/AdminController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$contenidoController = new ContenidoController();
$generoController = new ContenidoController();
$loginController = new LoginController();
$registroController = new RegistroController();
$adminController = new AdminController();


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'login': 
        $loginController->login(); 
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'verify': 
        $loginController->verifyLogin(); 
        break;
    case 'registrarse':
        $registroController->registrarse();
        break;
    case 'confirmacionRegistro': 
        $registroController->enviarRegistro(); 
        break;
    case 'home':
        $contenidoController->showHome();
        break;
    case 'contenido':
        $parametro = null;
        if (isset($params[1]))
            $parametro = $params[1];
        $contenidoController-> cargarContenidoEspecifico($parametro);
        break;
    case 'filtrarContenido':
        $contenidoController-> cargarContenidoFiltrado();
        break;
    case 'genero':
        $contenidoController-> cargarContenidoGenero($params[1]);
        break;
    case 'generos':
        $contenidoController-> cargarGeneros();
        break;
    case 'adminContenido':
        $adminController -> adminListaContenido();
        break;
    case 'adminUsuarios':
        $adminController -> adminListaUsuarios();
        break;
    case 'actualizarUsuario':
        $adminController -> modificarRolUsuario($params[1]);
        break;
    case 'eliminarUsuario':
        $adminController -> eliminarUsuario($params[1]);
        break;
    case 'agregar':
        $adminController-> agregarContenido();
        break;
    case 'agregarGenero':
        $adminController-> agregarGenero();
        break;
    case 'agregarGeneroDB':
        $adminController-> enviarNuevoGenero();
        break;
    case 'agregarContenido':
        $adminController-> enviarNuevoContenido();
        break;
    case 'eliminar':
        $adminController-> eliminarContenido($params[1]);
        break;
    case 'editar':
        $adminController-> editarContenido($params[1]);
        break;
    case 'eliminarGenero':
        $adminController-> eliminarGenero($params[1]);
        break;
    case 'editarGenero':
        $adminController-> editarGenero($params[1]);
        break;
    case 'enviarModificaciones':
        $adminController-> enviarModificaciones($params[1]);
        break;
    case "generoModificado":
        $adminController-> enviarModificacionGenero($params[1]);
        break;
    default: 
        echo('404 - Page not found.'); 
        break;
}
