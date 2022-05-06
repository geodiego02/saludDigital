<?php

    class ProfesionalModelo extends Modelo{
        private $rut,$clave,$nombre,$apellido_materno,$apellido_paterno,$dirección,$email,$nivel_educacional,
        $titulo_profesional,$especialidad,$estado_usuario;
        private $telefono;
        private $fecha_nacimiento,$fecha_registro;

        //constructor
        public function __construct(){
            parent::__construct();
        }

        public function InsertarDatos($datos){
            $pais='';
            $rut=$datos[0];
            echo '-----------------Aquí en la clase modelo, el rut es: '. $rut. '<br>';
            $id=$this->ObtenerId($rut);
            echo '----------------Aquí en la clase modelo, el id es: '. $id. '<br>';
            echo '----------------------------el país que se recibe es: '.$datos[4];
          
            try {
                $consulta=$this->db->connect()->prepare(
                    'INSERT INTO profesional(nombre_profesional,apellido_paterno_profesional,apellido_materno_profesional,titulo_profesional,especialidad_profesional,id_usu,pais_pro,reg_pro,ciu_pro) 
                    VALUES(:nom,:ap,:am,:tit,:esp,:id,:pais,:region,:ciu)');
                
                $consulta->execute(['nom'=> $datos[1],'ap'=>$datos[2],'am'=>$datos[3],'tit'=>$datos[7],'esp'=>$datos[8],'id'=>$id,'pais'=>$datos[4],'region'=>$datos[5],'ciu'=>$datos[6]]);
                
                return true;
            } catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }


   

        public function ObtenerId($rut){
            $id='';
            try{
                $resultado=$this->db->connect()->query("SELECT * FROM usuario WHERE rut_usu='" . $rut. "'");
                foreach($resultado as $valor){
                    $id=$valor['id_usu'];
                    return $id;
                }
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }

        public function FiltrarPorCiudad($ciudad){
            $id_ciudad=$this->ObtenerIdCiudad($ciudad);
            $pro=[];
            $coleccion=[];
            try{
                $resultado=$this->db->connect()->query("SELECT id,nombre_profesional,apellido_paterno_profesional,titulo_profesional,especialidad_profesional FROM profesional WHERE ciu_pro='" . $id_ciudad. "'");
                foreach($resultado as $valor){
                    $pro=[];
                    $id=$valor[0];
                    $nom=$valor[1];
                    $ape=$valor[2];
                    $tit=$valor[3];
                    $esp=$valor[4];
                    array_push($pro,$id,$nom,$ape,$tit,$esp);
                    array_push($coleccion,$pro);
                }
                return $coleccion;
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }

        public function ObtenerIdCiudad($ciudad){
            $id_ciudad='';
            try{
                $resultado=$this->db->connect()->query("SELECT * FROM ciudad WHERE nom_ciu='" . $ciudad. "'");
                foreach($resultado as $valor){
                    $id_ciudad=$valor['id_ciu'];
                    return $id_ciudad;
                }
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }
    }
?>