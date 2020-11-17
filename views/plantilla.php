<?php
    require_once './controller/vistasControlador.php';
    $vt = new vistas_Controlador();
    $vistasR = $vt->obtener_vistas_controlador();
    if ($vistasR == "login"):
        require_once "./views/contenidos/login-view.php";
    else:
        session_start(['name'=>'el']);
        require_once './controller/sesionControlador.php';
        $lc = new sesion_controlador();
?>
<!--Inicio de la cabecera-->
    <?php   include 'layout/cabecera.php'; ?>
<!--fin de la cabecera-->
<!--Inicio de la barra lateral-->
    <?php   include 'layout/barlateral.php'; ?>
<!--fin de la barra lateral-->
<!--Contenido principal inicio-->
    <?php require_once $vistasR?>
<!--Contenido principal fin-->
<!--footer inicio-->
    <?php   include 'layout/footer.php'; ?>
<!--footer fin-->
<?php endif;?>
