<?php
require 'menu.php';
?>


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

  



