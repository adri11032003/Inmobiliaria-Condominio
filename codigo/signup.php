<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--nose-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Registrarse</title>
</head>
<body>
    <div class="login-container">
        <form class="col-4 p-3" method="POST">
            <h1>Crear una cuenta</h1>

            <?php
            include ("conexion.php");
            include ("controlador/registro_propietario.php");
            ?>

           <div class="input-box">
                <label for="username">Nombre:</label>
                <input type="text"  name="nombre" require >
                <i class='bx bxs-user'></i>
           </div>
           <div class="input-box">
                <label for="username">Apellido:</label>
                <input type="text"  name="apellido" require >
                <i class='bx bxs-user'></i>
           </div>
           <div class="input-box">
                <label for="username">Cedula:</label>
                <input type="text"  name="cedula"  require>
                <i class='bx bxs-id-card'></i>
           </div>
           <div class="input-box">
            <label for="email">Telefono:</label>
            <input type="text"  name="telefono"  require>
            <i class='bx bxs-phone'></i>
       </div>
           <div class="input-box">
            <label for="email">Email:</label>
            <input type="text"  name="correo" require>
            <i class='bx bxs-envelope' ></i>
       </div>
            <div class="input-box">
                <label for="password">Contraseña:</label>
                <input type="password"  name="contraseña" require>
                <i class='bx bxs-lock-alt'></i>
            </div>
                <button type="submit" name="btnregistrar" class="btn btn-primary" value="ok">Crear cuenta</button>
            <div class="register-link">
        <label>Ya tienes una cuenta?<a href="login.php">Iniciar sesion</a></label>
            
            </div>
        </form>
    </div>
</body>
</html>