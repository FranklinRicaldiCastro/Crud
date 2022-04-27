<?php include ("db.php") ?>
<?php include ("includes/header.php") ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            </br>
            <!-- MENSAJES -->
            <?php if (isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); } ?>
            <div>
                <form action="guardar.php" method="POST">
                <hr>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus>
                    </div>
                    </br>
                    <div class="for-group">
                    <textarea name="description" rows="16" class="form-control" placeholder="Rellene la Descripción"></textarea>
                    </div>
                    </br>
                    <input type="submit" name="guardar_tarea" class="btn btn-success btn-block" value="Guardar Libro">
                </form>
            </div>
        </div>
        <div class="col-md-8"></br>
            <hr>
            <form action="buscar.php" method="POST" class="input-group">
                <input type="text" placeholder="Buscar por Titulo" name="buscar" class="input-group-prepend" class="form-control"aria-label="Recipient's username" aria-describedby="basic-addon2" style="width : 653px;">
                <div class="input-group-append">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </form>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de Creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tareas";
                        $result_tasks = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_tasks)) {?>
                            <tr>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fechaCreacion']?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fa fa-marker"></i></a>
                                    <a href="eliminar.php?id=<?php echo $row['id']?>"class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include ("includes/footer.php") ?>
