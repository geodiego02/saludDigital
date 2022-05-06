<?php
    class ProfesionalSalud extends Controlador{

        public function __construct(){
            parent::__construct();
            $this->vista->ciudades=[];
            $this->vista->ciudadElegida='';
            $this->vista->regionElegida='';
            $this->vista->paisElegido='';
            $this->vista->mensaje='';
            $this->vista->mensaje2='';
        }

        public function Render(){
            $this->vista->Render('profesionalesSalud/index');
        }

        public function RenderIndex(){
            $this->vista->Render('main/index.php');
        }

        public function IngresoProfesional(){
            include_once 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if(isset($_SESSION['rut'])){
                if($sesion->GetRol()==5){
                    $this->vista->Render('profesionalesSalud/index');
                }else{
                    $this->vista->Render('main/index');
                }
            }else{
                $this->vista->Render('main/index');
            }
        }

        public function VerOpciones(){
            include_once 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if($sesion->GetUser()!=null){
                //usuario verificado
                $this->vista->Render('profesionalesSalud/usuario');
            }else{
                $this->Render();
            }
            
        }

        public function IngresarInformacionProfesional(){
            if($this->ValidarSesion()){
                $this->CargarSelectFormulario();
                $this->vista->Render('profesionalesSalud\ingresarInformacion');
            }else{
                $this->vista->Render('main/index');
            }
                    
                
        }

        public function ModificarInformacion(){
            if($this->ValidarSesion()){
                $this->vista->Render('profesionalesSalud\modificarInformacion');
            }else{
                $this->vista->Render('main/index');
            }
        }

        public function VerInfo(){
            if($this->ValidarSesion()){
                $this->vista->Render('profesionalesSalud\verInfo');
            }else{
                $this->vista->Render('main/index');
            }
        }

        public function HorasDisponibles(){
            if($this->ValidarSesion()){
                $this->vista->Render('profesionalesSalud\horasDisponibles');
            }else{
                $this->vista->Render('main/index');
            }
        }

        public function VerReservas(){
            if($this->ValidarSesion()){
                $this->vista->Render('profesionalesSalud\verReservas');
            }else{
                $this->vista->Render('main/index');
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

        /*public function RegistrarDatos(){
            //aquí debo asignar la ciudad escogida a la variable de esta 
            //clase para permanecer los datos en la interfaz
            $mensaje='';
            $datos=[];
            include_once 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if(isset($_POST['btn_registrar']))
            {
                if($sesion->GetUser()!=null)
                {
                    $nombre=$_POST['nombre'];
                    $apaterno=$_POST['apaterno'];
                    $amaterno=$_POST['amaterno'];
                    $fnacimiento=$_POST['fnacimiento'];
                    $pais=$_POST['pais'];
                    $region=$_POST['region'];
                    $ciudad=$_POST['ciudad'];
                    $calle=$_POST['calle'];
                    $num_dep=$_POST['num_dep'];
                    $fono=$_POST['tel'];
                    $titulo=$_POST['titulo_profesional'];
                    $especialidad=$_POST['especialidad'];
                    $registro_salud=$_POST['registro_salud'];
                    include_once 'Modelo/Validar.php';
                    $validar=new Validar();
                    if($validar->CampoVacio($nombre)===false || 
                        $validar->CampoVacio($apaterno)===false || 
                        $validar->CampoVacio($amaterno)===false || 
                        $validar->CampoVacio($region)===false ||
                        $validar->CampoVacio($ciudad)===false ||
                        $validar->CampoVacio($titulo)===false ||
                        $validar->CampoVacio($especialidad)===false ||
                        $validar->CampoVacio($pais)===false) 
                    {
                        $mensaje='Falta llenar los campos obligatorios o estan mal ingresados.';
                        $this->CargarSelectFormulario();
                    }else{
                        //me falta validar en fono no más
                        if($validar->CampoVacio($fono)){
                            if($validar->CampoNumero($fono)===false){
                                $mensaje='El teléfono solo puede contener números.';
                                $this->CargarSelectFormulario();
                            }
                        }
                        $rut=$sesion->GetUser();
                        //*************cuidado siempre con la instanciación del model 
                        include_once 'Modelo/profesionalmodel.php';
                        $je=new ProfesionalModelo();
                        //solución: ahora que se el error, puedo usar el objeto $je y llenar los 
                        //atributos con los datos del formulario en vez de pasar todo por un arreglo.
                        //si no se puede, entonces dividir el formulario en partes para que sea más 
                        //facil y poder avanzar
                        if($resul){
                            $this->vista->mensaje='Información almacenada con éxito';
                            $this->vista->Render('profesionalesSalud/index');
                        }else{
                            $this->vista->mensaje='No fue posible almacenar la información';
                            $this->vista->Render('profesionalesSalud/ingresarInformacion');
                        }

                        ['rut'=>$rut,'nombre'=> $nombre,'apaterno'=>$apaterno,
                            'amaterno'=>$amaterno,'fnacimiento'=>$fnacimiento,'fono'=>$fono,'titulo'=>$titulo,
                            'especialidad'=>$especialidad,'pais'=>$pais,'region'=>$region,'ciudad'=>$ciudad,
                            'calle'=>$calle,'num_dep'=>$num_dep,'registro_salud'=>$registro_salud] 
                    }
                }else{
                    $this->vista->Render('main/index');
                } 
            }else{
            }
            $this->vista->mensaje=$mensaje;
            $this->vista->Render('profesionalesSalud/ingresarInformacion');
            
        }
        */

        public function RegistrarInformacion(){
            $mensaje='';
            $mensaje2='';
            $datos=[];
            include_once 'Controlador/sesiones.php';
            $sesion=new Sesiones();
            if(isset($_POST['btn_registrar']))
            {
                if($sesion->GetUser()!=null)
                {
                    $nombre=$_POST['nombre'];
                    $apaterno=$_POST['apaterno'];
                    $amaterno=$_POST['amaterno'];
                    $pais=$_POST['pais'];
                    $region=$_POST['region'];
                    $ciudad=$_POST['ciudad'];
                    $titulo=$_POST['titulo_profesional'];
                    $especialidad=$_POST['especialidad'];
                    include_once 'Modelo/Validar.php';
                    $validar=new Validar();
                    if($validar->CampoVacio($nombre)===false || 
                        $validar->CampoVacio($apaterno)===false || 
                        $validar->CampoVacio($amaterno)===false || 
                        $validar->CampoVacio($region)===false ||
                        $validar->CampoVacio($ciudad)===false ||
                        $validar->CampoVacio($titulo)===false ||
                        $validar->CampoVacio($especialidad)===false ||
                        $validar->CampoVacio($pais)===false) 
                    {
                        $mensaje='Falta llenar los campos obligatorios o estan mal ingresados.';
                        $this->CargarSelectFormulario();
                    }else{
                        /*
                        if($validar->CampoVacio($fono)){
                            if($validar->CampoNumero($fono)===false){
                                $mensaje='El teléfono solo puede contener números.';
                                $this->CargarSelectFormulario();
                            }
                        }*/
                        //***************falta obtener id de usuario y id de ciudad */
                        $rut=$sesion->GetUser();
                        include_once 'Modelo/ciudadmodel.php';
                        $ciudad_m=new CiudadModelo();
                        $id_ciudad=$ciudad_m->ObtenerId($ciudad);
                        include_once 'Modelo/profesionalmodel.php';
                        $pro=new ProfesionalModelo();
                        $resul=$pro->InsertarDatos([$rut,$nombre,$apaterno,$amaterno,$pais,$region,$id_ciudad,$titulo,$especialidad]);
                        if($resul){
                            $this->vista->mensaje2=$mensaje2='----------------Información almacenada con éxito';
                            $this->vista->Render('profesionalesSalud/index');
                            return false;
                        }else{
                            $mensaje='--------------------No fue posible almacenar la información';
                        }
                    }
                }else{
                    $mensaje='No fue posible validar el usuario';
                    $this->vista->Render('main/index');
                } 
            }else{
            }
            $this->vista->mensaje=$mensaje;
            $this->vista->Render('profesionalesSalud/ingresarInformacion');
        }


        //cuando se presiona mandar y devuelve mensaje de que falta un campo, los select
        //que traen datos de la base de datos no se recargar, eso hace este método para 
        //evitar dejar vacios los componentes del formulario
        public function CargarSelectFormulario(){
            //Este carga el formulario con name=inicial
            include_once 'Modelo/ciudadmodel.php';
            $ciudad=new CiudadModelo();
            $this->vista->ciudades=$ciudad->GetCiudades();
        }

        public function HoraDisponible(){
            $mensaje='';
            $mensaje2='';
            if($this->ValidarSesion()){

                if(isset($_POST['btn_hora_disponible'])){
                    $fecha=$_POST['fecha'];
                    $h_inicio=$_POST['h_inicio'];
                    $h_fin=$_POST['h_fin'];
                    //validar que se envíen los datos correctos
                    //include_once 'Modelo/validar.php';
                    //$val=new Validar();
                    //if($val->ValidarFechaEspanol($fecha)===false ||
                     //   $h_inicio===null || $h_fin===null){
                     //       $mensaje='debe seleccionar fecha y horas para verificar datos';
                    //}else{
                        include_once 'Controlador/sesiones.php';
                    $sesion=new Sesiones();
                    $rut=$sesion->GetUser();
                    //consultar disponibilidad
                    include_once 'Modelo/agendamodel.php';
                    $agenda=new AgendaModelo();
                    $r_agenda=$agenda->ConsultarHorario($rut);
                    
                    //determinar si alguna parte del registro ya está en la base de datos
                    date_default_timezone_set('UTC-4');
                    if($fecha>=date('Y-m-d')){
                        $resultado='';
                        foreach($r_agenda as $valor){
                            if($fecha==$valor){
                                $resultado=true;
                                break;
                            }else{
                                $resultado=false;
                            }
                        }
                        if($resultado===false){
                            //la día ingresado está libre entonces********************
                            if($this->GuardarHora($rut,$fecha,$h_inicio,$h_fin)){
                                $mensaje='La hora ingresada se ha almacenado con éxito 1.';
                            }
                        }else{
                            //ahora verificar si la hora ingresada está dentro del rango almacenado
                            //en la base de datos.
                            $resul=$agenda->ConsultarHorasDia($rut,$fecha);
                            //Extrallendo 2 arreglos:
                            $hora_inicio=$resul[0];
                            $hora_fin=$resul[1];
                            $cuenta=$resul[2];
                            if($cuenta>=3){
                                $this->vista->mensaje='Ya posee 3 franjas horarias para este día. No puede insertar más.';
                                $this->vista->Render('profesionalesSalud/horasDisponibles');
                                return false;
                            }
                            $diferencia1=$h_fin-$hora_fin[0];
                            $diferencia2=$h_fin-$hora_fin[1];
                            if(
                                ($h_inicio>$hora_inicio[0] && $h_fin<$hora_fin[0]) || 
                                ($h_inicio>$hora_inicio[1] && $h_fin<$hora_fin[1]) ||
                                $h_inicio.':00'==$hora_inicio[0] || $h_inicio.':00'==$hora_inicio[1] || 
                                $h_fin.':00'==$hora_fin[0] || $h_fin.':00'==$hora_fin[1] ||
                                ($h_inicio+$diferencia1)<$hora_fin[0] || 
                                ($h_inicio+$diferencia2)<$hora_fin[1]
                            ){
                                $this->vista->mensaje='La hora ingresada ya se encuentra disponible en la base de datos';
                                //***********************aquí renderizo a consultar la fecha */
                                $this->vista->Render('profesionalesSalud/horasDisponibles');
                                return false;
                            }else{
                                //la hora ingresada está libre entonces***********************
                                if($this->GuardarHora($rut,$fecha,$h_inicio,$h_fin)){
                                    $mensaje='La hora ingresada se ha almacenado con éxito 2.';
                                }
                                
                            }
                        }
                    }else{
                        $mensaje='Debe ingresar una fecha posterior para almacenar horas disponibles';
                        
                    }
                    //}
                    
                }
            }else{
            }
            $this->vista->mensaje=$mensaje;
            $this->vista->Render('profesionalesSalud/horasDisponibles');
        }

        public function GuardarHora($rut,$fecha,$h_inicio,$h_fin){

            //lo único pendiente es que la hora de inicio no se guardó

            $mensaje2='';
            include_once 'Modelo/agendamodel.php';
            $agenda=new AgendaModelo();
            $resultado=$agenda->RegistrarHorarioDisponible($rut,$fecha,$h_inicio,$h_fin);
            if($resultado){
                $mensaje2='Horas registradas con éxito';
                $this->vista->mensaje2=$mensaje2;
                return true;
            }
            return false;
        }

        public function ObtenerCiudades(){
            include_once 'Modelo/ciudadmodel.php';
            $ciudad=new CiudadModelo();
            return $ciudad->GetCiudades();
        }



    }
?>