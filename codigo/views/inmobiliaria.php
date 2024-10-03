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

<html >
<head>
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
</head>
<body>
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
</body>
</html>