
Boton nuevo 



<?php
require 'menu.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Propietarios</h1>
    <p ></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Propietarios</h6>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success" id="btnNuevo">Nuevo</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Acciones</th> <!-- Nuevo encabezado para el botón "Nuevo" -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "conexion.php";
                        $db= new DataBase();
                        $conexion= $db->conectar();
                        $sql = $conexion->query("SELECT * from propietario");
                        while($datos = $sql->fetch(PDO::FETCH_ASSOC)) { ?> 
                            <tr>
                                <td><?= $datos['id_propietario']?></td>
                                <td><?= $datos['nombre'] ?></td>
                                <td><?= $datos['apellido'] ?></td>
                                <td><?= $datos['cedula'] ?></td>
                                <td><?= $datos['telefono'] ?></td>
                                <td><?= $datos['correo'] ?></td>
                                <td><?= $datos['contraseña'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $datos['id_propietario']?>" class="btn btn-primary">Editar</a>
                                    <a href="eliminar.php?id=<?= $datos['id_propietario']?>" name="eliminar" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<!-- Script para la acción del botón "Nuevo" -->
<script>
    $(document).ready(function(){
        $("#btnNuevo").click(function(){
            // Aquí puedes agregar la acción que deseas realizar al hacer clic en el botón "Nuevo"
            alert("Función para crear un nuevo propietario");
        });
    });
</script>
</body>
</html>