<?php


require 'conexion.php';

$db= new DataBase();
$conexion=$db->conectar();

$id=$_GET['id'];

$query = $conexion->prepare("DELETE FROM inmobiliaria WHERE id_inmobiliaria=?");

if ($query->execute ([$id])){

    sleep(1);
  header("Location:gastos.php");
  exit();

}else{
  echo 'error';
}

?>
