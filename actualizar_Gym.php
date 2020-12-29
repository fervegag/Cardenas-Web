<?php
$id = $_GET['varid'];
$name = $_GET['varname'];
$adress = $_GET['varadress'];
include('dbmanager/config.php');
$sqlActualizarGym = "UPDATE gym SET gym_name = '".$name."', adress = '".$adress."' WHERE gym_code = '".$id."'";
$ActualizarGym = $mysqli->query($sqlActualizarGym);
if($ActualizarGym){
    header('location: gimnasios.php');
}else{
    echo "Todo mal";
}
$mysqli->close();
?>