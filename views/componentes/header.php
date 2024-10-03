<script src="content\js\conversormoneda.js"></script>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src=<?php echo IMG.'logo.png';?> alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <i class="brand-text font-weight-light">TuCondominio</i>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Adrian Martinez<?php //echo $_SESSION['usuario']["nombre"]?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="propietario" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Propietarios
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="gastos"  class="nav-link">
                    <i class="nav-icon fa fa-chart-pie"></i>
                    Gastos
                </a>
            </li>
            <li class="nav-item">
                <a href="cuota"  class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    Cuotas
                </a>
            </li>

            <li class="nav-item">
                <a href="tasadia"  class="nav-link">
                    <i class="nav-icon fa fa-calendar"></i>
                    Tasa del dia
                </a>
            </li>
            <li class="nav-item">
                <a href="tipopago"  class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    Pagos
                </a>
            </li>
            <!-- El boton esta conectado con el conversormonedaControlador,
             donde lo redirecciona desde alli a hacia la vista"conversormoneda.Vista". 
             Ademas debes agregar get y post en el archivo index.-->
            <li class="nav-item">
                <a href="conversormoneda"  class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    Convertidor de Moneda
                </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-chart-pie"></i>
                <p>
                  Reportes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="reporte" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Archivos</p>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item">
                <a href="/"  class="nav-link">
                    <i class="nav-icon"></i>
                   Salir
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="content\js\conversormoneda.js"></script>
  