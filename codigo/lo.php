<?php
require 'conexion.php';
session_start();

$db= new DataBase();
$conn=$db->conectar();

// Verificar si se enviaron los datos del formulario
if(isset($_POST['correo']) && isset($_POST['clave'])) {
    try {
        // Obtener los datos del formulario y escaparlos
        $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);
        $contraseña = htmlspecialchars($_POST['clave'], ENT_QUOTES);

        // Crear una consulta preparada
        $sql = "SELECT * FROM propietario WHERE correo = :correo AND contraseña = :clave";
        $stmt = $conn->prepare($sql);
        
        // Asociar los parámetros
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':clave', $contraseña, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el número de filas resultantes
        $count = $stmt->rowCount();

        if($count > 0) {
            // Redireccionar si las credenciales son válidas
            header("location: index.php");
            exit;
        } else {
            // Mostrar un mensaje de error y redireccionar si las credenciales son incorrectas
            echo '<script>
                    alert("Usuario incorrecto");
                    window.location = "login.php";
                  </script>';
            exit;
        }
    } catch (PDOException $e) {
        // Mostrar un mensaje de error en caso de excepción
        echo 'Error de consulta: ' . $e->getMessage();
        exit;
    }
} else {
    // Mostrar un mensaje de error si no se enviaron los datos del formulario
    echo '<script>
            alert("Campos vacios");
            window.location = "login.php";
          </script>';
    exit;
}
?>

