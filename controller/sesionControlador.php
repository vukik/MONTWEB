<?php

    require_once './models/sesionModelo.php';

    class sesion_controlador extends sesion_modelo{

        public function IniciarSesion(){
           $correo = $_POST['email'];
           $pass = conexion::encryption($_POST['pass']);
           $datos = [
                'email' => $correo,
                'password' => $pass
            ];
            //no creo que tenga problemas
           $datosCuenta = sesion_modelo::iniciarSesionModelo($datos);
                $row = $datosCuenta->fetch();
                session_start(['name'=>'el']);
                $_SESSION['usuario_id'] = $row['ID_Empleado'];
                $_SESSION['usuario_name'] = $row['Nombre'];
                $_SESSION['usuario_email'] = $row['Correo'];
                
                if ($row['Rol'] == "admin") {
                    $url = serverURL."encargados/";
                } else{
                    $url = serverURL."login/";
                }

                return $urlLocation = '<script>window.location="'.$url.'"</script>';
            
        }

        public function cerrarSesion(){
            session_destroy();   
            return header("Location: ".serverURL."login/");     
        }
    }