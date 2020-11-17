<?php include_once './controller/equiposControlador.php'; ?>
<div class="col-md-9">
    <main class="principal">
    <div style="width: 500px; margin: 20px;">
    <div class="Forms-Buscar">
    <div>
    <form action="" method="POST">
    <h4>Crear mantenimientos</h4>
            <div class="form-group">
              <label for="buscar">Buscar equipo:</label>
              <select class="form-control" name="buscar" style="width: 300px;"> 
                  <?php
                    $vacios = new equipos_controlador();
                    $resultado = $vacios->TodosEnNull();
                    foreach ($resultado as $row){?>
                <option value="<?=$row['ID_Equipo']?>">Tipo: <?=$row['Tipo']?> | Marca: <?=$row['Marca']?> | FechaCompra: <?=$row['Fec_Compra']?> </option>
                    <?php }?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
    </div>
    <?php 
          if (isset($_POST['buscar'])) {
              $obj = new equipos_controlador();
              $result = $obj->buscarSinMantenimiento();
          foreach ($result as $row) { ?>
        <div>
        <form action="" method="POST">
          <h4>Equipo Encontrado</h4>
          <div class="form-group">
            <label for="id">ID:</label>
              <input type="text" name="id" value="<?=$row['ID_Equipo']?>">
          </div>

          <div class="form-group">
            <label for="tipo">Tipo:</label>
              <input type="text" disabled=false name="tipo" value="<?=$row['Tipo']?>">
          </div>
          <div class="form-group">
            <label for="fecha">Fecha de Compra:</label>
              <input type="text" disabled=false name ="fecha" value="<?=$row['Fec_Compra']?>">
          </div>
          
          <div class="form-group">
            <label for="marca">Marca:</label>
              <input type="text" disabled=false name="marca" value="<?=$row['Marca']?>">
          </div>
          <div class="form-group">
            <label for="fecha-asignada">Asignar fecha de mantenimiento:</label>
              <input type="date" name="fecha-asignada" value="<?=$row['Fec_Mantenimiento']?>">
          </div>
          <button type="submit" class="btn btn-success">Guardar Datos</button>
        </form>              
        </div>
    </div> 
          <?php } }?>
          <?php 
          if (isset($_POST['id']) && isset($_POST['fecha-asignada'])) {
            $obj = new equipos_controlador();
            $obj->ActualizarFechaEquipoMantenimiento();
          }
          ?>    
    </div>
    </main>
    </div>
</div>
