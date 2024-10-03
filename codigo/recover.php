<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--nose-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Recuperar</title>
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="post">
            <h1>Recuperar contrasena</h1>
           <div class="input-box">
            <label for="username">Email:</label>
            <input type="text" id="emial" name="emial"  required>
            <i class='bx bxs-envelope' ></i>
       </div>
           
                <button type="submit" class="btn">Enviar enlace</button>
            <div class="register-link">
        <label>Ya tienes una cuenta?<a href="login.php">Iniciar sesion</a></label>
            
            </div>
        </form>
    </div>
</body>
</html>