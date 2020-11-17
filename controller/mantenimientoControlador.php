<?php

    require_once './models/mantenimientoModelo.php';

    class mantenimiento_controlador extends mantenimiento_modelo{

        public function insertarMantenimientoUsuario(){
            if (isset($_POST['select-equipo']) && isset($_POST['select-empleado'])) {

                $insertar = new mantenimiento_modelo();
                $insertar->setId_empleado_mantenimiento($_POST['select-empleado']);
                $insertar->setId_equipo_mantenimiento($_POST['select-equipo']);
                //var_dump($insertar);
                $resultado = $insertar->InsertarMantenimientos();
                if ($resultado) {
                    echo "<script>
                        swal('Mantenimiento Completado!', 'Tarea realizada satisfactoriamente!', 'success');
                          </script>";
                } else{
                    echo '<script>alert("Ocurrio un problema al ingresar");</script>';
                }
            }
        }

        public function ListarTodosLosEquiposdelUsuario(){
            if (isset($_POST['select-empleado-terminar'])) {
                $equipos = new mantenimiento_modelo();
                $equipos->setId($_POST['select-empleado-terminar']);
                $res = $equipos->buscarEquiposDelUsuario();
                return $res;
            }
            
        }

        public function ActualizarEquiposATerminado(){
            if (isset($_POST['IdusuarioEncontrado']) && isset($_POST['EquipoSeleccionadoTerminado'])) {

                $actualizarTerminado = new mantenimiento_modelo();
                $actualizarTerminado->setId_empleado_mantenimiento($_POST['IdusuarioEncontrado']);
                $actualizarTerminado->setId_equipo_mantenimiento($_POST['EquipoSeleccionadoTerminado']);
                //var_dump($insertar);
                $resultado = $actualizarTerminado->ActualizarATerminado();
                if ($resultado) {
                    echo "<script>
                        swal('Mantenimiento actualizado!', 'Tarea realizada satisfactoriamente!', 'success');
                          </script>";
                } else{
                    echo '<script>alert("Ocurrio un problema al ingresar");</script>';
                }
            }
        }

        public function TerminadosEquiposdelUsuario(){
            if (isset($_POST['empleado-asignado'])) {

                $mantenimientosTerminados = new mantenimiento_modelo();
                $mantenimientosTerminados->setId_empleado_mantenimiento($_POST['empleado-asignado']);
                $res = $mantenimientosTerminados->ListarEquiposTerminadosPorUsuario();
                return $res;
            }
        }

        public function RevisionEquiposdelUsuario(){
            if (isset($_POST['empleado-asignado'])) {

                $mantenimientosrevision = new mantenimiento_modelo();
                $mantenimientosrevision->setId_empleado_mantenimiento($_POST['empleado-asignado']);
                $res = $mantenimientosrevision->ListarEquiposEnRevisioPorUsuario();
                return $res;
            }
            
        }

        public function TerminadosConteo(){
            if (isset($_POST['empleado-asignado'])) {

                $mantenimientosTerminados = new mantenimiento_modelo();
                $mantenimientosTerminados->setId_empleado_mantenimiento($_POST['empleado-asignado']);
                $res = count($mantenimientosTerminados->ListarEquiposTerminadosPorUsuario());
                return $res;
            }
        }

    }
