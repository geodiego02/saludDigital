<?php
//aquí cada modelo se va a llamar como el controlador más model, este viene del 
//controlador main, así que se llama mainmodel.php, porque el método CargarModelo()
//de la librería Controlador que se hereda a todos los controladores, incluido el 
//controlador main
    class MainModelo extends Modelo
    {

        public function __construct(){
            parent::__construct();
            $this->personas=[];
        }

        public function Insert($datos){
            //ahora para insertar se llama al objeto creado de la clase DataBase que
            //está en la carpeta Librería y que ya se instanció con nombre db 
            //en la super clase de modelo en la misma carpeta Librería
            $val=new Validar();
            $clave=$val->EncriptarClave($datos['password']);
            try{
                $query=$this->db->connect()->prepare(
                    'INSERT INTO usuario(rut_usu,mai_usu,pas_usu,rol_usu) VALUES(:rut,:correo,:pass,:rol)');
                $query->execute(['rut'=> $datos['rut'],'correo'=>$datos['correo'],'pass'=>$clave,'rol'=>$datos['rol']]);
                return true;
            }catch(PDOException $e){
                print_r('Error connection'.$e->getMessage());
                return false;
            }
            
        }

        public function ConsultarUsuario($rut)
        {
            //el rol que se recoje es lo que se envía desde el select de la página, es lo que se 
            //guarda en la tabla usuario y es el primary key de la tabla rol, por tanto tengo que 
            //cambiar el valor al obtener el id para que se refleje verdaderamente el rol del usuario
            $obtener=[];
            $i=0;
            $consulta=$this->db->connect()->prepare('SELECT rut_usu,pas_usu,rol_usu FROM usuario WHERE rut_usu= :rut');
            $consulta->execute(['rut'=>$rut]);
            $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $valor) {
                $obtener[$i]=(string)$valor['rut_usu'];
                $i++;
                $obtener[$i]=(string)$valor['pas_usu'];
                $i++;
                $obtener[$i]=(string)$valor['rol_usu'];
            }   
            return $obtener;
        }
    }
?>