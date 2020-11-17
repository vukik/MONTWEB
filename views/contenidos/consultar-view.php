<?php 
    require_once './controller/equiposControlador.php';
?>
<div class="col-md-9">
    <main class="principal">
    <h3>Consultar equipos</h3>
        <div style="width: 500px; margin: 20px;">
            <form action="" method="POST">
                <div class="form-group">
                  <select name="opciones">
                    <option value="Tipo">Tipo</option> 
                    <option value="Marca">Marca</option>
                  </select>
                </div>  
                <div class="form-group">
                  <label for="nombre">Buscar por:</label>
                  <input type="text" class="form-control form-control-sm w-100" name ="nombre">
                </div>
            
                <button type="submit" class="btn btn-success">Buscar</button>
              </form>
        </div>
    <h3>Resultado:</h3>
    <div class="">
    <table style="width: 800px; margin: 20px;" class="table ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fecha de compra</th>
            <th scope="col">Marca</th>
            <th scope="col">Fecha mantenimiento</th>
            <th scope="col">Precio</th>
            <th scope="col">Status</th>
            <th scope="col">Area</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $obj = new equipos_controlador();
      if (isset($_POST['opciones']) && isset($_POST['nombre'])) {    
            $res = $obj->buscarEquipoEspecifico();
              foreach ($res as $row) {?> 
            <tr>
                <th scope="row"><?= $row['ID_Equipo']?></th>
                <td><?= $row['Tipo']?></td>
                <td><?= $row['Fec_Compra']?></td>
                <td><?= $row['Marca']?></td>
                <td><?= $row['Fec_Mantenimiento']?></td>
                <td><?= $row['Precio']?></td>
                <td><?= $row['Estado']?></td>
                <td><?= $row['ID_Area_Equipo']?></td>
              </tr>
        <?php } } 
              
              else {
              $result = $obj->ListarTodosLosEquipos();
              foreach ($result as $key) { ?>
              <tr>
                <th scope="row"><?=$key['ID_Equipo']?></th>
                <td><?= $key['Tipo']?></td>
                <td><?= $key['Fec_Compra']?></td>
                <td><?= $key['Marca']?></td>
                <td><?= $key['Fec_Mantenimiento']?></td>
                <td><?= $key['Precio']?></td>
                <td><?= $key['Estado']?></td>
                <td><?= $key['ID_Area_Equipo']?></td>
              </tr>
              <?php }} ?>
        </tbody>
      </table>
      </div>
    </main>
    </div>
</div>
