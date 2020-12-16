<?php
include('dbmanager/config.php');
$id = $_GET['id'];

$sqlEliminar = "DELETE FROM news WHERE news_id = '".$id."'";
$resultEliminar = $mysqli->query($sqlEliminar);

if ($resultEliminar) {
    header('location: noticias_admin.php');
} else {
    echo "<script>alert('La eliminación falló')</script>";
    header('location: noticias_admin.php');
}
$mysqli->close();
?>