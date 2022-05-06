<?php
    class Paciente extends Controlador{

        public function __construct(){
            parent::__construct();
            $this->vista->profesionales=[];
            $this->vista->mensaje='';
            $this->vista->idProfesional='';
            $this->vista->arreglo=[];
        }

        public function Render(){
            $this->vista->Render('pacientes/index');
        }

        public function IngresoPaciente(){
            include 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if($sesion->GetUser()){
                if($sesion->GetRol()==3){
                    $this->vista->Render('pacientes/index');
                }else{
                    $this->vista->Render('main/index');
                }
            }else{
                $this->vista->Render('main/index');
            }
        }

        public function ConsultarProfesionalesPorCiudad(){
            
            if(isset($_POST['btn-profesionales-ciudad'])){
                include_once 'Modelo/profesionalmodel.php';
                $pro=new ProfesionalModelo();
                $ciudad=$_POST['ciudad'];
                $this->vista->profesionales=$pro->FiltrarPorCiudad($ciudad);
            }
            $this->vista->Render('pacientes/profPublic');
        }

        public function ReservarHora($id){
            $this->vista->mensaje='';
            if($this->ValidarSesion()===false){
                $this->vista->mensaje='Debe registrarse como paciente para poder reservar atención profesional';
                $this->vista->Render('pacientes/profPublic');
            }else{
                $this->vista->idProfesional=$id;
                $this->vista->Render('pacientes/horasProfesional');
            }
            
        }

        public function ValidarSesion(){
            include_once 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if($sesion->GetUser()!=null){
                return true;
            }else{
                return false;
            }
        }

        public function ConsultarHorasDiaId($id){
            if(isset($_POST['buscar'])){
                $id_pro=$id;
                include_once 'Modelo/agendamodel.php';
                $agenda=new AgendaModelo();
                $fecha=$_POST['fecha'];
                $this->vista->arreglo=$agenda->ConsultarHorasDiaId($id_pro,$fecha);
                $this->vista->Render('pacientes/horasProfesionalTotal');
            }else{
                echo 'no rendericé';
            }
            


        }
    }
?>