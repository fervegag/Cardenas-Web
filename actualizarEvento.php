<?php
$id = $_GET['varid'];
$nombre = $_GET['varnombre'];
$tipo = $_GET['vartipo'];
$fecha = $_GET['varfecha'];
$hora = $_GET['varhora'];
$direccion = $_GET['vardireccion'];
include('dbmanager/config.php');
$sqlActualizarEvento = "UPDATE tournament
                        SET name_t = '".$nombre."', type_t = '".$tipo."', location_t = '".$direccion."', date_t = '".$fecha."', time_t = '".$hora."'
                        WHERE tournament_id = '".$id."'";
$actualizarEvento = $mysqli->query($sqlActualizarEvento);
if($actualizarEvento){
    header('location: eventosAdmin.php');
}else{
    echo "Los datos no se actualizaron correctamente";
}

$mysqli->close();
?>