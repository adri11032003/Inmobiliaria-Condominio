<!--Prueba grafica estatica inmuebles incoroporada en codigo 2 
con tabla de gasto perteneciente a codigo 2 que no es mi programa -->



<!DOCTYPE html>
<html lang="en">

<?php include_once('componentes/head.php'); ?>
<style>
    .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
    .product-image{max-width:100%;height:auto;width:100%}.product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
</style>

<body>
<div class="wrapper">
    <?php include_once('componentes/panel_nav.php'); ?>
    <?php include_once('componentes/header.php'); ?>
    <div class="content-wrapper">
    <section class="content" style="margin:3%">
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gastos</h3>

            <div class="card-tools">
            <button type="button" id="nuevo" class="btn btn-default">
                <i class="fa fa-plus"></i> Agregar 
            </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0" >
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Monto
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Tipo de gasto
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($r1 as $valor) {?>
                    <tr>
                        <td>
                            <?php echo $valor['id_gastos']; ?>
                        </td>
                        <td>
                        <?php echo $valor['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $valor['monto']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y h:i:s', strtotime($valor['fecha'])); ?>
                        </td>
                        <td class="project_progress">
                            <?php echo $valor['tipo']; ?>
                        </td>
                        <td class="project-actions text-right">
                            <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id_gastos'];?>);">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </buton>
                            <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id_gastos'];?>);">
                                <i class="fas fa-trash">
                                </i>
                                Eliminar
                            </buton>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

<!-- desde aqui donde quiero que aparesca la grafica-->


        <div id="donutchart" style="width: 900px; height: 500px;"></div>
    <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 text-left">
        <form method="post" action="fpdf/reporte_graficainmuebles.php">
            <!-- Campo oculto para almacenar la imagen generada -->
            <input type="hidden" name="variable" id="variable" >
            <button type="submit" class=" btn btn-sm btn-primary shadow-sm" 
            style="margin-top: 10px; margin-right: 10px;"> Generar reporte <i class="fas fa-download fa-sm text-white-90"></i> 
             </button>            
          </form>
          </div>
    </div>
    </div>
    </section>
    </div>
</div>




<!--hasta aqui donde quiero que aparesca la grafica -->





    <div class="modal fade" id="gestion-gastos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Gastos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <input type="hidden" id="accion">
                <input type="hidden" id="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="">
                    <span id="snombre"></span>
                  </div>
                  <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" id="monto" placeholder="">
                    <span id="smonto"></span>
                  </div>
                  <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" placeholder="">
                    <span id="sfecha"></span>
                  </div>
                  <div class="form-group">
                    <label for="id_tipogasto">Tipo de gasto</label>
                    <select type="text" class="form-control" id="id_tipogasto" placeholder="">
                    <?php foreach ($r2 as $valor) {?>
                    <option value="<?= $valor['id_tipogasto'];?>"><?php echo $valor['nombre'];?></option>
                            <?php }?>
                    </select>
                    <span id="sid_tipogasto"></span>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src=<?php echo VALIDATION.'gastos.js';?>></script>
  <?php include_once('componentes/script.php'); ?>
 



<!--graficaaaaaa-->



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar PDF</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Desocupado', 2],
          ['Por Arrendar', 2],
          ['Arrendado', 12],
        ]);

        var options = {
          title: 'Gestión de Inmuebles ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

        document.getElementById('variable').value = chart.getImageURI();
      }
    </script>
<!--Hasta aqui la grafica-->

</body>
</html>