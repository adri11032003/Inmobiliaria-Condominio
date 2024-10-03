<?php
require 'menu.php';
?>
          

                    
                <!-- Main Content 
           <div id="content">
           <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Cancelados',     11],
          ['En Proceso',      5],
          ['Atrasados',      2],
       
        ]);

        var options = {
          title: 'Registro de Pagos',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>

  
</html>

<!--> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud pagos</title>
   
    
</head>


<body>



  <!-- Begin Page Content -->
  <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pagos</h1>
                    <p ></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="row">
                <div class="col-md-6 text-left">
                    <!--Para cambiar el color del boton debo remplazarlo por una de las siguientes opciones : 
         btn-success,btn-danger,btn-info,btn-secondary. 
         Ya que su apariencia y comportaiento estan definidos por las reglas de estilos de bootstrap-->
                <a href="fpdf/reporte_propietarios.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-90"></i> Generar reporte </a>
                </div>
                <div class="col-md-6 text-right">
                    <button><a type="button" class="btn btn-success" href="nuevopagos.php">Nuevo Pago</a></button>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                                        <tr>
<!--cada columna debe tener su nombre , 
sino no funciona el buscador ni el visualizador 
con el codigo php de los datos de los  propietarios -->
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Cedula</th>
                                            <th>Codigo de referencia</th>
                                            <th>Monto</th>
                                            <th>id_tasadia</th>
                                            <th>Editar</th>   
                                            <th>Eliminar</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>




                                    
                                        <?php
                                        include "conexion.php";
                                        $db= new DataBase();
                                        $conexion= $db->conectar();
                                        $sql = $conexion->query("SELECT * from pagos");
                                        while($datos = $sql->fetch(PDO::FETCH_ASSOC)) { ?> 
                                            <tr>
                                                <td><?= $id=$datos['id_pagos']?></td>
                                                <td><?= $cant_cuartos=$datos['fecha'] ?></td>
                                                <td><?= $metros=$datos['cedula'] ?></td>
                                                <td><?= $direccion=$datos['codigo_referencia'] ?></td>
                                                <td><?= $alicuota=$datos['monto'] ?></td>
                                                <td><?= $id_propietario=$datos['id_tasadia'] ?></td>
                                             
                                                <!--editar----->
                                                <td><a href="editarpagos.php?id=<?= $id=$datos['id_pagos']?>" class="btn btn-primary">Editar</a></td>
                                                <td><a href="#" onclick="confirmarEliminarP(<?= $id=$datos['id_pagos']?>)" name="eliminar" class="btn btn-danger">Eliminar</a></td>
                                            </tr>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

        
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
       <!--Bootstrap core JavaScript-->
       <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</script>



<!-- Incluye el archivo JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="funcionmiajs/funcionpagos.js"></script>
</body>
</html>







