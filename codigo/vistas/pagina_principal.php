<?php
//require ('cambiotasa/APIcambio.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4 ">
    <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Pagos  -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Pagos (Mensuales)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">40,108$</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Precio - Tasa-->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
<div class="col mr-2">
    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
        Tasa del día (Fecha): </div>
    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha" >
    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 mt-2">
        Tasa del día (Bs por Dólar): </div>
    <input type="number" class="form-control" id="tasa_dia" name="tasa_dia" placeholder="Ingrese la tasa del día" >
</div>




                  <!--  <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tasa del dia (<?php echo date('d/m/Y', strtotime($fecha)); ?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($convDos, 2, ',', '.');?>Bs por Dolar</div>
                    </div>-->
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
        
            </div>
        </div>
    </div>

    <!--Cuotas  -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cuotas (Mensuales)
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">200$</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cant-Inmobiliarias-->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Inmuebles</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">16</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-building fa-2x text-gray-300" aria-hidden="true"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gastos -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Gastos </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">355Bs</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-tree fa-2x text-gray-300" aria-hidden="true"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cant-Inmobiliarias-->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Propietarios</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-6">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bienvenido</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-5 px-sm-4 mt-3 mb-5" style="width: 35rem;"
                        src="img/undraw_posting_photo.svg" alt="...">
                </div>
                <p>¡Bienvenido a TUCONDOMINIO! 🏢🌟
                    <br>
                     Nos complace recibirte en nuestra plataforma de administración de condominios. 
                    Aquí, encontrarás todas las herramientas necesarias para una gestión eficiente y transparente;
                     donde podras registra a tus propietarios,sus unidades, pagos y llevar de manera sensilla el control
                     completo sobre quiénes forman parte de tu comunidad. </br></p>
                
            </div>
        </div>

        
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


