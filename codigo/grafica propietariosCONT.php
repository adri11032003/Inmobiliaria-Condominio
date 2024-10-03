
<?php
require 'conexion.php';
require 'menu.php';

try {
    $db= new DataBase();
$conn= $db->conectar();

    // Obtiene datos de propietarios 
    $stmt = $conn->prepare("SELECT nombre, contraseña FROM propietario");
    $stmt->execute();

    $dataArray = array(); // Array para almacenar los datos

    // Convertir resultados a un array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataArray[] = array($row['nombre'], $row['contraseña']);
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$conn = null; // Cerrar conexión
?>

           <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
       // Agrega datos de propietarios al array
       <?php
                foreach ($dataArray as $cont) {
                    echo "['" . $cont[0] . "', " . $cont[1] . "],\n";
                }
                ?>
            ]);

        var options = {
          title: 'Contraseña con mayor numerología',
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