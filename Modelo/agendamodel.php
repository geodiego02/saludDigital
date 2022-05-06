<?php
    class AgendaModelo extends Modelo{
        private $rut_profesional;
        private $dia_disponible;
        private $hora_disponible;

        //constructor
        public function __construct(){
            parent::__construct();
        }

        public function ConsultarHorario($rut){
            $id_usuario=$this->ObtenerId($rut);
            $id_profesional=$this->ObtenerIdProfesional($id_usuario);
            $id_agenda='';
            try {
                $agenda=[];
                $consulta=$this->db->connect()->query('SELECT * FROM agenda WHERE id_profesional='. $id_profesional);
                //$resul_consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                foreach($consulta as $valor){
                    $fecha=$valor['dia_disponible'];
                    //aquí el número de la columna va a depender del número de columnas que se pida en
                    //fetch y no el número de columna de la tabla
                    array_push($agenda,$fecha);   
                }
                return $agenda;
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

        public function RegistrarHorarioDisponible($rut,$fecha,$h_inicio,$h_fin){
            //en realidad tengo que relacionar a la agenda con el id del profesional, sino
            //no vale y borrar el id_agenda de la tabla profesional
            $id_usuario=$this->ObtenerId($rut);
            $id_profesional=$this->ObtenerIdProfesional($id_usuario);
            try {
                    $consulta=$this->db->connect()->query("INSERT INTO `agenda` (`id`,`dia_disponible`,`hora_inicio`,`hora_fin`,`id_profesional`,`estado`) VALUES(NULL,'".$fecha."','".$h_inicio."','".$h_fin."','".$id_profesional."','Libre')");
                return true;
            } catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }


        public function ObtenerIdProfesional($id_usuario){
            $id='';
            try{
                $resultado=$this->db->connect()->query("SELECT * FROM profesional WHERE id_usu='" . $id_usuario. "'");
                foreach($resultado as $valor){
                    $id=$valor['id'];
                    return $id;
                }
                
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }

        public function ConsultarHorasDia($rut,$fecha){
            $id_usuario=$this->ObtenerId($rut);
            $id_profesional=$this->ObtenerIdProfesional($id_usuario);
            try {
                $hora_inicio=[];
                $hora_fin=[];
                $consulta=$this->db->connect()->query("SELECT * FROM agenda WHERE id_profesional='". $id_profesional."' AND dia_disponible='". $fecha."'");
                $cuenta=0;
                foreach($consulta as $valor){
                    $h_inicio=$valor['hora_inicio'];
                    $h_fin=$valor['hora_fin'];
                    array_push($hora_inicio,$h_inicio);   
                    array_push($hora_fin,$h_fin);
                    $cuenta++;
                }
                return [$hora_inicio,$hora_fin,$cuenta];
            } catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }

        public function ConsultarHorasDiaId($id,$fecha){
            $id_profesional=$id;
            try {
                $hora_inicio=[];
                $hora_fin=[];
                $estado=[];
                $consulta=$this->db->connect()->query("SELECT * FROM agenda WHERE id_profesional='". $id_profesional."' AND dia_disponible='". $fecha."'");
                $cuenta=0;
                foreach($consulta as $valor){
                    $h_inicio=$valor['hora_inicio'];
                    $h_fin=$valor['hora_fin'];
                    $ee=$valor['estado'];
                    array_push($estado,$ee);
                    array_push($hora_inicio,$h_inicio);   
                    array_push($hora_fin,$h_fin);
                    $cuenta++;
                }
                return [$hora_inicio,$hora_fin,$cuenta,$estado];
            } catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
        }


    }
?>