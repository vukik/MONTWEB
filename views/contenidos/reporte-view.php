<?php 
    require_once './controller/encargadosControlador.php';
    require_once './controller/mantenimientoControlador.php';
?>
<div class="col-md-9">
    <main class="principal">
    <div style="width: 800px;">
        <div id="reporte">
        <form action="" method="POST">
        <h4>Reporte PDF</h4>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Seleccione un empleado</label>
          <select class="form-control" id="exampleFormControlSelect1" name="empleado-asignado">
            <?php 
              $obj = new encargados_controlador();
              $result = $obj->ListarEmpleados();
              foreach ($result as $row) {?>
                  <option value="<?=$row['ID_Empleado']?>"><?=$row['Nombre']?></option>
              <?php }?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary my-1">Buscar</button>
        </form>
        <h4>Equipos asignados</h4>
        <table style="width: 800px; margin: 20px;" class="table">
            <thead class="thead-light">
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
              if (isset($_POST['empleado-asignado'])) {
                  $objeto = new mantenimiento_controlador();
                  $terminados = $objeto->TerminadosEquiposdelUsuario();
                  $revision = $objeto->RevisionEquiposdelUsuario();
                  $contar = $objeto->TerminadosConteo();
              
              foreach ($terminados as $rowterminados) {?>
                <tr>
                    <th scope="row"><?=$rowterminados['ID_Equipo']?></th>
                    <td><?=$rowterminados['Tipo']?></td>
                    <td><?=$rowterminados['Fec_Compra']?></td>
                    <td><?=$rowterminados['Marca']?></td>
                    <td><?=$rowterminados['Fec_Mantenimiento']?></td>
                    <td><?=$rowterminados['Precio']?></td>
                    <td style="color:#2ecc71;">Terminado</td>
                    <td><?=$rowterminados['ID_Area_Equipo']?></td>
                  </tr>
              <?php } ?>

              <?php foreach ($revision as $rowrevision) {?>
                <tr>
                <th scope="row"><?=$rowterminados['ID_Equipo']?></th>
                    <td><?=$rowrevision['Tipo']?></td>
                    <td><?=$rowrevision['Fec_Compra']?></td>
                    <td><?=$rowrevision['Marca']?></td>
                    <td><?=$rowrevision['Fec_Mantenimiento']?></td>
                    <td><?=$rowrevision['Precio']?></td>
                    <td style="color:#e74c3c;">En revision</td>
                    <td><?=$rowrevision['ID_Area_Equipo']?></td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>       
        <label for="start">Inicio</label>
        <input type="date" name="start">
        <br>
        <label for="end">Finalizacion</label>
        <input type="date" name="end">
        <br>
        <h4>Cantidad de equipos completados:<?=$contar?></h4>
        <br> 
        <?php } ?>  
        </div>
        <input type="button" class="btn btn-primary" onclick="generarPDF()" value="Generar reporte">      
    </div>
    </main>
    </div>
    <script>
      function generarPDF() {
        var doc = new jsPDF('landscape');
          doc.text('MONTIAC LINAMAR REPORTE DE MANTENIMIENTO', 100, 10)
          doc.fromHTML($('#reporte').get(0),15,15)
          doc.save('reporteMontiac.pdf')

          Swal.fire({
          icon: 'success',
          title: 'Impreso con exito!',
          footer: '<a href>Revisa tus descargas para ver el reporte</a>'
    })
      }
    </script>
</div>
