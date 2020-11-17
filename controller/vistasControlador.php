<?php
    require_once './models/vistasModelo.php';
    class vistas_Controlador extends vistas_Modelo{
    
        public function obtener_plantilla_controlador(){
            return require_once './views/plantilla.php';
        }

        public function obtener_vistas_controlador(){
            if (isset($_GET['views'])) {
                $ruta = explode("/",$_GET['views']);
                $respuesta = vistas_Modelo::obtener_vistas_modelo($ruta[0]);
            } else {
                $respuesta = "login";
            }
            return $respuesta;
        }
    }