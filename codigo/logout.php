<?php
session_start();

// Si se hace clic en el enlace de cerrar sesión
if(isset($_GET['logout'])) {
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: login.php"); // Redirigir al usuario a la página de inicio de sesión
    exit();
}
?>

