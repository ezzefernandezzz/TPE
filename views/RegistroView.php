<?php
include_once "libs/Smarty.class.php";

class RegistroView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    function showRegistro($error = ""){
        $this->smarty->assign('loggeado', " ");
        $this->smarty->assign('username', " ");
        $this->smarty->assign('titulo', 'Registrarse');
        $this->smarty->assign('action', 'confirmacionRegistro');
        $this->smarty->assign('nombreBoton', 'Crear cuenta');
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/login-registro.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

}