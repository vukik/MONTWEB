<?php
  require_once './controller/encargadosControlador.php'
?>
<div class="col-md-9">
    <main class="principal">
    <h3>Tabla de encargados de mantenimiento</h3>
        <table style="width: 800px; margin: 20px;" class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $productos = new encargados_controlador();
                $products = $productos->ListarEmpleados();
                foreach ($products as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_Empleado']?></th>
                    <td><?=$row['Nombre']?></td>
                    <td><?=$row['Rol']?></td>
                </tr>
                <?php }?>
            </tbody>
          </table>
          
        <h3 style="margin-top: 50px;">Registrar nuevo usuario de mantenimiento.</h3> 
          <div style="width: 500px; margin: 20px;">
            <form action="" method="POST">
                <div class="form-group">
                  <label for="name">Ingrese el Nombre de usuario</label>
                  <input type="text" class="form-control form-control-sm w-100" name="name">
                </div>
                
                <div class="form-group">
                  <label for="email">Ingrese el correo</label>
                  <input type="text" class="form-control form-control-sm w-100" name="email">
                </div>

                <div class="form-group">
                  <label for="password">Ingrese la contraseña</label>
                  <input type="password" class="form-control form-control-sm w-100" name="password">
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
              </form>
              <?php 
                $insertar = new encargados_controlador();
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
                  $insertar->insertarEncargado();
                }
              ?>
          </div>
    </main>
    </div>
</div>
