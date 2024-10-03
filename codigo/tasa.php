<?php
require 'menu.php';
?>
<!--
           <html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Días  del mes');
      data.addColumn('number', 'Cierre del Dólar  por día ');
      
      

      data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  25.4],
        [4,  11.7],
        [5,  11.9],
        [6,   8.8],
        [7,   7.6],
        [8,  12.3],
        [9,  16.9],
        [10, 12.8],
        [11,  5.3],
        [12,  6.6],
        [13,  4.8],
        [14,  4.2]
      ]);

      var options = {
        chart: {
          title: 'Fluctuación del Dólar respecto al Bolívar venezolano',
        
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>
  -->

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Moneda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .alert-custom {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
            padding: 10px;
            border-radius: 5px;
            width: 300px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Convertidor de Moneda
                    </div>
                    <div class="card-body">
                        <form method="post" action="" onsubmit="return validarConversion()">
                            <div class="form-group">
                                <label for="tipo_conversion">Tipo de Conversión:</label>
                                <select class="form-control" id="tipo_conversion" name="tipo_conversion">
                                    <option value="usd_to_bs">Dólares (USD) a Bolívares (VES)</option>
                                    <option value="bs_to_usd">Bolívares (VES) a Dólares (USD)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="monto">Monto:</label>
                                <input type="text" class="form-control" id="monto" name="monto" placeholder="Ingrese el monto (Ejemplo: 100,50)">
                            </div>
                            <div class="form-group">
                                <label for="tasa">Tasa de cambio:</label>
                                <input type="text" class="form-control" id="tasa" name="tasa" placeholder="Ingrese la tasa de cambio actual (Ejemplo: 3000,75)">
                            </div>
                            <button type="submit" class="btn btn-primary" name="convertir">Convertir</button>
                        </form>
                        <?php
                            if(isset($_POST['convertir'])){
                                $tipo_conversion = $_POST['tipo_conversion'];
                                $monto = $_POST['monto'];
                                $tasa = $_POST['tasa'];
                                if(is_numeric(str_replace(',', '.', $monto)) && is_numeric(str_replace(',', '.', $tasa))){
                                  if($tipo_conversion == 'usd_to_bs'){
                                      $monto_bs = str_replace(',', '.', $monto) * str_replace(',', '.', $tasa);
                                      // Formatear el resultado con coma como separador decimal
                                      $monto_bs = number_format($monto_bs, 2, ',', '.');
                                      echo "<p class='mt-3'> $monto USD equivale a $monto_bs Bs </p>";
                                  } elseif($tipo_conversion == 'bs_to_usd'){
                                      $monto_usd = str_replace(',', '.', $monto) / str_replace(',', '.', $tasa);
                                      // Formatear el resultado con coma como separador decimal
                                      $monto_usd = number_format($monto_usd, 2, ',', '.');
                                      echo "<p class='mt-3'> $monto Bs equivale a $monto_usd USD </p>";
                                  }
                              } else {
                                  echo "<div class='alert alert-custom'>Por favor, ingrese valores numéricos válidos.</div>";
                              }
                              
                                
                              
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validarConversion() {
            var monto = document.getElementById('monto').value;
            var tasa = document.getElementById('tasa').value;
            
            if (!/^\d+(,\d+)?$/.test(monto) || !/^\d+(,\d+)?$/.test(tasa)) {
                var mensaje = document.createElement('div');
                mensaje.className = 'alert alert-custom';
                mensaje.textContent = 'Por favor, ingrese valores numéricos válidos.';
                document.body.appendChild(mensaje);
                setTimeout(function() {
                    mensaje.remove();
                }, 3000);
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>



	
