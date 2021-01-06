<?php
include('dbmanager/config.php');
$idGanador = $_GET['idGanador'];
$idPelea = $_GET['idPelea'];
$Peleador = $_GET['Peleador'];
$idTorneo = $_GET['idTorneo'];
$sqlActualizarGanador = "UPDATE `fight` SET winner = '".$Peleador."' 
                        WHERE fight_id = '".$idPelea."'";
$actualizarGanador = $mysqli->query($sqlActualizarGanador);
if($actualizarGanador){
    header('Location: torneo.php?id='.$idTorneo);
}else{
    echo "Fallo al elegir al ganador";
}
$mysqli->close();
?>