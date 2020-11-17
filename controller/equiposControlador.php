<?php 
    require_once './models/equiposModelo.php';

class equipos_controlador extends equipos_modelo{
    
    public function guardarEquipos(){
        if (isset($_POST)) {
            $equipos = new equipos_modelo();
            $equipos->setTipo($_POST['tipo']);
            $equipos->setFechaCompra($_POST['fecha']);
            $equipos->setMarca($_POST['marca']);
            $equipos->setArea($_POST['area']);
            $equipos->setPrecio($_POST['precio']);    
            
            $res = $equipos->registrarEquipo();
            if ($res) {
                echo "<script>
                    swal('Registro Completado!', 'Tarea realizada satisfactoriamente!', 'success');
                      </script>";
            } else{
                echo 'Ocurrio un problema al ingresar';
            }
        }
    }

    public function buscarEquipoEspecifico(){
        if (isset($_POST)) {
            $opcion = $_POST['opciones'];
            
            $valor = $_POST['nombre'];
            
            if ($opcion == "Tipo") {
                
                $opcionTipo = $opcion;
                $datos = [
                    'select' => $opcionTipo,
                    'valor' => $valor
                ];
                $obj = new equipos_modelo();                
                $res = $obj->buscarEquipo($datos);
                
                return $res;
            } elseif ($opcion == "Marca") {
                
                $opcionMarca = $opcion;
                $datos = [
                    'select' => $opcionMarca,
                    'valor' => $valor
                ];
                $obj = new equipos_modelo();                
                $res = $obj->buscarEquipo($datos);
                
                return $res;
            }
        }
    }
    public function ListarTodosLosEquipos(){
        $empleados = new equipos_modelo();
        $res = $empleados->BuscarTodosEquipos();
        return $res;
    }

    public function ListaAreas(){
        $areas = new equipos_modelo();
        $res = $areas->buscarTodasLasAreas();
        return $res;
    }

    public function TodosEnNull(){
        $vacios = new equipos_modelo();
        $res = $vacios->buscarTodosenNULL();
        return $res;    
    }

    public function buscarSinMantenimiento(){
        if (isset($_POST['buscar'])) {
            $buscar = $_POST['buscar'];
            $obj = new equipos_modelo();
            $obj->setId($buscar);
            $result = $obj->buscarEquipoSinMantenimiento();
            return $result;
        }
    }

    public function ActualizarFechaEquipoMantenimiento(){
        if (isset($_POST['id']) && isset($_POST['fecha-asignada'])) {
            $equipos = new equipos_modelo();
            $equipos->setId($_POST['id']);
            $equipos->setFechaMantenimiento($_POST['fecha-asignada']);

            $res = $equipos->ActualizarFechaMantenimiento();
            if ($res) {
                echo "<script>
                    swal('Equipo actualizado!', 'Tarea realizada satisfactoriamente!', 'success');
                      </script>";
            } else{
                echo '<script>Ocurrio un problema al ingresar</script>';
            }
        }
    }
}