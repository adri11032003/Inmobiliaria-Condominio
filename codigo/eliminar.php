<?php


require 'conexion.php';

$db= new DataBase();
$conexion=$db->conectar();

$id=$_GET['id'];

$query = $conexion->prepare("DELETE FROM propietario WHERE id_propietario=?");

if ($query->execute ([$id])){

    sleep(2);
  header("Location:crud propietarios.php");
  exit();

}else{
  echo 'error';
}

?>
