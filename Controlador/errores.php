<?php
    class Errores extends Controlador{

        public function __construct(){
            parent::__construct();
        }

        public function Render(){
            $this->vista->Render('errores/index');
            
        }
    }
?>