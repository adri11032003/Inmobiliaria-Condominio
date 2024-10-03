<!DOCTYPE html>
<html lang="en">
  <?php include_once('componentes/head.php'); ?>
    <div class="wrapper">
        <?php include_once('componentes/panel_nav.php'); ?>
        <?php include_once('componentes/header.php'); ?>
        <div class="content-wrapper">

<!--boton grafica-->

      

    <form method="post" id="hacer_pdf" action="reporte-grafico2">
    <!-- Esta variable contendrá la imagen más adelante -->
    <input type="hidden" name="variablee" id="variablee">
    
    <!-- Div donde se mostrará el gráfico -->
    <div id="grafico2" style="position: absolute; top: 10px; right: 10px; width: 150px; height: 100px; padding: 5px 10px;">
        <!-- Contenido del gráfico aquí -->
    </div>

    <!-- Botón para enviar la variable -->
    <input type="submit" name="generar_pdf" value="Generar&#10;PDF" class="btn btn-danger mt-5 mr-5 float-right" style="padding: 5px 10px">
</form>



<!--fin boton grafica-->

<!--GRAFICA-->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Pago móvil',     11],
          ['Transferencias',      5],
          ['Zelle',  10]
          
        ]);

        var options = {
          title: 'Porcentage de tipo de pagos '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

        document.getElementById('variablee').value=chart.getImageURI();
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>


<!--fin de grafica --> 
 


            <section class="content" style="margin:3%">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipo de pago</h3>

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
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($r1 as $valor) {?>
                                <tr>
                                    <td>
                                        <?php echo $valor['id_tipopago']; ?>
                                    </td>
                                    <td>
                                    <?php echo $valor['nombre']; ?>
                                    </td>
                                    <td class="project-actions text-right">
                                        <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id_tipopago'];?>);">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </buton>
                                        <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id_tipopago'];?>);">
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

    <div class="modal fade" id="gestion-tipopago">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tipo de pago</h4>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
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