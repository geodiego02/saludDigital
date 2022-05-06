<?php
    class Ayuda extends Controlador{

        function __construct(){
            parent::__construct();
        }

        public function Render(){
            $this->vista->Render('ayuda/index');
            
        }
    }
?>