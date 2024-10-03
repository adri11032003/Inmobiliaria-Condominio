<?php


require 'conexion.php';

$db= new DataBase();
$conexion=$db->conectar();

$id=$_GET['id'];

$query = $conexion->prepare("DELETE FROM pagos WHERE id_pagos=?");

if ($query->execute ([$id])){

    sleep(2);
  header("Location:pagos.php");
  exit();

}else{
  echo 'error';
}

?>
