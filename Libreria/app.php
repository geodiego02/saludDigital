<?php
    class App{

        function __construct(){
            
            ini_set('display_errors', 0);
            ini_set('display_startup_errors', 0);
            error_reporting(0);
            $url=isset($_GET['url']) ? $_GET['url']: null;
            $url=rtrim($url,'/');
            $url=explode('/',$url);

            if(empty($url[0])){
                $archivoControlador='Controlador/main.php';
                include_once $archivoControlador;
                $controlador=new Main();
                $controlador->Render();
                $controlador->CargarModelo('main');
                return false;
            }
            session_start();
            $archivoControlador='Controlador/' . $url[0] . '.php';

            //validar el controlador
            if(file_exists($archivoControlador))
            {
                include_once $archivoControlador;
                $controler=new $url[0];
                $controler->CargarModelo($url[0]);
                //número de elementos del arreglo
                $nparam=sizeof($url);
                //validar el método del controlador
                if($nparam>1){
                    if($nparam>2){
                        $controler->{$url[1]}($url[2]);
                    }else{
                        $controler->{$url[1]}();
                    }
                }else{
                    $controler->Render();
                    
                }
            }else{
                include_once 'Controlador/errores.php';
                $controlador=new Errores();
                $controlador->Render();
            }
        }
    }
?>