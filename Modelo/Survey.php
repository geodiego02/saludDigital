<?php
    include_once 'Libreria/modelo.php';
    class Survey extends Modelo{
        
        public function __construct(){
            parent::__construct();
        }


        //consultar toda la tabla
    public function ConsultarTabla($nom_tabla){
        //ejecutar el método connect de la clase DB directamente ya que se heredan los métodos
        
        return $this->db->connect()->query('SELECT * FROM ' . $nom_tabla);
        
    }

    //Eliminar registro en una tabla de acuerdo a un id. Todavía no sé qué es lo que se devuelve.
    public function EliminarRegistro($id,$nom_tabla){
        return $this->db->connect()->query('DELETE FROM ' . $nom_tabla . ' WHERE id=' . $id);
    }

    }

    
?>