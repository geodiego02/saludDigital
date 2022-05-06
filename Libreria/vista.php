<?php
    class Vista{

        public function __construct(){
        }

        public function Render($nombre){
            include 'Vista/' . $nombre . '.php';
        }
    }
?>