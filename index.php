<?php
    include './config/general.php';
    require_once "./controller/vistasControlador.php";

    $plantilla = new vistas_Controlador();
    $plantilla->obtener_plantilla_controlador();

?>