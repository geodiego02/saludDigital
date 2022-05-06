<?php
    class Controlador{

        function __construct(){
            $this->vista=new Vista();
            
        }

        public function CargarModelo($modelo){
            $url='Modelo/' . $modelo . 'model.php';
            if(file_exists($url)){
                include $url;
                $modelName=$modelo . 'Modelo';
                $this->model=new $modelName;
            }
        }

        public function EliminarVista($olo){
            unset($olo);
        }
    }
?>