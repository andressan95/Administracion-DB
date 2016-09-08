<?php

    class usuarios_modelo{

        private $db;
        private $usuario;
     
        public function __construct(){

            $this->db = Base::conexion();
            $this->usuario = array();
        }

        public function registrar($codigo, $nombres, $apellidos, $nacimiento, $sexo){

            $sql = $this->db->query("INSERT INTO usuarios (usu_codigo, usu_nombres, usu_apellidos, usu_nacimiento, usu_sexo)VALUES('$codigo', '$nombres', '$apellidos', '$nacimiento', '$sexo')");
            if($sql){
                return 1;
            }else{
                return 0;
            }
         
        }

        public function editar($codigo, $nombres, $apellidos, $nacimiento, $sexo){

            $sql = $this->db->query("UPDATE usuarios SET usu_nombres = '$nombres', usu_apellidos = '$apellidos', usu_nacimiento = '$nacimiento', usu_sexo = '$sexo' WHERE usu_codigo = '$codigo'");
            if($sql){
                return 1;
            }else{
                return 0;
            }
        }

        public function buscar($codigo){

            $sql = $this->db->query("SELECT * FROM usuarios WHERE usu_codigo = '$codigo' LIMIT 1");
            while($filas = $sql->fetch_array()){
                $this->usuario[]=$filas;
            }
            return $this->usuario;
        }
    }
?>
