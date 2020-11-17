<?php
    require_once './config/database.php';
    
    class sesion_modelo extends conexion{

        private $correo;
        private $pass;


        public function getCorreo()
        {
                return $this->correo;
        }

        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }


        public function getPass()
        {
                return $this->pass;
        }

        public function setPass($pass)
        {
                $this->pass = $pass;

                return $this;
        }

        protected function iniciarSesionModelo($datos){
        $sql = conexion::connect()->prepare("SELECT * FROM Empleado WHERE Correo=:email AND Password=:pass");
        $sql->bindParam(":email", $datos['email']);
        $sql->bindParam(":pass", $datos['password']);
        echo 'vardump de la consulta en DB';
        var_dump($sql->execute());
        return $sql;
        }
    }