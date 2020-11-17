<?php
    class vistas_Modelo{
        protected function obtener_vistas_modelo($vistas){
            $listaBlanca = ['consultar', 'encargados', 'mantenimientos', 'modificar', 'registrar', 'reporte'];
            if (in_array($vistas, $listaBlanca)) {
                if (is_file("./views/contenidos/".$vistas."-view.php")) {
                    $contenido = "./views/contenidos/".$vistas."-view.php";
                } else {
                    $contenido = "login";
                }
            } else if($vistas == "login"){
                $contenido = "login";
            } else if($vistas == "index"){
                $contenido = "login";
            } else {
                $contenido = "login";
            }
            return $contenido;
        }
  }
    
