<?php require_once './controller/equiposControlador.php'; ?>
<div class="col-md-9">
    <main class="principal">
    <h1>Registrar equipo:</h1>
    <div style="width: 500px; margin: 20px;">
        <form action="" method="POST">
            <div class="form-group">
              <label for="tipo">Tipo:</label>
              <input type="text" class="form-control form-control-sm w-100" name="tipo">
            </div>

            <div class="form-group">
                <label for="fecha">Fecha de compra:</label>
                <input type="date" class="form-control form-control-sm w-100" name="fecha">
            </div>

            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control form-control-sm w-100" name="marca">
            </div>
            
            <div class="form-group">
                <label for="area">Area a la que pertenece:</label>    
                    <select class="form-control" name="area">
                        <?php
                            $area = new equipos_controlador();
                            $resultado = $area->ListaAreas();
                            foreach ($resultado as $row){?>
                        <option value="<?=$row['ID_Area']?>"><?=$row['Nombre']?></option>
                            <?php }?>
                    </select>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control form-control-sm w-100" name="precio">
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
          </form>
          <?php
            if (isset($_POST['tipo']) && isset($_POST['fecha']) && isset($_POST['marca']) && isset($_POST['precio'])&& isset($_POST['area'])) {
                $equipo = new equipos_controlador();
                $equipo->guardarEquipos();         
            }
          ?>
    </div>
    </main>
    </div>
</div>
