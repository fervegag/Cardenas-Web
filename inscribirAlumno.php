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
$sqlInscribirAlumno = "INSERT INTO `fighter` (`tournament_id1`, `pupil_id1`) VALUES
                        ('$idTorneo', '$idAlumno')";
$inscribirAlumno = $mysqli->query($sqlInscribirAlumno);
if($inscribirAlumno){
    header('location: inscripciones.php?id='.$idTorneo);
}else{
    header('location: inscripciones.php?id='.$idTorneo);
}
$mysqli->close();
?>