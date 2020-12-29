<?php
include('dbmanager/config.php');
$code = $_GET['code'];
$sqlEliminarGym = "DELETE FROM gym WHERE gym_code = '".$code."'";
$resultEliminarGym = $mysqli->query($sqlEliminarGym);
if($resultEliminarGym){
    header('location: gimnasios.php');
}else{
    echo "<script>alert('La eliminación falló')</script>";
    header('location: gimnasios.php');
}
$mysqli->close();
?>