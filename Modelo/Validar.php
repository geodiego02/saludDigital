<?php
    class Validar extends Modelo{

        public function __construct()
        {

        }

        public function RutChileno(){

        }

        //devuelve true si tiene algo, false si no hay nada
        public function CampoVacio($dato){
            if(!empty($dato)){
                //datos encontrados!!
                return true;
            }else{
                return false;
            }
        }

        public function CampoNumero($num){
            if(is_numeric($num)){
                return true;
            }else{
                return false;
            }
        }

        public function EncriptarClave($pass){
            return password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);
        }

        public function VerificarClave($pass,$pass2){
            if(password_verify($pass,$pass2)){
                return true;
            }else{
                return false;
            }
        }

        function ValidarFechaEspanol($fecha){
            $valores = explode('/', $fecha);
            if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
                return true;
            }
            return false;
        }
    }
?>