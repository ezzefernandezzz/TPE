<?php
include_once "./models/UserModel.php";
include_once "./views/RegistroView.php";
include_once "./helpers/AuthHelper.php";
include_once "./views/LoginView.php";

class RegistroController {

    private $model;
    private $view;
    private $auth;
    private $viewLogin;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new RegistroView();
        $this->auth = new AuthHelper();
        $this->viewLogin = new LoginView();
    }

    function registrarse(){
        $this->view->showRegistro();
    }

    function enviarRegistro(){
        //Creo la cuenta cuando venga en el POST
        if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
            $userName=$_POST['usuario'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
            try {
                $this->model->guardarUser($userName, $userPassword);
                $rol = 0; //Cuando se registra nadie es admin
                $this->auth->login($userName, $rol);
                //$user->administrador
                $this->viewLogin->showHome();          
                //$this->view->showRegistro("Registrado exitosamente.");
            } catch (Exception $e) {
                $this->view->showRegistro("Nombre no disponible.");
            }
            
        }

    }
}