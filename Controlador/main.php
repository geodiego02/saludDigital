<?php
    class Main extends Controlador{

        public function __construct(){
            parent::__construct();
            $this->vista->mensaje='';
            $this->vista->mensaje2='';
            $this->vista->rut='';
            $this->vista->correo='';
            $this->vista->rol='';
        }

        
        

        public function Render(){
            $this->vista->Render('main/index');
            
        }


        public function RegistrarUsuario()
        {
            //el modelo ya está instanciado así que se llama a $this->model para enviarle
            //los datos para registrar a la DB
            $mensaje=[];
            if(isset($_POST['registrar_usuario'])){
                $rut=$_POST['rut'];
                $correo=$_POST['correo'];
                $password=$_POST['pass'];
                $password2=$_POST['pass2'];
                $rol=$_POST['rol'];
                include_once 'Modelo/Validar.php';
                $validar=new Validar();
                $this->vista->rut=$rut;
                $this->vista->correo=$correo;
                $this->vista->rol=$rol;
                if($validar->CampoVacio($rut)===false || 
                    $validar->CampoVacio($correo)===false || 
                    $validar->CampoVacio($password)===false || 
                    $validar->CampoVacio($password2)===false ||
                    $validar->CampoVacio($rol)===false) 
                    {
                    array_push($mensaje,'Los campos son obligatorios.') ;
                }else{
                    if($password2===$password){
                        if($this->model->Insert(['rut' => $rut,'correo'=>$correo,'password'=>$password,'rol'=>$rol])){
                            array_push($mensaje,'Usuario registrado correctamente.<br>
                            Ahora puede iniciar sesión'); 
                            $this->rut='';
                            $this->correo='';
                            $this->rol='';
                        }else{
                            array_push($mensaje,'Usuario ya se encuentra registrado.');
                        }
                    }else{
                        array_push($mensaje,'El password no coincide con su repetición.');
                    }
                }
            }
            $this->vista->mensaje=$mensaje;
           $this->Render();
        }

        public function IniciarSesion()
        {
            include_once "Controlador/sesiones.php";
            $user=new Sesiones();
            if(!isset($_SESSION['rut']))
            {
                $this->vista->mensaje2='';
                if(isset($_POST['botonSesion']))
                {
                    include_once 'Modelo/Validar.php';
                    $validar=new Validar();
                    $usu=$_POST['usuario'];
                    $pass=$_POST['pass'];
                    if($validar->CampoVacio($usu)===false || $validar->CampoVacio($pass)===false){
                        $this->vista->mensaje2='Los campos son obligatorios';
                        $this->vista->Render('main/index');
                    }else
                    {
                        $resultado=$this->model->ConsultarUsuario($usu);
                        if($resultado!=null)
                        {
                            $passDB=$resultado[1];
                            $resul=$validar->VerificarClave($pass,$passDB);
                            if($resul)
                            {
                             
                                $user->SetUser($resultado[0]);
                                $idRol=$resultado[2];
                                if($idRol==1){
                                    $user->SetRol('3');
                                    $rol='3';
                                }else if($idRol==2){
                                    $user->SetRol('5');
                                    $rol='5';
                                }
                                if($rol==3){
                                    include_once "Controlador/paciente.php";
                                    $px=new Paciente();
                                    $px->Render();
                                    
                                }else if($rol==5){
                                    include_once "Controlador/profesionalSalud.php";
                                    $pro=new ProfesionalSalud();
                                    $pro->Render();
                                }
                            }else{
                                $this->vista->mensaje2='Usuario o clave incorrecta';
                                $this->vista->Render('main/index');
                            }
                        }else{
                            $this->vista->mensaje2='Usuario o clave incorrecta<br>';
                            $this->vista->Render('main/index');
                            
                        }
                    } 
                }else{
                    $this->vista->Render('main/index');
                }
            }else{
                if($_SESSION['rol']==3){
                    include_once "Controlador/paciente.php";
                    $px=new Paciente();
                    $px->Render();
                }else if($_SESSION['rol']==5){
                    include_once "Controlador/profesionalSalud.php";
                    $pro=new ProfesionalSalud();
                    $pro->Render();
                }else{
                    $this->vista->Render('main/index');
                }
            }
        }
    }
?>