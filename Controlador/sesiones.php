<?php
    class Sesiones extends Controlador{

        function __construct(){
            session_set_cookie_params(60*60*24);
            session_start();
            
        }
        
        public function SetUser($user){
            $_SESSION['rut']=$user;
        }

        public function GetUser(){
            return $_SESSION['rut'];
        }

        public function CerrarSesion(){
            session_unset();
            session_destroy();
            include_once 'Vista/main/index.php';
        }

        public function SetRol($rol){
            $_SESSION['rol']=$rol;
        }

        public function GetRol(){
            return $_SESSION['rol'];
        }
        
    }
?>