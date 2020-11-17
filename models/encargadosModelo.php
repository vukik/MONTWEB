<?php
    require_once './config/database.php';

    class encargados_modelo extends conexion{

        private $id; 
        private $nombre; 
        private $rol;
        private $correo;
        private $password;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getRol()
        {
                return $this->rol;
        }

        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        public function getCorreo()
        {
                return $this->correo;
        }

        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
        protected function InsertarEncargados(){
                $sql = conexion::connect()->prepare("INSERT INTO Empleado(Nombre,Rol,Correo,Password)VALUES('{$this->getNombre()}', 'empleado', '{$this->getCorreo()}', '{$this->getPassword()}')");
                $save = $sql->execute();
                if ($save) {
                return true;
                } else {
                return false;        
                }
        }

        protected function ListarEncargados(){
               $sql = conexion::connect()->query("SELECT * FROM Empleado");
               $sql->execute();
               $resultado = $sql->fetchAll();
               return $resultado;
        }

        
    }   