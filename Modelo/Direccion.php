<?php

include_once "Pais.php";
include_once "Region.php";
include_once "Ciudad.php";
    class Direccion{
        private $calle;
        private $numero;
        private $idUsuario;


        //constructor
        public function __construct($id){
            $this->idUsuario=$id;
        }


    }
?>