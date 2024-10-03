<!DOCTYPE html>
<html lang="en">

<?php include_once('componentes/head.php'); ?>
<link rel="stylesheet" href=<?php echo LIB.'datatables-bs4/css/dataTables.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-responsive/css/responsive.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-buttons/css/buttons.bootstrap4.min.css';?>>
<style>
    .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
    .product-image{max-width:100%;height:auto;width:100%}.product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
</style>

<body>
    <div class="wrapper">
        <?php include_once('componentes/panel_nav.php'); ?>
        <?php include_once('componentes/header.php'); ?>
        <div class="content-wrapper">
            <section class="content">
                <!-- Default box -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container text-center pt-5">
                            <h3>¡BIENVENIDO AL SISTEMA DE CONDOMINIO!</h3>
                            <div>
                                <img src="<?php echo IMG.'logo.png';?>" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal" id="modalReporte"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">¡Recordatorio!</h5> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="m-4" style="text-align: center;">
                <h4>Recuerda pagar la alicuota de este mes</h4>
                <p>Total de gastos: <strong> <?php echo $respuesta['gastos']; ?>$</strong></p>
                <p>La alicuota de su inmobiliario: <strong> <?php echo $respuesta['alicuota']; ?>%</strong></p>
                <p>Y la cuota a cancelar: <strong><?php echo $respuesta['cuota']; ?>$</strong>  </p>
            </div>
        <a href="pago" class="btn btn-primary">Ir a pagar</a>

        </div>
        </div>
    </div>
    <?php include_once('componentes/script.php'); ?>
    <script>
        $(document).ready(function() {
            <?php 
            if($respuesta != null){ ?> 
                $("#modalReporte").modal("show");
            <?php }
            ?>  
        });
    </script>
</body>
</html>