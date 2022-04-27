<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tareas WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['titulo'];
        $description = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title= $_POST['titulo'];
    $description = $_POST['descripcion'];

    $query = "UPDATE tareas set titulo = '$title', descripcion = '$description' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea Guardada Satisfactoriamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                    <input name="titulo" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Actualiza el Titulo">
                    </div>
                    <div class="form-group">
                    <textarea name="descripcion" class="form-control" cols="30" rows="10" placeholder="Actualiza la Descripción"><?php echo $description;?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                    Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
