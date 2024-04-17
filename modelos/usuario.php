<?php
    class Usuario{
        //atributo
        public $conexion;

        //constructor
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //Metodos
        public function consulta (){
            $con = "SELECT u.*, r.nombre_rol AS rol FROM usuario u
            INNER JOIN rol r ON u.foidrol = r.id_rol
            ORDER BY u.nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }
        
        public function eliminar($id){
            $del = "DELETE from usuario WHERE id_usuario = $id";
            mysqli_query($this->conexion, $del);
            $vec=[];

            $vec['resultado']= "OK";
            $vec['mensaje'] = "El Usuario ha sido eliminado";
            return $vec;
        }

        public function insertar($params){

            $ins = "INSERT INTO usuario(nombre, cedula, telefono, direccion, correo, password, foidrol) VALUES ('$params->nombre','$params->cedula','$params->telefono','$params->direccion','$params->correo',sha1('$params->password'),$params->foidrol)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado']= "OK";
            $vec['mensaje'] = "El Usuario ha sido guardado";
            return $vec;
        }

        public function editar($id,$params){
            $editar = "UPDATE usuario SET nombre='$params->nombre',cedula='$params->cedula',telefono = '$params->telefono',direccion='$params->direccion',correo='$params->correo',sha1(password ='$params->password'),
            foidrol=$params->foidrol
            WHERE id_usuario = $id";
            mysqli_query($this->conexion, $editar);
            $vec= [];
            $vec['resultado']= "OK";
            $vec['mensaje'] = "El usuario ha sido editado";
            return $vec;

        }   

        public function filtro($valor){
            $filtro = "SELECT * FROM usuario WHERE id_usuario LIKE '%$valor%'";
            $res =  mysqli_query($this->conexion, $filtro);
            $vec=[];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }



    }
?>