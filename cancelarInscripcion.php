<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
}
?>
<?php
$idAlumno = $_GET['code'];
$idTorneo = $_GET['torneo'];
include('dbmanager/config.php');
$sqlSacarAlumno = "DELETE FROM fighter WHERE pupil_id1 = '".$idAlumno."'";
$sacarAlumno = $mysqli->query($sqlSacarAlumno);
if($sacarAlumno){
    header('location: inscripciones.php?id='.$idTorneo);
}else{
    header('location: inscripciones.php?id='.$idTorneo);
}
$mysqli->close();
?>