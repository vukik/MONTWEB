<?php 
  include_once './controller/encargadosControlador.php';
  include_once './controller/equiposControlador.php';
  include_once './controller/mantenimientoControlador.php';
?>
<div class="col-md-9">
    <main class="principal">
    <h4>Diseñar mantenimintos</h4>
    <p>Escoga una opcion</p>
    <form action="" method="post">
          <div class="form-group">
          <select class="form-control" name="select-opcion">
              <option value="empezar">Empezar un mantenimiento</>
              <option value="terminar">Terminar un mantenimiento</option>
          </select>
          </div>  
          <button type="submit" class="btn btn-success">Ejecutar accion</button>
    </form>
    <?php 
      if (isset($_POST['select-opcion'])) {
          $var = $_POST['select-opcion'];
          if ($var == "empezar") { ?>

                <form action="" method="POST" style="padding-top: 20px;">
                  <h4>Empezar un mantenimiento</h4>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">seleccione un empleado de mantenimiento.</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="select-empleado">
                      <?php $obj = new encargados_controlador(); 
                        $result  = $obj->ListarEmpleados();
                        foreach ($result as $row) {?>
                      <option value="<?=$row['ID_Empleado']?>"><?=$row['Nombre']?></option>
                        <?php }?>
                    </select>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Seleccione un equipo</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="select-equipo">
                    <?php $objeto = new equipos_controlador(); 
                        $result  = $objeto->ListarTodosLosEquipos();
                        foreach ($result as $row) {?>
                      <option value="<?=$row['ID_Equipo']?>">Tipo: <?=$row['Tipo']?> | Marca: <?=$row['Marca']?> | FechaCompra: <?=$row['Fec_Compra']?> </option>
                        <?php }?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Empezar">
                </form>            
          <?php } elseif ($var == "terminar"){ ?>

              <form action="" method="POST" style="padding-top: 20px;">
                    <h4>Terminar un mantenimiento</h4>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">seleccione un empleado de mantenimiento.</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="select-empleado-terminar">
                      <?php $obj = new encargados_controlador(); 
                        $result  = $obj->ListarEmpleados();
                        foreach ($result as $row) {?>
                          <option value="<?=$row['ID_Empleado']?>"><?=$row['Nombre']?></option>
                        <?php }?>
                      </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="buscar equipo">
                  </form>
        <?php }
      } ?>
      <?php 
          if (isset($_POST['select-empleado']) && isset($_POST['select-equipo'])) {
              $mantenimiento = new mantenimiento_controlador();
              $mantenimiento->insertarMantenimientoUsuario();
            } else if (isset($_POST['select-empleado-terminar'])) {
                  $IDusuario = $_POST['select-empleado-terminar']; ?>  

                  <form action="" method="post" style="padding-top: 20px;">
                    <h4>Datos encontrados del usuario</h4>
                      <input type="text" name="IdusuarioEncontrado" value="<?=$IDusuario?>">
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Seleccione el equipo terminado</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="EquipoSeleccionadoTerminado">
                      <?php 
                      $equiposEmpleado = new mantenimiento_controlador();
                      $re = $equiposEmpleado->ListarTodosLosEquiposdelUsuario();
                      foreach ($re as $key) {?>
                      <option value="<?=$key['ID_Equipo']?>">Tipo: <?=$key['Tipo']?> | Marca: <?=$key['Marca']?> | FechaCompra: <?=$key['Fec_Compra']?> </option>
                      <?php  } ?>
                      </select>
                     </div>
                  <input type="submit" class="btn btn-primary" value="Terminar">
                </form>

                <?php } ?>

          <?php
          if (isset($_POST['IdusuarioEncontrado']) && isset($_POST['EquipoSeleccionadoTerminado'])) {
                $terminado = new mantenimiento_controlador();
                $terminado->ActualizarEquiposATerminado();
          }
          ?>
    </main>
    </div>
</div>



 


