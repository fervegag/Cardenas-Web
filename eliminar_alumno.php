<?php
include('dbmanager/config.php');
$id = $_GET['id'];

$sqlEliminar = "DELETE FROM pupil WHERE pupil_id = '".$id."'";
$resultEliminar = $mysqli->query($sqlEliminar);

if ($resultEliminar) {
    header('location: alumnos.php');
} else {
    echo "<script>alert('La eliminación falló')</script>";
    header('location: alumnos.php');
}
$mysqli->close();
?>