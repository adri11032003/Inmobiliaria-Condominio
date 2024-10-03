<!DOCTYPE html>
<html lang="en">

<?php include_once('componentes/head.php'); ?>
<style>
    .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
    .product-image{max-width:100%;height:auto;width:100%}.product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
</style>
<link rel="stylesheet" href=<?php echo LIB.'datatables-bs4/css/dataTables.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-responsive/css/responsive.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-buttons/css/buttons.bootstrap4.min.css';?>>
<body>
<div class="wrapper">
  
    <?php include_once('componentes/panel_nav.php'); ?>
    <?php include_once('componentes/header.php'); ?>
    <div class="content-wrapper">


    <!--boton grafica -->

    <form method="post" id="hacer_pdf" action="reporte-grafico">
        
        <!-- esta variable contendrá la imagen más adelante -->
        <input type="hidden" name="variable" id="variable" >
        
        <!-- div donde se mostrará el gráfico -->
        <div id="grafico" style="width: 100%; height: 100px padding-bottom:190px;"></div>
        <!-- Boton para enviar la variable -->
      <input type="submit"  name="generar_pdf" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right"/>

    </form>
<!--fin boton grafica-->

<!--grafica-->

           <html>
            
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Enero',     50],
          ['Febrero',      60],
          ['Marzo',      90],
       
        ]);

        var options = {
          title: 'Porcentaje de aumento de cuotas',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        
        document.getElementById('variable').value=chart.getImageURI();
      }
    </script>
  </head>

  
  <body>
    <div id="donutchart" style="width: 65%; height: 400px; margin: auto;"></div>
  </body>

</html>


<!--fin grafica-->



    <section class="content" style="margin:3%">
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cuotas</h3>

            <div class="card-tools">
            <button type="button" id="nuevo" class="btn btn-default">
                <i class="fa fa-plus"></i> Agregar 
            </button>
            </div>
        </div>
        <div class="card-body table-responsive p-0" >
            <table id="ejemplo1" class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Cedula
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Correo
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($r1 as $valor) {?>
                    <tr>
                        <td>
                            <?php echo $valor['id_propietario']; ?>
                        </td>
                        <td>
                        <?php echo $valor['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $valor['apellido']; ?>
                        </td>
                        <td>
                            <?php echo $valor['cedula']; ?>
                        </td>
                        <td>
                            <?php echo $valor['telefono']; ?>
                        </td>
                        <td class="project_progress">
                            <?php echo $valor['correo']; ?>
                        </td>
                        <td class="project-actions text-right">
                            <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id_propietario'];?>);">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </buton>
                            <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id_propietario'];?>);">
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
    </section>
    </div>
</div>

    <div class="modal fade" id="gestion-cuota">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cuota</h4>
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
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" placeholder="">
                    <span id="sapellido"></span>
                  </div>
                  <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input type="text" class="form-control" id="cedula" placeholder="">
                    <span id="scedula"></span>
                  </div>
                  <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" placeholder="">
                    <span id="stelefono"></span>
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" placeholder="">
                    <span id="scorreo"></span>
                  </div>
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

    <script src=<?php echo VALIDATION.'propietario.js';?>></script>
  <?php include_once('componentes/script.php'); ?>
  <script src=<?php echo LIB.'datatables/jquery.dataTables.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-bs4/js/dataTables.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-responsive/js/dataTables.responsive.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/dataTables.buttons.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/pdfmake.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/vfs_fonts.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.html5.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.print.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.colVis.min.js';?>></script>
  <script>
  $(function () {
    $("#ejemplo1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#ejemplo1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>