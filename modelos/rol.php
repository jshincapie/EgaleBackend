<?php
    
    class Rol{
        //ATRIBUTO
        public $conexion;
        //METODO CONSTRUCTOR
        public function __construct ($conexion){
            $this->conexion = $conexion;
        }

        //METODOS
        public function consulta(){
            $con = "SELECT * FROM rol";
            $res = mysqli_query($this->conexion, $con);

            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;

        }


        public function eliminar($id){
            $del = "DELETE FROM rol WHERE id_rol = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] ="OK";
            $vec["mensaje"] = "El Rol ha sido eliminado";

            return $vec;
        }


        public function insertar($params){
            //echo print_r($params);
            $ins = "INSERT INTO rol(nombre_rol,descripcion_rol) VALUES ('$params->nombre_rol','$params->descripcion_rol')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] ="OK";
            $vec["mensaje"] = "El Rol ha sido agregado";

            return $vec;

        }


        public function editar($id, $params){
            $editar = "UPDATE rol SET nombre_rol = '$params->nombre_rol', descripcion_rol = '$params->descripcion_rol' WHERE id_rol = $id";
            mysqli_query($this->conexion, $editar);   
            $vec = [];
            $vec['resultado'] ="OK";
            $vec["mensaje"] = "El Rol ha sido editado ";

            return $vec;
        }

      

        public function filtro($valor){
            $filtro = "SELECT * FROM rol WHERE id_rol LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];

            
            while ($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
                
            }

            return $vec;

        }

    }




?>
