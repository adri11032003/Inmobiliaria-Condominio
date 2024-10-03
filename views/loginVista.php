<!DOCTYPE html>
<html lang="en">
<?php include_once('componentes/head.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h3>CONDOMINIO</h3>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sessión</p>

      <form>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="usuario"  placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="clave" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" id="enviar" class="btn btn-primary btn-block">Acceder</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include_once('componentes/script.php'); ?>
<script src=<?php echo VALIDATION.'login.js';?>></script>
</body>
</html>
