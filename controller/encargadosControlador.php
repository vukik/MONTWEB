<?php

    require_once './models/encargadosModelo.php';

    class encargados_controlador extends encargados_modelo{

        public function insertarEncargado(){
            if (isset($_POST)) {
                $insertar = new encargados_modelo();
                $password_segura = conexion::encryption($_POST['password']);
                $insertar->setNombre($_POST['name']);
                $insertar->setCorreo($_POST['email']);
                $insertar->setPassword($password_segura);
                
                //var_dump($insertar);
                $resultado = $insertar->InsertarEncargados();
                if ($resultado) {
                    echo "<script>
                        swal('Registro Completado!', 'Tarea realizada satisfactoriamente!', 'success');
                          </script>";
                } else{
                    echo 'Ocurrio un problema al ingresar';
                }
            }
        }

        public function ListarEmpleados(){
            $empleados = new encargados_modelo();
            $res = $empleados->ListarEncargados();
            return $res;
        }
    }