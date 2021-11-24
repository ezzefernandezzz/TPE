<?php

require_once 'libs/Router.php';
require_once 'controllers/ApiComentarioController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentarioController', 'eliminarComentario');
$router->addRoute('comentarios/:ID/:PUNTAJE', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('comentarios/:ID/:ORDERBY/:ORDEN', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('comentarios', 'POST', 'ApiComentarioController', 'insertarComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);