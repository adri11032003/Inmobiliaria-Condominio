<!DOCTYPE html>
<html lang="en">
<?php require_once('bin\controlador\conversormonedaControlador.php');?>
  <?php include_once('componentes/head.php'); ?>
    <div class="wrapper">
        <?php include_once('componentes/panel_nav.php'); ?>
        <?php include_once('componentes/header.php'); ?>
        <div class="content-wrapper">
        <script src="content\js\conversormoneda.js"></script>  


<!-- Comienzo del Codigo del convertidor de moneda-->

        <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Moneda</title>
    <script src="content\js\conversormoneda.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php include_once('componentes/head.php'); ?>
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
        .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
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
<!-- Fin del codigo del convertidor de moneda-->




   <!--Script para la validacion de los campos del convertirdor de moneda-->
   
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Fin del scrip de validacion de los campos del convertidor de moneda-->



   
</body>
</html>