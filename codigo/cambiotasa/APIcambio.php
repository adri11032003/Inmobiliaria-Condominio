

<?php

$url = "https://api.cambio.today/v1/full/USD/json?key=48402|AwjoR4LCuEFHV6mszx0k";

$json= file_get_contents($url);
$datos= json_decode($json, true);
$conv = $datos["result"]["conversion"][65];
$convDos = $conv["rate"];
$fecha = $conv["date"];

//var_dump($convDos);

?>




