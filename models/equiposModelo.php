<?php

    require_once './config/database.php';

    class equipos_modelo extends conexion{
        
        private $id;
        private $nombre;
        private $tipo;
        private $fechaCompra;
        private $marca;
        private $fechaMantenimiento;
        private $precio;
        private $fechaRenovacion;
        private $status;
        private $area;

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

        public function getTipo()
        {
                return $this->tipo;
        }

        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        public function getFechaCompra()
        {
                return $this->fechaCompra;
        }

        public function setFechaCompra($fechaCompra)
        {
                $this->fechaCompra = $fechaCompra;

                return $this;
        }

        public function getMarca()
        {
                return $this->marca;
        }

        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        public function getFechaMantenimiento()
        {
                return $this->fechaMantenimiento;
        }

        public function setFechaMantenimiento($fechaMantenimiento)
        {
                $this->fechaMantenimiento = $fechaMantenimiento;

                return $this;
        }

        public function getPrecio()
        {
                return $this->precio;
        }

        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        public function getFechaRenovacion()
        {
                return $this->fechaRenovacion;
        }

        public function setFechaRenovacion($fechaRenovacion)
        {
                $this->fechaRenovacion = $fechaRenovacion;

                return $this;
        }

        public function getStatus()
        {
                return $this->status;
        }

        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        public function getArea()
        {
                return $this->area;
        }

        public function setArea($area)
        {
                $this->area = $area;

                return $this;
        }

        protected function registrarEquipo(){
        $sql = conexion::connect()->prepare("INSERT INTO Equipo(Tipo, fec_Compra, Marca, ID_Area_Equipo, Precio)
        VALUES('{$this->getTipo()}', '{$this->getFechaCompra()}', '{$this->getMarca()}', '{$this->getArea()}', '{$this->getPrecio()}')");
        
        $resultado = $sql->execute();
        if ($resultado) {
          return true;
        } else {
          return false;      
        }
        }

        protected function buscarEquipo($datos){
                if ($datos['select'] == "Tipo") {
                        $sql = conexion::connect()->prepare("SELECT * FROM Equipo WHERE Tipo = :valor");
                        $sql->bindParam(":valor", $datos['valor']);
                        $sql->execute();
                        var_dump($resultado = $sql->fetchAll());
                        return $resultado;    
                } elseif($datos['select'] == "Marca"){
                        $sql = conexion::connect()->prepare("SELECT * FROM Equipo WHERE Marca = :valor");
                        $sql->bindParam(":valor", $datos['valor']);
                        $sql->execute();
                        $resultado = $sql->fetchAll();
                        return $resultado;    
                }
                         
        }

        public function BuscarTodosEquipos(){
                $sql = conexion::connect()->prepare("SELECT * FROM Equipo"); 
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }

        protected function buscarTodasLasAreas(){
                $sql = conexion::connect()->prepare("SELECT * FROM Area"); 
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }

        protected function buscarTodosenNULL(){
                $sql = conexion::connect()->prepare("SELECT * FROM Equipo WHERE Fec_Mantenimiento IS NULL"); 
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }

        protected function buscarEquipoSinMantenimiento(){
        $sql = conexion::connect()->prepare("SELECT * FROM Equipo WHERE ID_Equipo = '{$this->getId()}'"); 
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }

        protected function ActualizarFechaMantenimiento(){
                $sql = conexion::connect()->prepare("UPDATE Equipo SET Fec_Mantenimiento = '{$this->getFechaMantenimiento()}' WHERE ID_Equipo = {$this->getId()}");
                $resultado = $sql->execute();
                if ($resultado) {
                  return true;
                } else {
                  return false;      
                }
                }
    }