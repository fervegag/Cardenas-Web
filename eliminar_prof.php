<?php
include('dbmanager/config.php');
$code = $_GET['code'];

$sqlEliminarProfesor = "DELETE FROM instructor WHERE reg_code = '" . $code . "'";
$resultEliminarProfesor = $mysqli->query($sqlEliminarProfesor);
$sqlEliminar = "DELETE FROM logininfo Where user_code = '" . $code . "'";
$resultEliminar = $mysqli->query($sqlEliminar);
if ($resultEliminar && $resultEliminarProfesor) {
    header('location: administra_prof.php');
} else {
    echo "<script>alert('La eliminación falló')</script>";
    header('location: administra_prof.php');
}
$mysqli->close();
?>