<!DOCTYPE html>
<html lang="en">

<?php include_once('componentes/head.php'); ?>
<link rel="stylesheet" href=<?php echo LIB.'bs-stepper/css/bs-stepper.min.css';?>>
<style>
    .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
    .product-image{max-width:100%;height:auto;width:100%}.product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
</style>
<link rel="stylesheet" href=<?php echo LIB.'datatables-bs4/css/dataTables.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-responsive/css/responsive.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-buttons/css/buttons.bootstrap4.min.css';?>>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('componentes/panel_nav.php'); ?>
        <?php include_once('componentes/header.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reportes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" action="reporte-propietarios" style="margin-bottom: 20px;">
                                        <a>Propietarios registrados</a>
                                        <input type="submit" class="btn btn-dark" name="generar_pdf" value="Generar PDF">
                                    </form>

                                    <form method="post" action="reporte-propietariostotal" style="margin-bottom: 20px;">
                                        <a>Total de Propietarios</a>
                                        <input type="submit" class="btn btn-dark" name="generar_pdf" value="Generar PDF">
                                    </form>

                                    <form method="post" action="reporte-gastospormes" style="margin-bottom: 20px;">
                                        <a>Gastos de servicio</a>
                                        <input type="submit" class="btn btn-dark" name="generar_pdf" value="Generar PDF">
                                    </form>
                                
                                    <form method="post" action="reporte-tasaspordia" style="margin-bottom: 20px;">
                                        <a>Tasas</a>
                                        <input type="submit" class="btn btn-dark" name="generar_pdf" value="Generar PDF">
                                    </form>

                                    <form method="post" action="reporte-tasasporfecha" style="margin-bottom: 20px;">  
                                    <a>Tasas por dia</a>
                                    <label for="fecha">(Debes seleccionar una fecha registrada)</label>  
                                        <input type="date" id="fecha" name="fecha" >
                                        <input type="submit" class="btn btn-dark" name="generar_pdf" value="Generar PDF">
                                    </form>




                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php include_once('componentes/footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside> 
    </div>


    <?php include_once('componentes/script.php'); ?>

</body>
</html>

