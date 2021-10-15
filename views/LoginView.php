<?php
include_once "libs/Smarty.class.php";

class LoginView{

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    function showLogin($error = ""){
        $this->smarty->assign("loggeado","");
        $this->smarty->assign("userName","");
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('action', 'verify');
        $this->smarty->assign('nombreBoton', 'Iniciar Sesion');
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/login-registro.tpl');
    }

    function showHome(){
        header("Location: ".BASE_URL."home");
    }

}