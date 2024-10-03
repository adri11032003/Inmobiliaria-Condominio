

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
                            <h6 class="m-0 font-weight-bold text-primary">Propitarios</h6>
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
                                                <td><?=$id=$datos['id_propietario']?></td>
                                                <td><?= $nombre=$datos['nombre'] ?></td>
                                                <td><?= $apellido=$datos['apellido'] ?></td>
                                                <td><?= $cedula=$datos['cedula'] ?></td>
                                                <td><?= $telefono=$datos['telefono'] ?></td>
                                                <td><?= $correo=$datos['correo'] ?></td>
                                                <td><?= $contraseña=$datos['contraseña'] ?></td>
                                                <!--editar----->
                                                <td><a href="editar.php?id=<?=$id=$datos['id_propietario']?>" class="btn btn-primary">Editar</a></td>
                                                <td><a href="eliminar.php?id=<?=$id=$datos['id_propietario']?>" name="eliminar" class="btn btn-danger">Eliminar</a></td>
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
       <!--Bootstrap core JavaScript-->
       <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>