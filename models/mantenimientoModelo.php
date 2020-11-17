<?php
    require_once './config/database.php';

    class mantenimiento_modelo extends conexion{
    
        private $id; 
        private $id_empleado_mantenimiento; 
        private $id_equipo_mantenimiento;
        private $fecha_mantenimiento;
        private $estado;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getId_empleado_mantenimiento()
        {
                return $this->id_empleado_mantenimiento;
        }

      
        public function setId_empleado_mantenimiento($id_empleado_mantenimiento)
        {
                $this->id_empleado_mantenimiento = $id_empleado_mantenimiento;

                return $this;
        }

       
        public function getId_equipo_mantenimiento()
        {
                return $this->id_equipo_mantenimiento;
        }
 
        public function setId_equipo_mantenimiento($id_equipo_mantenimiento)
        {
                $this->id_equipo_mantenimiento = $id_equipo_mantenimiento;

                return $this;
        }


        public function getFecha_mantenimiento()
        {
                return $this->fecha_mantenimiento;
        }

        public function setFecha_mantenimiento($fecha_mantenimiento)
        {
                $this->fecha_mantenimiento = $fecha_mantenimiento;

                return $this;
        }
 
        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        protected function InsertarMantenimientos(){
            $sql = conexion::connect()->prepare("INSERT INTO Mantenimiento(ID_Empleado_Mantenimiento, ID_Equipo_Mantenimiento, Fecha_Mantenimiento, Estado)
            VALUES ({$this->getId_empleado_mantenimiento()}, {$this->getId_equipo_mantenimiento()}, 
            (SELECT CONVERT(DATE, GETDATE(), 1)), 'En revisión')");
            $save = $sql->execute();
            if ($save) {
            return true;
            } else {
                
            return false;        
            }
        }

        protected function buscarEquiposDelUsuario(){
        $sql = conexion::connect()->prepare("SELECT * FROM Equipo WHERE ID_Equipo IN (SELECT ID_Equipo_Mantenimiento 
        FROM Mantenimiento WHERE ID_Empleado_Mantenimiento = (SELECT ID_Empleado FROM Empleado WHERE ID_Empleado = '{$this->getId()}') AND Estado = 'En revisión')"); 
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;
        }

        protected function ActualizarATerminado(){
                $sql = conexion::connect()->prepare("UPDATE Mantenimiento 
                SET Fecha_Mantenimiento = (SELECT CONVERT(DATE, GETDATE(), 1)), Estado = 'Terminado' 
                WHERE ID_Empleado_Mantenimiento = '{$this->getId_empleado_mantenimiento()}' AND ID_Equipo_Mantenimiento = '{$this->getId_equipo_mantenimiento()}' AND Estado = 'En revisión';");
                $save = $sql->execute();
                
                if ($save) {
                return true;
                } else {
                return false;        
                }
            }
        
            protected function ListarEquiposTerminadosPorUsuario(){
                $sql = conexion::connect()->query("SELECT * FROM Equipo WHERE ID_Equipo IN (SELECT ID_Equipo_Mantenimiento FROM Mantenimiento WHERE ID_Empleado_Mantenimiento = '{$this->getId_empleado_mantenimiento()}' AND Estado = 'Terminado')");
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }
        protected function ListarEquiposEnRevisioPorUsuario(){
                $sql = conexion::connect()->query("SELECT * FROM Equipo WHERE ID_Equipo IN (SELECT ID_Equipo_Mantenimiento FROM Mantenimiento WHERE ID_Empleado_Mantenimiento = '{$this->getId_empleado_mantenimiento()}' AND Estado = 'En Revisión')");
                $sql->execute();
                $resultado = $sql->fetchAll();
                return $resultado;
        }
        
    }