<?php
include('dbmanager/config.php');
$id = $_GET['id'];

$sqlEliminar = "DELETE FROM tournament WHERE tournament_id = '".$id."'";
$resultEliminar = $mysqli->query($sqlEliminar);

if ($resultEliminar) {
    header('location: eventosAdmin.php');
} else {
    echo "<script>alert('La eliminación falló')</script>";
    header('location: eventosAdmin.php');
}
$mysqli->close();
?>