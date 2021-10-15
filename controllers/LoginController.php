<?php
include_once "./models/UserModel.php";
include_once "./views/LoginView.php";
include_once "./helpers/AuthHelper.php";

class LoginController {

    private $model;
    private $view;
    private $auth;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->auth = new AuthHelper();
    }

    function logout(){
        $this->auth->logout();
        $this->view->showLogin("Te deslogueaste!");
    }

    function login(){
        $this->view->showLogin();
    }

    function verifyLogin(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password']; 
     
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($usuario);

            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                $this->auth->login($user->nombreUsuario);                
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

}