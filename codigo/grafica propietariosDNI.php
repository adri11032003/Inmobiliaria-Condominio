
<?php
require_once 'conexion.php';
require 'menu.php';


try {
    $db= new DataBase();
$conn= $db->conectar();


    // Obtiene datos de propietarios 
    $stmt = $conn->prepare("SELECT nombre, cedula FROM propietario");
    $stmt->execute();

    $dataArray = array(); // Array para almacenar los datos

    // Convertir resultados a un array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataArray[] = array($row['nombre'], $row['cedula']);
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$conn = null; // Cerrar conexión
?>



        
<html>
  <head>
     <!-- Agrega el script PHP para obtener datos -->
  <?php
    echo "<script type='text/javascript'>\n";
    echo "var dataArray = " . json_encode($dataArray) . ";\n";
    echo "</script>\n";
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        
          // Agrega datos de propietarios al array
          <?php
                foreach ($dataArray as $prop) {
                    echo "['" . $prop[0] . "', " . $prop[1] . "],\n";
                }
                ?>
            ]);

            var options = {
                title: 'Cierre de mes'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
