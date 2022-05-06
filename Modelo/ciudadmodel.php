<?php
    class CiudadModelo extends Modelo{
        private $nombre_comuna;

        //constructor
        public function __construct(){
            parent::__construct();
        }

        //este método es solo por mientras
        public function GetCiudades(){
            $resultado=[];
            $resul=$this->db->connect()->query('SELECT * FROM ciudad');
            $i=1;
            while($row=$resul->fetch(PDO::FETCH_NUM)){
                array_push($resultado,$row[$i]);
            }
            return $resultado;
        }

        public function ObtenerId($ciudad){
            $id='';
            try{
                $resultado=$this->db->connect()->query("SELECT * FROM ciudad WHERE nom_ciu='" . $ciudad. "'");
                foreach($resultado as $valor){
                    $id=$valor['id_ciu'];
                    return $id;
                }
                
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }
    }
?>