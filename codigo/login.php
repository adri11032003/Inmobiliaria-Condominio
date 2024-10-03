

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--nose-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="login-container">
     
        <form action="login_usuario_vali.php" method="post">
            <h1>Acceso</h1>
            <hr>
            <?php
           
        
            ?>

           <div class="input-box">
                <label for="username">Correo:</label>
                <input type="text" id="username" name="correo" required>
                <i class='bx bxs-user'></i>
           </div>
            <div class="input-box">
                <label for="username">Contraseña:</label>
                <input type="text" id="username" name="clave" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remenber-forgot">
            <label><input type="checkbox"> Acuerdate de mi</label>
            <a href="recover.php">Has olvidado tu contrasena?</a>
            </div>
                <button type="submit"  onclick="location.href='login_usuario_vali.php'" class="btn btn-primary btn-user btn-block">Ingresar</button>
                
            <div class="register-link">
        <label>Aun no tienes una cuenta?<a href="signup.php">Registrarse</a></label>
            </div>
            <!--referencia de login.php hacia el index.php-->
         <!--  <a> href="index.php" class="btn btn-primary btn-user btn-block"</a> -->
           
        
        </form>
        <footer>
            <p>Teléfono: +123456789</p>
            <p>Correo: info@Tucondominio.com</p>
            <p>Página Web: www.Tucondominio.com</p>
        </footer>
        
    </div>
    <<script src="funcion2.js" ></script>
</body>
</html>