<?php

include('db.php');

if (isset($_POST['guardar_tarea'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO  tareas(titulo, descripcion) VALUES ('$title', '$description')";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Query Failed");
    }

    $_SESSION['message'] ='Tarea Guardada Satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>